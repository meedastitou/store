<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ville;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $ville = Ville::create([
            'nom' => 'tanger'
        ]); 
        $user = User::create([
            'f_name'    => 'super',
            'l_name'    => 'admin',
            'email'     => 'superadmin@gmail.com',
            'password'  => Hash::make('password'),
            'tel'       => '0611223344',
            'cne'       => 'xx1212',
            'status'    => 1,
            'ville_id'  => $ville->id,
        ]);

        $user->assignRole('super admin');   
    }
}
