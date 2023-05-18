<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = ['Jenin', 'Nablus', 'Tulkarem', 'Qalqilia', 'Ramallah', 'Jerusalem', 'Bethlehem', 'Hebron', 'Jericho'];
        for ($i = 0; $i < count($city); $i++) {
            $cat = new City();
            $cat->status = 1;
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            CityTranslation::create([
                'citie_id' => $cat->id,
                'locale' => 'en',
                'title' => $city[$i],
            ]);
        }
    }
}
