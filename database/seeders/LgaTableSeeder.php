<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lga;

class LgaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lga::create([
            'id' =>  52,
            'name' => 'ANINRI',
        ]);

        Lga::create([
                'id' =>     73,
                'name' =>    'AWGU',
        ]);
        Lga::create([
            'id' =>     191,
            'name' =>'ENUGU EAST',
        ]);
        Lga::create([
            'id' => 192,
            'name' =>'ENUGU NORTH',
        ]);
        Lga::create([
            'id' => 193,
            'name' =>'ENUGU SOUTH',
        ]);
        Lga::create([
            'id' => 213,
            'name' =>'EZEAGU',
        ]);
        Lga::create([
            'id' => 308,
            'name' =>'IGBO ETITI',
        ]);
        Lga::create([
                'id' => 309,
            'name' =>'IGBO EZE NORTH',
        ]);
        Lga::create([
                'id' => 310,
                'name' =>'IGBO EZE SOUTH',
        ]);
        Lga::create([
                    'id' => 362,
                'name' =>'ISI UZO',
        ]);
        Lga::create([
                    'id' => 533,
                    'name' =>'NKANU EAST',
        ]);
        Lga::create([
                 'id' => 534,
                'name' =>'NKANU WEST',
        ]);
        Lga::create([
                'id' => 541,
                'name' =>'NSUKKA',
        ]);
        Lga::create([
                    'id' => 579,
                'name' =>'OJI-RIVER',
        ]);
        Lga::create([
                'id' => 716,
                'name' =>'UDENU',
        ]);
        Lga::create([
                    'id' => 717,
                'name' =>'UDI',
        ]);
        Lga::create([
                'id' => 739,
                'name' =>'UZO-UWANI',
        ]);


    }
}
