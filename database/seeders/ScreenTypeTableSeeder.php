<?php

namespace Database\Seeders;

use App\Models\ScreenType;
use App\Models\ScreenTypeTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ScreenTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $screenTypes = ['Governmental Circle', 'The crossings and borders', 'The hospitals'];

        foreach ($screenTypes as $key => $sk) {
            $cat = new ScreenType();
            $cat->status = 1;
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            ScreenTypeTranslation::create([
                'locale' => 'en',
                'screen_type_id' => $cat->id,
                'title' => $sk,
            ]);
        }
    }
}
