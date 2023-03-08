<?php

namespace Database\Seeders;

use App\Models\CentralServicesAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateCentralServicesAdminsSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'user_id' => 13,
               'first_name'=>'Central Services Admin',
               'last_name'=>'JKUAT',
               'phone_number'=>'+254700611118',
            ],
        ];
    
        foreach ($admins as $key => $admin) {
            CentralServicesAdmin::create($admin);
        }
    }
}
