<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\ScreenPrice;
use App\Models\ScreenPriceTranslation;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products=[
            [
                'title'=>'Wireless Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system',
            ],
            [
                'title'=>'WiFi Add-On Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'vUltra HD DVR System',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'Smart Door Lock',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'HD Lens Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'HD Lens Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'1080p WiFi Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'CCTV Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'Full HD WiFi Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'HD Lens Camer',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
            [
                'title'=>'HD Wi-Fi Home Camera',
                'description'=>'We pride ourselves on going above and beyond for the customer on every project we take on. Whether you’re looking for a surveillance camera installation or an access control system installation, it’s important that the security system installer you choose has the experience and vision to help you achieve your security goals. Our commercial security services are about more than surveillance system'
            ],
        ];
        $dice = [1, 2, 3, 4, 5];
        $rand=rand(100,500);
        for ($i = 1; $i < count($products); $i++) {
            $product = new Product();
            $product->status = 1;
            $product->views = 1;
            $product->price =$rand;
            $product->img = 'product'.$i.'.png';
            $product->user_id = User::all()->random()->id;
            $product->save();
            ProductTranslation::create([
                'product_id' => $product->id,
                'locale' => 'en',
                'title' => $products[$i]['title'],
                'description' => $products[$i]['description'],
            ]);
//            $product->cats()->attach(array_rand($dice));
        }
    }
}
