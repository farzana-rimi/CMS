<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'image'=>'https://img.freepik.com/premium-vector/monogram-initial-letter-with-feather-pen-author-logo-design-template_340145-78.jpg?w=740',           'type'=>'admin',
            'password'=>bcrypt('13579'),

        ]);
    }
}
