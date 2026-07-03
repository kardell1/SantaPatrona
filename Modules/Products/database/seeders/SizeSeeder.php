<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Size;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = [
            [
                'size_system' => 'EU',
                'gender' => 'both',
                'items' =>  [
                    35,
                    36,
                    37,
                    38,
                    39,
                    40,
                    41,
                    42,
                    43,
                    44,
                    45,
                    46,
                    47
                ]
            ],
            [
                'size_system' => 'BR',
                'gender' => 'both',
                'items' =>  [
                    35,
                    36,
                    37,
                    38,
                    39,
                    40,
                    41,
                    42,
                    43,
                    44,
                    45,
                    46,
                    47
                ]
            ],
            [
                'size_system' => 'US',
                'gender' => 'both',
                'items' =>  [
                    35,
                    36,
                    37,
                    38,
                    39,
                    40,
                    41,
                    42,
                    43,
                    44,
                    45,
                    46,
                    47
                ]
            ],
        ];

        $clean = [];

        foreach ($sizes as $item) {
            foreach ($item['items'] as $number) {
                $clean[] = [
                    'size' => $number,
                    'description' => null,
                    'size_system' => $item['size_system'],
                    'equivalence_id' => null,
                    'gender' => $item['gender']
                ];
            }
        }

        Size::insert($clean);
    }
}
