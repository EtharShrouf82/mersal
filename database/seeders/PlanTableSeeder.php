<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'title' => 'PLAN A',
                'num_view' => '240',
                'screen_type_id' => '1',
            ],
            [
                'title' => 'PLAN B',
                'num_view' => '120',
                'screen_type_id' => '1',
            ],
            [
                'title' => 'PLAN A',
                'num_view' => '510',
                'screen_type_id' => '2',
            ],
            [
                'title' => 'PLAN B',
                'num_view' => '255',
                'screen_type_id' => '2',
            ],[
                'title' => 'PLAN A',
                'num_view' => '510',
                'screen_type_id' => '3',
            ],
            [
                'title' => 'PLAN B',
                'num_view' => '255',
                'screen_type_id' => '3',
            ],
        ];

        for ($i = 0; $i < count($plans); $i++) {
            $cat = new Plan();
            $cat->status = 1;
            $cat->screen_type_id = $plans[$i]['screen_type_id'];
            $cat->num_views = $plans[$i]['num_view'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            PlanTranslation::create([
                'plan_id' => $cat->id,
                'locale' => 'en',
                'title' => $plans[$i]['title'],
            ]);
        }
    }
}
