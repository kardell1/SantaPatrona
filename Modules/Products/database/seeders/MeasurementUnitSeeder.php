<?php

namespace Modules\Products\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Products\Models\MeasurementUnit;
use Modules\Products\Models\UnitType;

class MeasurementUnitSeeder extends Seeder
{
    public function run(): void
    {
        $units = [
            [
                'measurement' => 'longitud',
                'units' => [
                    ['name' => 'Milímetro', 'acronym' => 'mm'],
                    ['name' => 'Centímetro', 'acronym' => 'cm'],
                    ['name' => 'Metro', 'acronym' => 'm'],
                    ['name' => 'Kilómetro', 'acronym' => 'km'],
                    ['name' => 'Pulgada', 'acronym' => 'in'],
                    ['name' => 'Pie', 'acronym' => 'ft'],
                    ['name' => 'Yarda', 'acronym' => 'yd'],
                ],
            ],
            [
                'measurement' => 'peso', // o masa
                'units' => [
                    ['name' => 'Miligramo', 'acronym' => 'mg'],
                    ['name' => 'Gramo', 'acronym' => 'g'],
                    ['name' => 'Kilogramo', 'acronym' => 'kg'],
                    ['name' => 'Tonelada', 'acronym' => 't'],
                    ['name' => 'Onza', 'acronym' => 'oz'],
                    ['name' => 'Libra', 'acronym' => 'lb'],
                ],
            ],
            [
                'measurement' => 'volumen', // capacidad
                'units' => [
                    ['name' => 'mililitro', 'acronym' => 'mL'],
                    ['name' => 'litro', 'acronym' => 'L'],
                    ['name' => 'Metro cúbico', 'acronym' => 'm³'],
                    ['name' => 'Galón', 'acronym' => 'gal'],
                ],
            ],
            [
                'measurement' => 'area', //
                'units' => [
                    ['name' => 'Centímetro cuadrado', 'acronym' => 'cm²'],
                    ['name' => 'Metro cuadrado', 'acronym' => 'm²'],
                    ['name' => 'Hectárea', 'acronym' => 'ha'],
                    ['name' => 'Kilómetro cuadrado', 'acronym' => 'km²'],
                ],
            ],

            /* [ */
            /*     'measurement' => 'time', */
            /*     'units' => [ */
            /*         ['name' => 'Segundo', 'acronym' => 's'], */
            /*         ['name' => 'Minuto', 'acronym' => 'min'], */
            /*         ['name' => 'Hora', 'acronym' => 'h'], */
            /*         ['name' => 'Día', 'acronym' => 'd'], */
            /*     ], */
            /* ], */
            /* [ */
            /*     'measurement' => 'temperature', */
            /*     'units' => [ */
            /*         ['name' => 'Grado Celsius', 'acronym' => '°C'], */
            /*         ['name' => 'Grado Fahrenheit', 'acronym' => '°F'], */
            /*         ['name' => 'Kelvin', 'acronym' => 'K'], */
            /*     ], */
            /* ], */
            /* [ */
            /*     'measurement' => 'speed', */
            /*     'units' => [ */
            /*         ['name' => 'Metro por segundo', 'acronym' => 'm/s'], */
            /*         ['name' => 'Kilómetro por hora', 'acronym' => 'km/h'], */
            /*         ['name' => 'Milla por hora', 'acronym' => 'mph'], */
            /*     ], */
            /* ], */
            /* [ */
            /*     'measurement' => 'pressure', */
            /*     'units' => [ */
            /*         ['name' => 'Pascal', 'acronym' => 'Pa'], */
            /*         ['name' => 'Bar', 'acronym' => 'bar'], */
            /*         ['name' => 'Atmósfera', 'acronym' => 'atm'], */
            /*     ], */
            /* ], */
            /* [ */
            /*     'measurement' => 'energy', */
            /*     'units' => [ */
            /*         ['name' => 'Julio', 'acronym' => 'J'], */
            /*         ['name' => 'Kilojulio', 'acronym' => 'kJ'], */
            /*         ['name' => 'Caloría', 'acronym' => 'cal'], */
            /*         ['name' => 'Kilovatio-hora', 'acronym' => 'kWh'], */
            /*     ], */
            /* ], */
            /* [ */
            /*     'measurement' => 'power', */
            /*     'units' => [ */
            /*         ['name' => 'Vatio', 'acronym' => 'W'], */
            /*         ['name' => 'Kilovatio', 'acronym' => 'kW'], */
            /*         ['name' => 'Caballo de fuerza', 'acronym' => 'hp'], */
            /*     ], */
            /* ], */
            //
            [
                'measurement' => 'numero', // referente a contador
                'units' => [
                    ['name' => 'unidad', 'acronym' => 'u'],
                    ['name' => 'Pieza', 'acronym' => 'pz'],
                    ['name' => 'Docena', 'acronym' => 'doc'],
                    ['name' => 'par', 'acronym' => 'par'],
                    ['name' => 'Caja', 'acronym' => 'cja'],
                    ['name' => 'Paquete', 'acronym' => 'paq'],
                ],
            ],
        ];
        foreach ($units as $measurement) {
            $foundMeasurement = MeasurementUnit::firstOrCreate(
                ['name' => $measurement['measurement']],
                ['description' => 'Longitud']
            );

            foreach ($measurement['units'] as $units) {
                UnitType::create([
                    'measurement_unit_id' => $foundMeasurement->id,
                    'name' =>  $units['name'],
                    'acronym' => $units['acronym']
                ]);
            }
        }
    }
}
