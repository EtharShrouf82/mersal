<?php

namespace Database\Seeders;

use App\Models\ServiceInfo;
use App\Models\ServiceInfoTranslation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceDescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desc=[
            [
                'img'=>'s1.jpg',
                'num_views'=>1,
                'service_id'=>1,
                'status'=>1,
                'user_id'=>1,
                'box_title'=>'Total Control Over Securing Your Business',
                'title'=>'Providing The Best Practices for Industry Security Protocols & Standardizing Procedures.',
                'box_description'=>'<ul><li>Easy to setup and use</li><li>Environmental Sensorss</li><li>Touch Screen Panel</li></ul>',
                'description'=>'We can partner with you to design and implement a scalable integrated security solution that addresses your toughest security challenges, while gaining efficiencies across your systems and teams by standardizing platforms and implementing event-driving system automation and powerful solutions help
                <ul><li>Easy to setup and use</li><li>Environmental Sensorss</li><li>Touch Screen Panel</li></ul>
                ',
            ],
            [
                'img'=>'s2.jpg',
                'num_views'=>1,
                'service_id'=>1,
                'status'=>1,
                'user_id'=>1,
                'box_title'=>'Convenient System Access By Phone Or Tablet',
                'title'=>'Trusted Analytics that Give Meaning To Security Data.',
                'box_description'=>'<ul><li>Easy to setup and use</li><li>Environmental Sensorss</li><li>Touch Screen Panel</li></ul>',
                'description'=>'We can partner with you to design and implement a scalable integrated security solution that addresses your toughest security challenges, while gaining efficiencies across your systems and teams by standardizing platforms and implementing event-driving system automation and powerful solutions help
                <ul><li>Easy to setup and use</li><li>Environmental Sensorss</li><li>Touch Screen Panel</li></ul>
                ',
            ],
        ];

        for ($i = 0; $i < count($desc); $i++) {
            $cat = new ServiceInfo();
            $cat->status = 1;
            $cat->service_id = $desc[$i]['service_id'];
            $cat->img = $desc[$i]['img'];
            $cat->num_views = $desc[$i]['num_views'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            ServiceInfoTranslation::create([
                'service_info_id' => $cat->id,
                'locale' => 'en',
                'box_title' => $desc[$i]['box_title'],
                'title' => $desc[$i]['title'],
                'box_description' => $desc[$i]['box_description'],
                'description' => $desc[$i]['description'],
            ]);
        }
    }
}
