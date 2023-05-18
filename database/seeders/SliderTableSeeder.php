<?php

namespace Database\Seeders;

use App\Models\Slider;
use App\Models\SliderTranslations;
use App\Models\User;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'img' => 'banner-01.jpg',
            'status' => 1,
            'user_id' => User::all()->random()->id,
        ]);
        Slider::create([
            'img' => 'banner-03.jpg',
            'status' => 1,
            'user_id' => User::all()->random()->id,
        ]);

        SliderTranslations::create([
            'slider_id' => 1,
            'locale' => 'ar',
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
        ]);

        SliderTranslations::create([
            'slider_id' => 1,
            'locale' => 'en',
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
        ]);

        SliderTranslations::create([
            'slider_id' => 2,
            'locale' => 'ar',
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
        ]);

        SliderTranslations::create([
            'slider_id' => 2,
            'locale' => 'en',
            'title' => fake()->sentence(),
            'description' => fake()->sentence(),
        ]);

    }
}
