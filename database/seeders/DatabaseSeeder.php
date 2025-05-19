<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\PlanktonCategory;
use App\Models\PlanktonSubcategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Enterprise',
            'email' => 'enterprise@enterprise.com',
            'phone' => '017',
            'password' => Hash::make('12345678'),
            'user_type' => 'enterprise',
        ]);
        User::factory()->create([
            'name' => 'Tecnician',
            'email' => 'individual@individual.com',
            'phone' => '018',
            'password' => Hash::make('12345678'),
            'user_type' => 'individual',
        ]);

        // Pond::factory()  when developing use this
        // ->has(
        //     Observation::factory()
        //         ->has(InputObservation::factory()
        //             ->has(InputRemarksAndRx::factory()
        //                 ->has(InputProductUsageReading::factory()->count(3))
        //             )
        //         )
        // )->create();


        $this->call(SystemSettingSeeder::class);
        $this->call([RoleSeeder::class, AreaFarmingTypeSeeder::class, AreaMeasurementSeeder::class, ParameterSeeder::class, EnterpriseSeeder::class, CategoryAndSubCategorySeeder::class]);
        $this->call([ProductSeeder::class, PondSeeder::class, ObservationSeeder::class, InputObservationSeeder::class, BiomassObservationSeeder::class, PondObservationSeeder::class, InputFarmerCommentSeeder::class, InputRemarksAndRxSeeder::class, InputFeedingSeeder::class, InputProductUsageSeeder::class]);

        $this->call(InputFeedingReadingSeeder::class);
        $this->call(InputProductUsageReadingSeeder::class);
        $this->call(InputRemarksAndRxReadingSeeder::class);


        $this->call(PondWaterSeeder::class);
        $this->call(PondSoilSeeder::class);
        $this->call(PondPlanktonSeeder::class);
        $this->call(PondMicrobeSeeder::class);

        PlanktonCategory::factory()
            ->count(5)
            ->has(PlanktonSubcategory::factory()->count(3), 'subcategories')
            ->create();

        $this->call(PondWaterReadingSeeder::class);
        $this->call(PondSoilReadingSeeder::class);
        $this->call(PondPlanktonReadingSeeder::class);
        $this->call(PondMicrobeReadingSeeder::class);

    }
}
