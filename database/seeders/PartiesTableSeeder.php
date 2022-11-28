<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Party;

class PartiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Party::create([
                'name' => 'Action Alliance',
                'aspirant' => 'Chukwunonso Daniel Ogbe',
                'running_mate' => 'Iyida Ikechukwu Onyedika',
            ]);

        Party::create([
                'name' => 'Action Democratic Party',
                'aspirant' => 'Nnamdi Omeje',
                'running_mate' => 'Ifeoma Stella Ani',
            ]);

        Party::create([
                'name' => 'Action Peoples Party',
                'aspirant' => 'Afamefuna Samuel Ani',
                'running_mate' => 'Anthony Adinifekwu Aduaka',
            ]);

        Party::create([
                'name' => 'African Action Congress',
                'aspirant' => 'Ray Ogbodo',
                'running_mate' => 'Shedrack Ejiofor Itodo',
        ]);

        Party::create([
                'name' => 'African Democratic Congress',
                'aspirant' => 'Celestina Anita Ugwanyi',
                'running_mate' => 'Donatus Ozoemena',
        ]);

        Party::create([
                'name' => 'Allied Peoples Movement',
                'aspirant' => 'Kenneth Odoh Ikeh',
                'running_mate' => 'Chigozie Onovo',
        ]);

        Party::create([
                'name' => 'APC',
                'aspirant' => 'Uche Nnaji',
                'running_mate' => 'George Ogara',
            ]);

        Party::create([
                'name' => 'APGA',
                'aspirant' => 'Frank Nweke',
                'running_mate' => 'Edith Ugwuanyi',
            ]);

        Party::create([
                'name' => 'Labour Party',
                'aspirant' => 'Chijioke Jonathan Edeoga',
                'running_mate' => 'John Nwokeabia',
            ]);
        Party::create([
                'name' => 'National Rescue Movement',
                'aspirant' => 'Cyril Elochukwu Mamah',
                'running_mate' => 'Helen Onuegbunam Okwor',
            ]);
        Party::create([
                'name' => 'New Nigeria Peoples Party',
                'aspirant' => 'Cajetan Eze',
                'running_mate' => 'Francis Ifesinachi Nwodo',
            ]);
        Party::create([
                'name' => 'PDP',
                'aspirant' => 'Peter Mbah',
                'running_mate' => 'Ifeanyi Ossai',
            ]);
        Party::create([
                'name' => 'Peoples Redemption Party',
                'aspirant' => 'Helen Onuegbunam Okwor',
                'running_mate' => 'Chidozie Anthony Oziko',
            ]);
        Party::create([
                'name' => 'Social Democratic Party',
                'aspirant' => 'Pearl Ogochukwu Nweze',
                'running_mate' => 'Mark Anthony Eze',
            ]);
        Party::create([
                'name' => 'Young Progressives Party',
                'aspirant' => 'Ugochukwu Edeh',
                'running_mate' => 'James Chidiebere Agbo',
            ]);
        Party::create([
                'name' => 'Zenith Labour Party',
                'aspirant' => 'Elvis Chinazam Ugwoke',
                'running_mate' => 'Daniel Okwudili Mba',
            ]);
    }
}
