<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{

    public function run()
    {

        User::create(['nom' => 'shimi', 'prenom' => 'younes', 'email' => 'floflo@gmail.com', 'profil' => 'admin', 'address' => 'admin@gmail.com', 'zipCode' => '97410', 'numero_telephone' => '0601020304', 'city' => 'Saint-Pierre', 'password' => bcrypt('123456')]);


    }
}
