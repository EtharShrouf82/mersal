<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\ServiceTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'follow' => 1,
                'icon' => '1.svg',
                'title' => 'Smarter Business Security',
                'description' => '
                    You can quickly set up or delete access for employees, get access-triggered alerts when certain doors are opened, and quickly find video clips of access events. You can also lock and unlock any door remotely, and even have your business lock itself automatically at closing time. Smart fire alarm systems assist in providing vital protection to businesses, landlords and public sector buildings by enhancing traditional fire detection equipment. Find out how smart fire alarm systems work and what t...
                    Reliable, professional monitoring ensures your business, inventory and equipment are always protected. Combined with STANLEY Security systems, you have security that goes the extra mile.
                ', ],
            [
                'follow' => 1,
                'icon' => '2.svg',
                'title' => 'Fire Detection & Life Safety',
                'description' => '
                    You can quickly set up or delete access for employees, get access-triggered alerts when certain doors are opened, and quickly find video clips of access events. You can also lock and unlock any door remotely, and even have your business lock itself automatically at closing time. Smart fire alarm systems assist in providing vital protection to businesses, landlords and public sector buildings by enhancing traditional fire detection equipment. Find out how smart fire alarm systems work and what t...
                    Reliable, professional monitoring ensures your business, inventory and equipment are always protected. Combined with STANLEY Security systems, you have security that goes the extra mile.
                ',
            ],
            [
                'follow' => 1,
                'icon' => '3.svg',
                'title' => 'Smart Home Systems',
                'description' => '
                    You can quickly set up or delete access for employees, get access-triggered alerts when certain doors are opened, and quickly find video clips of access events. You can also lock and unlock any door remotely, and even have your business lock itself automatically at closing time. Smart fire alarm systems assist in providing vital protection to businesses, landlords and public sector buildings by enhancing traditional fire detection equipment. Find out how smart fire alarm systems work and what t...
                    Reliable, professional monitoring ensures your business, inventory and equipment are always protected. Combined with STANLEY Security systems, you have security that goes the extra mile.
                ',
            ],
            [
                'follow' => 1,
                'icon' => '4.svg',
                'title' => 'Access Control Installation',
                'description' => '
                    You can quickly set up or delete access for employees, get access-triggered alerts when certain doors are opened, and quickly find video clips of access events. You can also lock and unlock any door remotely, and even have your business lock itself automatically at closing time. Smart fire alarm systems assist in providing vital protection to businesses, landlords and public sector buildings by enhancing traditional fire detection equipment. Find out how smart fire alarm systems work and what t...
                    Reliable, professional monitoring ensures your business, inventory and equipment are always protected. Combined with STANLEY Security systems, you have security that goes the extra mile.
                ', ],
            [
                'follow' => 2,
                'icon' => '5.svg',
                'title' => 'Business Strategy',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'follow' => 2,
                'icon' => '6.svg',
                'title' => 'Social Media Ads & Design',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'follow' => 2,
                'icon' => '7.svg',
                'title' => 'Logo Design',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
            [
                'follow' => 2,
                'icon' => '8.svg',
                'title' => 'Branding',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore',
            ],
        ];

        for ($i = 0; $i < count($services); $i++) {
            $cat = new Service();
            $cat->status = 1;
            $cat->follow = $services[$i]['follow'];
            $cat->icon = $services[$i]['icon'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            ServiceTranslation::create([
                'service_id' => $cat->id,
                'locale' => 'en',
                'title' => $services[$i]['title'],
                'description' => $services[$i]['description'],
            ]);
        }
    }
}
