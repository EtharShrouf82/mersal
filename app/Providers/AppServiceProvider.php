<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $settings = cache()->remember('settings'.LaravelLocalization::setLocale(), 3600, fn () => Setting::select('id', 'site_status')
            ->with(['translations' => function ($q) {
                $q->select(
                    'setting_id',
                    'site_name',
                    'site_description',
                    'site_keyword',
                    'header_message',
                    'site_closed_msg',
                    'facebook',
                    'twitter',
                    'youtube',
                    'linkedin',
                    'instagram',
                    'whatsapp',
                    'telegram',
                    'tel',
                    'snapchat',
                    'tiktok',
                    'email',
                    'address',
                )->where('locale', LaravelLocalization::setLocale());
            }]
            )->first()
        );

        View::share('settings', $settings);
    }
}
