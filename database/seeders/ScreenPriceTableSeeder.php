<?php

namespace Database\Seeders;

use App\Models\ScreenPrice;
use App\Models\ScreenPriceTranslation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScreenPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prices = [
            [
                'title'=>'Month',
                'screen_type_id'=>1,
                'plan_id'=>1,
                'status'=>1,
                'price'=>600,
                'discount'=>15,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'3 Month',
                'screen_type_id'=>1,
                'plan_id'=>1,
                'status'=>1,
                'price'=>600,
                'discount'=>25,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'6 Month',
                'screen_type_id'=>1,
                'plan_id'=>1,
                'status'=>1,
                'price'=>600,
                'discount'=>50,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>1,
                'plan_id'=>1,
                'status'=>1,
                'price'=>600,
                'discount'=>60,
                'user_id'=>User::all()->random()->id,
            ],

            [
                'title'=>'Month',
                'screen_type_id'=>1,
                'plan_id'=>2,
                'status'=>1,
                'price'=>600,
                'discount'=>25,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Month',
                'screen_type_id'=>1,
                'plan_id'=>2,
                'status'=>1,
                'price'=>600,
                'discount'=>50,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Month',
                'screen_type_id'=>1,
                'plan_id'=>2,
                'status'=>1,
                'price'=>600,
                'discount'=>60,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>1,
                'plan_id'=>2,
                'status'=>1,
                'price'=>600,
                'discount'=>70,
                'user_id'=>User::all()->random()->id,
            ],
            //end first type
            [
                'title'=>'Month',
                'screen_type_id'=>2,
                'plan_id'=>3,
                'status'=>1,
                'price'=>1200,
                'discount'=>5,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'3 Month',
                'screen_type_id'=>2,
                'plan_id'=>3,
                'status'=>1,
                'price'=>1200,
                'discount'=>15,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'6 Month',
                'screen_type_id'=>2,
                'plan_id'=>3,
                'status'=>1,
                'price'=>1200,
                'discount'=>25,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>2,
                'plan_id'=>3,
                'status'=>1,
                'price'=>1200,
                'discount'=>35,
                'user_id'=>User::all()->random()->id,
            ],

            [
                'title'=>'Month',
                'screen_type_id'=>2,
                'plan_id'=>4,
                'status'=>1,
                'price'=>1200,
                'discount'=>15,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'3 Month',
                'screen_type_id'=>2,
                'plan_id'=>4,
                'status'=>1,
                'price'=>1200,
                'discount'=>25,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'6 Month',
                'screen_type_id'=>2,
                'plan_id'=>4,
                'status'=>1,
                'price'=>1200,
                'discount'=>35,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>2,
                'plan_id'=>4,
                'status'=>1,
                'price'=>1200,
                'discount'=>45,
                'user_id'=>User::all()->random()->id,
            ],
            //end of second type
            [
                'title'=>'Month',
                'screen_type_id'=>3,
                'plan_id'=>5,
                'status'=>1,
                'price'=>600,
                'discount'=>5,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'3 Month',
                'screen_type_id'=>3,
                'plan_id'=>5,
                'status'=>1,
                'price'=>600,
                'discount'=>15,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'6 Month',
                'screen_type_id'=>3,
                'plan_id'=>5,
                'status'=>1,
                'price'=>600,
                'discount'=>30,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>3,
                'plan_id'=>5,
                'status'=>1,
                'price'=>600,
                'discount'=>45,
                'user_id'=>User::all()->random()->id,
            ],

            [
                'title'=>'Month',
                'screen_type_id'=>3,
                'plan_id'=>6,
                'status'=>1,
                'price'=>600,
                'discount'=>15,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'3 Month',
                'screen_type_id'=>3,
                'plan_id'=>6,
                'status'=>1,
                'price'=>600,
                'discount'=>25,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'6 Month',
                'screen_type_id'=>3,
                'plan_id'=>6,
                'status'=>1,
                'price'=>600,
                'discount'=>45,
                'user_id'=>User::all()->random()->id,
            ],
            [
                'title'=>'Year',
                'screen_type_id'=>3,
                'plan_id'=>6,
                'status'=>1,
                'price'=>600,
                'discount'=>55,
                'user_id'=>User::all()->random()->id,
            ],

        ];

        for ($i = 0; $i < count($prices); $i++) {
            $cat = new ScreenPrice();
            $cat->status = 1;
            $cat->screen_type_id = $prices[$i]['screen_type_id'];
            $cat->plan_id = $prices[$i]['plan_id'];
            $cat->price = $prices[$i]['price'];
            $cat->discount = $prices[$i]['discount'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            ScreenPriceTranslation::create([
                'screen_price_id' => $cat->id,
                'locale' => 'en',
                'title' => $prices[$i]['title'],
            ]);
        }
    }
}
