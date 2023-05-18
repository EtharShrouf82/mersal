<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use App\Models\City;
use App\Models\Client;
use App\Models\ContactUs;
use App\Models\Plan;
use App\Models\Product;
use App\Models\ScreenPrice;
use App\Models\ScreenType;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\WorkSample;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
        $services=Service::select('id','icon','follow')->where('status',1)->get();
        $sliders = Slider::select('id', 'img', 'link')->where('status',1)->get();
        $setting = cache()->remember('settings'.LaravelLocalization::setLocale(), 3600, fn () => Setting::select('id', 'site_status')
            ->with(['translations' => function ($q) {
                $q->select(
                    'about',
                )->where('locale', LaravelLocalization::setLocale());
            }]
            )->first()
        );
        $clients=Client::select('id','img','url')->get();
        $products=Product::select('id','price','img')->where('status',1)->inRandomOrder()->limit(8)->get();
        return view('Front.pages.index', compact('sliders', 'setting','products', 'services','clients'));
    }

    public function digital()
    {
        $city=City::select('id')->get();
        $screenTypes=ScreenType::select('id')->where('status',1)->get();
        return view('Front.pages.digital', compact('screenTypes','city'));
    }

    public function products()
    {
        $productCats=Cat::select('id')->withCount('products')->where('status',1)->get();
        $products=Product::select('id','price','img')->where('status',1)->get();
        return view('Front.pages.products', compact('products','productCats'));
    }

    public function product($id, $slug)
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
        return ScreenPrice::select('id')->where('plan_id',$id)->where('status',1)->get();
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
}
