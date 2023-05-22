<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WhyDigital;
use App\Models\WhyDigitalTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WhyDigitalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $why = [
            [
                'title' => 'Attracting Attention',
                'description' => 'According to the advertising site "Back Linko", statistics have shown that digital signages capture 400% more views than social media marketing. Digital signages ads don\'t give you the chance to bypass the ad. On the other hand, you know it\'s easy for people to scroll through 90% of posts they see on social media including your sponsored ad, except that 42.7% of subscribers use ad-blocking applications'
            ],
            [
                'title' => 'Reaching A Real Audience',
                'description' => 'Digital signages ads are effective as they create instant customer contact, help you to provide information, and bring high financial return as well. In contrast with Social media marketing which is considered as a long-term investment with a financial risk because advertising costs may exceed sales.',
            ],
        ];

            for ($i = 0; $i < count($why); $i++) {
                $cat = new WhyDigital();
                $cat->status = 1;
                $cat->user_id = User::all()->random()->id;
                $cat->save();
                WhyDigitalTranslation::create([
                    'why_digital_id' => $cat->id,
                    'locale' => 'en',
                    'title' => $why[$i]['title'],
                    'description' => $why[$i]['description'],
                ]);
            }

    }
}
