<?php

namespace Database\Seeders;

use App\Models\Mechanism;
use App\Models\MechanismTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class MechanismTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = [
            'SecuStudy Of The Project',
            'Designing The Diagrams',
            'Price Offer',
            'Supply',
            'Supervision',
            'Implementation',
            'Maintenance Contracts',
        ];

        foreach ($cats as $key => $value) {
            $cat = new Mechanism();
            $cat->status = 1;
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            MechanismTranslation::create([
                'mechanism_id' => $cat->id,
                'locale' => 'en',
                'title' => $value,
            ]);
        }
    }
}
