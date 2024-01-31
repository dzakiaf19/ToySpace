<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $userOne = User::create([
            'firstName' => 'Dzaki',
            'lastName' => 'Ahmad',
            'email' => 'ayam@gmail.com',
            'phone' => '82333948689',
            'address' => 'Banyuwangi',
            'birthdate' => '2002-06-19',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty12345'), // password
            'remember_token' => Str::random(10),
        ]);
        
        $userTwo = User::create([
            'firstName' => 'dsda',
            'lastName' => 'dasdas',
            'email' => 'bebek@gmail.com',
            'phone' => '82331038672',
            'address' => 'Banyuwangi',
            'birthdate' => '2002-06-19',
            'email_verified_at' => now(),
            'password' => Hash::make('qwerty12345'), // password
            'remember_token' => Str::random(10),
        ]);

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'user']);

        $userOne->assignRole('superadmin');
        $userTwo->assignRole('user');
    }
}
