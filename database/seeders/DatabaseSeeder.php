<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ServiceInfoTranslation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            PermissionsTableSeeder::class,
            AdminUserTableSeeder::class,
            SettingsTableSeeder::class,
            SliderTableSeeder::class,
            CatTableSeeder::class,
            MechanismTableSeeder::class,
            AboutSubjectTableSeeder::class,
            ServiceTableSeeder::class,
            ClientTableSeeder::class,
            CityTableSeeder::class,
            ScreenTypeTableSeeder::class,
            ScreenTableSeeder::class,
            PlanTableSeeder::class,
            ScreenPriceTableSeeder::class,
            ProductTableSeeder::class,
            ServiceDescriptionTableSeeder::class,
            WorkSampleTableSeeder::class,
            WhyDigitalTableSeeder::class,
            JobsTableSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
