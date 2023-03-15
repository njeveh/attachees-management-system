<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'ICT Department',
               'email'=>'ict.admin@jkuat.com',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Finance Department',
               'email'=>'finance.admin@jkuat.com',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Transport Department',
               'email'=>'transport.admin@jkuat.com',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Human Resource Department',
               'email'=>'hr.admin@jkuat.com',
               'type'=>3,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Central Services Admin',
               'email'=>'central.services.admin@jkuat.com',
               'type'=>4,
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Dipca Admin',
               'email'=>'dipca@jkuat.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
