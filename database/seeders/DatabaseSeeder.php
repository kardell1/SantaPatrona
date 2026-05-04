<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\IAM\Database\Seeders\IAMDatabaseSeeder;
use Modules\Production\Database\Seeders\ProductionDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            IAMDatabaseSeeder::class,
            ProductionDatabaseSeeder::class,
        ]);
    }
}
