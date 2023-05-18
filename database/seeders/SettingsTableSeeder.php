<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\SettingTranslations;
use Illuminate\Database\Seeder;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_status' => '1',
        ]);
        foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties) {
            SettingTranslations::create([
                'setting_id' => 1,
                'locale' => $localeCode,
                'site_name' => $localeCode.'site_name',
                'site_description' => $localeCode.'site_description',
                'header_message' => 'WELCOME TO LAMOR || HAIR SOLUTION, BEAUTY, COSMETICS AND PERSONAL CARE',
                'site_keyword' => $localeCode.'site_keyword',
                'site_closed_msg' => $localeCode.'site_closed_msg',
                'facebook' => $localeCode.'facebook',
                'twitter' => $localeCode.'twitter',
                'linkedin' => $localeCode.'linkedin',
                'instagram' => $localeCode.'instagram',
                'youtube' => $localeCode.'youtube',
                'telegram' => $localeCode.'telegram',
                'snapchat' => $localeCode.'snapchat',
                'tiktok' => $localeCode.'tiktok',
                'whatsapp' => $localeCode.'whatsapp',
                'tel' => $localeCode.'tel',
                'email' => $localeCode.'@gmail.com',
                'about' => $localeCode.' about',
                'address' => $localeCode.' address',
            ]);
        }
    }
}
