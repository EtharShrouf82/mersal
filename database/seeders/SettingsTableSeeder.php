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
                'tel' => $localeCode.'0225252525',
                'email' => $localeCode.'@gmail.com',
                'about' => $localeCode.' about',
                'digital_title' => 'The Future Is Here',
                'digital_text' => $localeCode.'In a world where competition is accelerating. It is very important to have new ideas to roll out your products in a distinctive and innovative way. Digital advertising technology is one of the most important modern technologies for advertising, since this way of ads enables the companies to achieve its aspirations from advertising campaign such as attracting the attention of their target audiences, providing more relevant and attractive messages, promoting and solidifying their identity as well as increasing the sales.',
                'address' => $localeCode.' address',
                'social_title' => 'Manage All Your Social Accounts In One Place',
                'social_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ',
                'cctv_title' => 'Find Peace Of Mind With 24/7 Monitoring',
                'cctv_title_two' => 'Smart Security Systems That Fits Your Business!',
                'cctv_description' => 'Because a commercial security camera system has to produce results, we offer what most security camera companies can’t. For CCTV installation companies, it’s important to treat cctv camera installation with a modern approach. Our security camera system installation department is just passionate about security installation and software.',
                'client_text' => 'We have provided the best plus affordable web development services to numerous large as well as medium entrepreneurs.',
            ]);
        }
    }
}
