<?php

namespace Database\Seeders;

use App\Models\AboutSubject;
use App\Models\AboutSubjectTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class AboutSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'icon' => '<i class="fa-thin fa-grip-vertical"></i>',
                'title' => 'Affordable',
                'description' => 'We have provided the best plus affordable web development services to numerous large as well as medium entrepreneurs.',
            ],
            [
                'icon' => '<i class="fa-thin fa-shield-check"></i>',
                'title' => 'Reliable',
                'description' => 'MIT is a renowned offshore company, We believe in building and maintaining long term relationships with our clients.',
            ],
            [
                'icon' => '<i class="fa-thin fa-thumbs-up"></i>',
                'title' => 'Experience',
                'description' => 'We are pioneer in lambasting problems like web or software development. Our experts will handle your assigned projects prudently',
            ],
            [
                'icon' => '<i class="fa-light fa-hands-holding-heart"></i>',
                'title' => 'Solutions',
                'description' => 'We endeavor to offer you the best solution in order to acquire your maximum satisfaction. We are the masters in offering effective software development solutions',
            ],
        ];

        for ($i = 0; $i < count($subjects); $i++) {
            $cat = new AboutSubject();
            $cat->status = 1;
            $cat->icon = $subjects[$i]['icon'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            AboutSubjectTranslation::create([
                'about_subject_id' => $cat->id,
                'locale' => 'en',
                'title' => $subjects[$i]['title'],
                'description' => $subjects[$i]['description'],
            ]);
        }
    }
}
