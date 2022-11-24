<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {


        $adminRole = Role::where('id', 1)->first();
        $lgaRole = Role::where('id', 2)->first();

        $admin = User::create([
            'id' => 1,
            'name' => 'Super Admin',
            'email' => 'admin@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password'),
            'approved' => 1,
            'verified' => 1,

        ]);

        // Aninri
        $Aninri = User::create([
            'name' => 'ANINRI',
            'email' => 'aninri@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password'),
            'approved' => 1,
            'verified' => 1,
        ]);
        // Awgu
        $Awgu = User::create([
            'name' => 'AWGU',
            'email' => 'awgu@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password'),
             'approved' => 1,
            'verified' => 1,
        ]);
        // Enugu East
        $EnuguEast = User::create([
            'name' => 'ENUGU EAST',
            'email' => 'enugueast@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password'),
            'approved' => 1,
            'verified' => 1,
        ]);
        // Enugu North
        $EnuguNorth = User::create([
            'name' => 'ENUGU NORTH',
            'email' => 'enugunorth@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Enugu South
        $EnuguSouth = User::create([
            'name' => 'ENUGU SOUTH',
            'email' => 'enugusouth@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);

        // Ezeagu
        $Ezeagu = User::create([
            'name' => 'EZEAGU',
            'email' => 'ezeagu@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);

        // Igbo Etiti
        $IgboEtiti = User::create([
            'name' => 'IGBO ETITI',
            'email' => 'igboetiti@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);


        // Igbo Eze North
        $IgboEzeNorth = User::create([
            'name' => 'IGBO EZE NORTH',
            'email' => 'igboezenorth@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Igbo Eze South
        $IgboEzeSouth = User::create([
            'name' => 'IGBO EZE SOUTH',
            'email' => 'igboezesouth@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Isi Uzo
        $IsiUzo = User::create([
            'name' => 'ISI UZO',
            'email' => 'isiuzo@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Nkanu East
        $NkanuEast = User::create([
            'name' => 'NKANU EAST',
            'email' => 'nkanueast@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Nkanu West
        $NkanuWest = User::create([
            'name' => 'NKANU WEST',
            'email' => 'nkanuwest@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        //  Nsukka
        $Nsukka = User::create([
            'name' => 'NSUKKA',
            'email' => 'nsukka@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Oji River
        $OjiRiver = User::create([
            'name' => 'OJI-RIVER',
            'email' => 'ojiriver@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Udenu
        $Udenu = User::create([
            'name' => 'UDENU',
            'email' => 'udenu@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Udi
        $Udi = User::create([
            'name' => 'UDI',
            'email' => 'udi@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);
        // Uzo-Uwani
        $UzoUwani = User::create([
            'name' => 'UZO-UWANI',
            'email' => 'uzouwani@alphamonitor.com',
            'avatar' => 'default.jpg',
            'password' => bcrypt('password')
        ]);

        $admin->roles()->attach($adminRole);
        $Nsukka->roles()->attach($lgaRole);
        $Aninri->roles()->attach($lgaRole);
        $Awgu->roles()->attach($lgaRole);
        $EnuguEast->roles()->attach($lgaRole);
        $EnuguNorth->roles()->attach($lgaRole);
        $IgboEtiti->roles()->attach($lgaRole);
        $EnuguSouth->roles()->attach($lgaRole);
        $Ezeagu->roles()->attach($lgaRole);
        $IgboEzeNorth->roles()->attach($lgaRole);
        $IgboEzeSouth->roles()->attach($lgaRole);
        $IsiUzo->roles()->attach($lgaRole);
        $NkanuEast->roles()->attach($lgaRole);
        $NkanuWest->roles()->attach($lgaRole);
        $Nsukka->roles()->attach($lgaRole);
        $OjiRiver->roles()->attach($lgaRole);
        $Udenu->roles()->attach($lgaRole);
        $Udi->roles()->attach($lgaRole);
        $UzoUwani->roles()->attach($lgaRole);
    }
}
