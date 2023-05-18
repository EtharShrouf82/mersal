<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WorkSample;
use App\Models\WorkSampleTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkSampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $works=[
            [
                'img'=>'1.jpg',
                'service_id'=>'5',
                'title'=>'Lamore',
            ],
            [
                'img'=>'2.jpg',
                'service_id'=>'6',
                'title'=>'Lamore',
            ],
            [
                'img'=>'3.jpg',
                'service_id'=>'7',
                'title'=>'Lamore',
            ],
            [
                'img'=>'4.jpg',
                'service_id'=>'8',
                'title'=>'Lamore',
            ],
            [
                'img'=>'5.jpg',
                'service_id'=>'5',
                'title'=>'Lamore',
            ],
            [
                'img'=>'6.jpg',
                'service_id'=>'5',
                'title'=>'Lamore',
            ],
            [
                'img'=>'7.jpg',
                'service_id'=>'5',
                'title'=>'Lamore',
            ],

        ];

        for ($i = 0; $i < count($works); $i++) {
            $cat = new WorkSample();
            $cat->status = 1;
            $cat->service_id = $works[$i]['service_id'];
            $cat->img = $works[$i]['img'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            WorkSampleTranslation::create([
                'work_sample_id' => $cat->id,
                'locale' => 'en',
                'title' => $works[$i]['title'],
            ]);
        }
    }
}
