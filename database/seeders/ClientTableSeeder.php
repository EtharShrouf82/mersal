<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\ClientTranslation;
use App\Models\User;
use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            [
                'img' => 'client-1.png',
                'url' => '',
                'title' => 'Jerusalem',
                'status' => 1,
            ],
            [
                'img' => 'client-2.png',
                'url' => '',
                'title' => 'police',
                'status' => 1,
            ],
            [
                'img' => 'client-3.png',
                'url' => '',
                'title' => 'Tulkarem',
                'status' => 1,
            ],
            [
                'img' => 'client-4.png',
                'url' => '',
                'title' => 'jawwal',
                'status' => 1,
            ],
            [
                'img' => 'client-5.png',
                'url' => '',
                'title' => 'PPU',
                'status' => 1,
            ],
            [
                'img' => 'client-6.png',
                'url' => '',
                'title' => 'Khadoury',
                'status' => 1,
            ],
        ];

        for ($i = 0; $i < count($clients); $i++) {
            $cat = new Client();
            $cat->status = 1;
            $cat->img = $clients[$i]['img'];
            $cat->user_id = User::all()->random()->id;
            $cat->save();
            ClientTranslation::create([
                'client_id' => $cat->id,
                'locale' => 'en',
                'title' => $clients[$i]['title'],
            ]);
        }
    }
}
