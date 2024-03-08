<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        


        // Create a user
        // $user = User::create([
        //     'name' => 'client',
        //     'email' => 'client@gmail.com',
        //     'password' => Hash::make('client'),
        //     'role' => 'client',
        // ]);
       

        // // Create a user
        // $user = User::create([
        //     'name' => 'organiser',
        //     'email' => 'organiser@gmail.com',
        //     'password' => Hash::make('organiser'),
        //     'role' => 'organiser',

        // ]);
       
    }
    
}
