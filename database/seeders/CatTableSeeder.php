<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\CatTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class CatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cats = ['Security', 'Networking', 'Accounting', 'Office', 'Others'];

        foreach ($cats as $key => $value) {
            $cat = new Cat();
            $cat->status = 1;
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            CatTranslation::create([
                'locale' => 'en',
                'cat_id' => $cat->id,
                'title' => $value,
            ]);
        }
    }
}
