<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\Equivalence;
use Modules\Products\Models\MeasurementUnit;

class MeasurementUnitSeeder extends Seeder
{
    public function run(): void
    {
        $measurementUnits = [
            // Peso
            [
                'type_unit' => 'peso',
                'name' => 'Gramo',
                'acronime' => 'g',
                'isBase' => true,
            ],
            [
                'type_unit' => 'peso',
                'name' => 'Kilogramo',
                'acronime' => 'kg',
                'isBase' => false,
            ],

            // Longitud
            [
                'type_unit' => 'longitud',
                'name' => 'Metro',
                'acronime' => 'm',
                'isBase' => true,
            ],
            [
                'type_unit' => 'longitud',
                'name' => 'Centímetro',
                'acronime' => 'cm',
                'isBase' => false,
            ],
            [
                'type_unit' => 'longitud',
                'name' => 'Milímetro',
                'acronime' => 'mm',
                'isBase' => false,
            ],

            // Capacidad
            [
                'type_unit' => 'capacidad',
                'name' => 'Litro',
                'acronime' => 'L',
                'isBase' => true,
            ],
            [
                'type_unit' => 'capacidad',
                'name' => 'Mililitro',
                'acronime' => 'mL',
                'isBase' => false,
            ],

            // Espesor
            [
                'type_unit' => 'espesor',
                'name' => 'Milímetro',
                'acronime' => 'mm',
                'isBase' => true,
            ],
            [
                'type_unit' => 'espesor',
                'name' => 'Centímetro',
                'acronime' => 'cm',
                'isBase' => false,
            ],
        ];

        // crear los datos de las unidades
        foreach ($measurementUnits as $unit) {
            MeasurementUnit::create([
                'type_unit' => $unit['type_unit'],
                'name' => $unit['name'],
                'acronime' => $unit['acronime'],
                'isBase' => $unit['isBase']
            ]);
        }

        $equivalences = [
            // Peso
            [
                'base' => 'Gramo',
                'equivalent' => 'Kilogramo',
                'factor' => 1000,
            ],

            // Longitud
            [
                'base' => 'Metro',
                'equivalent' => 'Centímetro',
                'factor' => 100,
            ],
            [
                'base' => 'Metro',
                'equivalent' => 'Milímetro',
                'factor' => 1000,
            ],

            // Capacidad
            [
                'base' => 'Litro',
                'equivalent' => 'Mililitro',
                'factor' => 1000,
            ],

            // Espesor
            [
                'base' => 'Milímetro',
                'equivalent' => 'Centímetro',
                'factor' => 10,
            ],
        ];
        // vincular las equivalencias
        foreach ($equivalences as $equivalence) {
            $foundBase = MeasurementUnit::where('name', $equivalence['base'])->first();

            $foundEquivalent = MeasurementUnit::where('name', $equivalence['equivalent'])->first();

            Equivalence::create([
                'base_unit_id' => $foundBase->id,
                'equivalence_id' => $foundEquivalent->id,
                'factor' => $equivalence['factor'],
            ]);
        }
    }
}
