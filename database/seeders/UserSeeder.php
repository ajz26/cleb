<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Users\User::factory()->create([
            'name' => 'tony',
            'email' => 'azambrano@cleb.es',
            'password' => Hash::make('12345678'),
            'state' => 'Active'
        ])->assignRole('Super Admin');


        \App\Models\Users\Cleb::factory()->create([
            'name' => 'tony',
            'email' => 'azambrano2@cleb.es',
            'password' => Hash::make('12345678'),
            'state' => 'Active'
        ])->assignRole('Cleb');



        $users = \App\Models\Users\User::factory(100)->create();

        foreach($users AS $user){
            $user->assignRole('Client');
        }
    }
}
