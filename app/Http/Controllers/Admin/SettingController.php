<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:settings', ['only' => ['index']]);
        $this->middleware('permission:settings', ['only' => ['update']]);
    }

    public function index()
    {
        $settings = Setting::with(['translations' => function ($q) {
            $q->where('locale', LaravelLocalization::setLocale());
        }])->first();

        return view('Admin.Settings.settings', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $s = Setting::with(['translations' => function ($q) {
            $q->where('locale', LaravelLocalization::setLocale());
        }])->findOrFail($id);
        $s->site_status = 1;
        $s->email = $request->email;
        $s->save();
        $s->translations()->updateOrCreate(
            ['locale' => LaravelLocalization::setLocale()],
            [
                'setting_id' => 1,
                'locale' => LaravelLocalization::setLocale(),
                'site_name' => $request->input('site_name'),
                'site_description' => $request->input('site_description'),
                'site_keyword' => $request->input('site_keyword'),
                'site_closed_msg' => 'site close msg',
                'facebook' => $request->input('facebook'),
                'twitter' => $request->input('twitter'),
                'linkedin' => $request->input('linkedin'),
                'instagram' => $request->input('instagram'),
                'youtube' => $request->input('youtube'),
                'telegram' => $request->input('telegram'),
                'snapchat' => $request->input('snapchat'),
                'tiktok' => $request->input('tiktok'),
                'whatsapp' => $request->input('whatsapp'),
                'tel' => $request->input('tel'),
                'email' => $request->input('email'),
                'header_message' => $request->input('header_message'),
                'address' => $request->input('address'),
            ]);

        return redirect()->route('settings')->with('success', 'تم التعديل بنجاح');
    }

    public function about()
    {
        $about = Setting::select('about_ar', 'about_en')->where('id', 1)->first();

        return view('Admin.about.about', compact('about'));
    }

    public function cacheControll()
    {
        Artisan::call('cache:clear');
        // Artisan::call('config:clear');
        // Artisan::call('config:cache');
        // Artisan::call('view:clear');
        // Artisan::call('route:trans:clear');
        // Artisan::call('route:trans:cache');
        // Artisan::call('optimize');
        // system('composer dump-autoload');
        return 'done';
    }
}
