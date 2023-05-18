<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Screen;
use App\Models\ScreenTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScreenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $screens = [
            [
                'screen' => 'The Palestinian Post',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Palestine Medical Complex',
                'position' => '1',
                'screen_type_id' => 3,
            ],
            [
                'screen' => 'Directorate of Health',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Land Authority',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'General Directorate of Excise and Customs',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Traffic and Licensing Department',
                'position' => '1',
                'screen_type_id' => 2,
            ],
            [
                'screen' => 'General Administration of Income Tax',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Department of Civil Status',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Sharia court',
                'position' => '1',
                'screen_type_id' => 1,
            ],
            [
                'screen' => 'Ministry of Communications and Information Technology',
                'position' => 1,
                'screen_type_id' => 1,
            ],
        ];

        $city = City::select('id')->get();
        foreach ($city as $ct) {
            for ($i = 0; $i < count($screens); $i++) {
                $cat = new Screen();
                $cat->status = 1;
                $cat->screen_type_id = $screens[$i]['screen_type_id'];
                $cat->citie_id = $ct->id;
                $cat->position = $screens[$i]['position'];
                $cat->user_id = User::all()->random()->id;
                $cat->save();
                ScreenTranslation::create([
                    'screen_id' => $cat->id,
                    'locale' => 'en',
                    'title' => $screens[$i]['screen'],
                ]);
            }
        }
    }
}
