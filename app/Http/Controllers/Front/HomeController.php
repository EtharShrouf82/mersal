<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendJobEmail;
use App\Models\Cat;
use App\Models\City;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Job;
use App\Models\JobApply;
use App\Models\Mechanism;
use App\Models\Plan;
use App\Models\Product;
use App\Models\Screen;
use App\Models\ScreenPrice;
use App\Models\ScreenType;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\WhyDigital;
use App\Models\WorkSample;
use Illuminate\Support\Facades\Mail;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $services = cache()->remember('services_'.LaravelLocalization::setLocale(), 3600, fn () => Service::select('id','icon','follow')->where('status',1)->get());
        $sliders = cache()->remember('sliders_'.LaravelLocalization::setLocale(), 3600, fn () => Slider::select('id', 'img', 'link')->where('status',1)->get());
        $home_setting = cache()->remember('home_settings_'.LaravelLocalization::setLocale(), 3600, fn () => Setting::select('id', 'site_status')
            ->with(['translations' => function ($q) {
                $q->select(
                    'setting_id',
                    'about',
                    'social_title',
                    'social_description',
                    'cctv_title',
                    'cctv_title_two',
                    'cctv_description',
                    'client_text',
                )->where('locale', LaravelLocalization::setLocale());
            }]
            )->first()
        );
        $productCats = cache()->remember('product_cats_'.LaravelLocalization::setLocale(), 3600, fn () => Cat::select('id')->where('status',1)->get());
        $clients = cache()->remember('clients_'.LaravelLocalization::setLocale(), 3600, fn () => Client::select('id','img','url')->where('status',1)->get());
        $mechanisms = cache()->remember('mechanism_'.LaravelLocalization::setLocale(), 3600, fn () => Mechanism::select('id')->get());
        $products=Product::select('id','price','img')
            ->with('cats:id')
            ->where('status',1)
            ->inRandomOrder()
            ->limit(8)
            ->get();
        return view('Front.pages.index', compact('sliders', 'home_setting','products', 'services','clients', 'mechanisms','productCats'));
    }

    public function digital()
    {
        $digitalTxt=cache()->remember('digitalTxt'.LaravelLocalization::setLocale(), 3600, fn () => Setting::select('id', 'site_status')
            ->with(['translations' => function ($q) {
                    $q->select(
                        'setting_id',
                        'digital_title',
                        'digital_text',
                    )->where('locale', LaravelLocalization::setLocale());
                }]
            )->first()
        );
        $city=City::select('id')->get();
        $screenTypes=ScreenType::select('id')->where('status',1)->get();
        $whyDigital=WhyDigital::select('id')->get();
        return view('Front.pages.digital', compact('screenTypes','city','digitalTxt','whyDigital'));
    }

    public function products()
    {
        $productCats=Cat::select('id')->withCount('products')->where('status',1)->get();
        $products=Product::select('id','price','img')
            ->with('cats:id')
            ->where('status',1)
            ->get();
        return view('Front.pages.products', compact('products','productCats'));
    }

    public function product($id, $slug=null)
    {
        $products=Product::select('id','price','img')->where('status',1)->inRandomOrder()->limit(4)->get();
        $product=Product::select('id','price','price_hidden','img')
            ->with('cats:id')
            ->with('images:product_id,img')
            ->where('status',1)
            ->where('id',$id)
            ->first();
        return view('Front.pages.product', compact('product','products'));
    }

    public function getPlans($id)
    {
        return Plan::select('id','num_views')->where('screen_type_id',$id)->where('status',1)->get();
    }

    public function gerPrices($id)
    {
        return ScreenPrice::select('id','discount','price')->where('plan_id',$id)->where('status',1)->get();
    }

    public function getPeriod($id, $plan, $type)
    {
        return ScreenPrice::select('id','discount','price')
            ->where('plan_id',$plan)
            ->where('screen_type_id',$type)
            ->where('id',$id)
            ->where('status',1)
            ->first();
    }

    public function service($id, $slug=null)
    {
        $service=Service::with('info:id,img,service_id')->select('id')->findOrFail($id);
        return view('Front.pages.service', compact('service'));
    }

    public function media($id, $slug=null)
    {
        $service=Service::with('info:id,img,service_id')->select('id')->findOrFail($id);
        $services=Service::select('id')
            ->with('work_sample:id,img,service_id')
            ->where('follow',2)->where('status',1)->get();
        $workSamples=WorkSample::select('id','img','service_id')->where('status',1)->get();
        return view('Front.pages.media', compact('service','services','workSamples'));
    }

    public function getScreens($id)
    {
        return Screen::select('id')->where('citie_id',$id)->where('status',1)->get();
    }

    public function screen($id)
    {
        $screen=Screen::select('id','screen_type_id')
            ->with('screen_type:id')
            ->with('images:screen_id,img')
            ->where('id',$id)
            ->first();
        $plans=Plan::select('id','num_views','screen_type_id')
            ->with(['screen_price'=>function($q) use ($screen) {
                $q->select('id','price','discount','plan_id')->where('screen_type_id',$screen->screen_type_id);
            }])
            ->where('screen_type_id',$screen->screen_type_id)
            ->where('status',1)->get();
        return ['screen'=>$screen, 'plans'=>$plans];
    }

    public function sendMsg(Request $request)
    {
        $inputHidden = $request->inputHidden;
        if ($inputHidden == null) {
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->tel = $request->tel;
            $contact->email = $request->email;
            $contact->message = $request->message;
            $contact->ip = request()->ip();

            $email['name'] = $request->name;
            $email['email'] = $request->email;
            $email['tel'] = $request->tel;
            $email['message'] = $request->message;

            if ($contact->save()) {
//                SendContactEmail::dispatch($email);
                return 1;
            }
        }
    }

    public function jobs()
    {
        $services = cache()->remember('services_'.LaravelLocalization::setLocale(), 3600, fn () => Service::select('id','icon','follow')->where('status',1)->get());

        $jobs=Job::select('id','img','end_date')->where('status',1)->get();
        return view('Front.pages.jobs', compact('jobs','services'));
    }

    public function job($id, $slug=null)
    {
        $job=Job::findOrFail($id);
        $job->increment('num_views');
        $city=City::select('id')->where('status',1)->get();
        $services = cache()->remember('services_'.LaravelLocalization::setLocale(), 3600, fn () => Service::select('id','icon','follow')->where('status',1)->get());
        return view('Front.pages.job', compact('job','services','city'));
    }

    public function uploadcv(){
        $handle = new \Verot\Upload\Upload($_FILES['cvfile']);
        if ($handle->uploaded) {
            $handle->process(public_path('cv'));
            if ($handle->processed) {
                return $handle->file_dst_name;
            } else {
                echo 'error : ' . $handle->error;
            }
        }
    }

    public function applyJob(Request $request){
        if($request->inputHidden != null){
            return;
        }
        $applyJob= new JobApply();
        $applyJob->name=$request->name;
        $applyJob->Phone=$request->Phone;
        $applyJob->email=$request->email;
        $applyJob->city_id=$request->city_id;
        $applyJob->cv=$request->cv;
        $applyJob->gender=$request->gender;
        $applyJob->job_id=$request->job_id;

        if($applyJob->save()){
            $email['firstname'] = $applyJob->name;

//            Mail::to('hr@darrory.com')
//                ->send(new SendJobEmail($email));
            return 1;
        }
    }
}
