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
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Siti Rahayu',
            'email' => 'siti.rahayu@gmail.com',
            'firstname' => 'Siti',
            'lastname' => 'Rahayu',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Ahmad Yudha',
            'email' => 'ahmad.yudha@gmail.com',
            'firstname' => 'Ahmad',
            'lastname' => 'Yudha',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Maria Dewi',
            'email' => 'maria.dewi@gmail.com',
            'firstname' => 'Maria',
            'lastname' => 'Dewi',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Budi Pratama',
            'email' => 'budi.pratama@gmail.com',
            'firstname' => 'Budi',
            'lastname' => 'Pratama',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Indah Sari',
            'email' => 'indah.sari@gmail.com',
            'firstname' => 'Indah',
            'lastname' => 'Sari',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Michael Smith',
            'email' => 'michael.smith@gmail.com',
            'firstname' => 'Michael',
            'lastname' => 'Smith',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Emily Davis',
            'email' => 'emily.davis@gmail.com',
            'firstname' => 'Emily',
            'lastname' => 'Davis',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Robert Anderson',
            'email' => 'robert.anderson@gmail.com',
            'firstname' => 'Robert',
            'lastname' => 'Anderson',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'Jennifer Lee',
            'email' => 'jennifer.lee@gmail.com',
            'firstname' => 'Jennifer',
            'lastname' => 'Lee',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'David Brown',
            'email' => 'david.brown@gmail.com',
            'firstname' => 'David',
            'lastname' => 'Brown',
            'password' => Hash::make('password'),
        ]);


    }
}
