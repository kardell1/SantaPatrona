<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    public function run(): void
    {
        $branches = [
            [
                'code' => "lpz-001",
                'name' => 'Dragon Principal',
                'direction' => 'Garita de lima #1450'
            ],
            [
                'code' => "eal-001",
                'name' => 'Dragon Secundario',
                'direction' => 'Ballivian #56'
            ]
        ];
        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
