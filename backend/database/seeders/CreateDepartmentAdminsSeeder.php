<?php

namespace Database\Seeders;

use App\Models\DepartmentAdmin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateDepartmentAdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department_admins = [
            [
                'user_id' => 1,
                'department_id' => 1,
               'first_name'=>'ICT Department',
               'last_name'=>'JKUAT',
               'phone_number'=>'+254700011111',
            ],
            [
                'user_id' => 3,
                'department_id' => 1,
               'first_name'=>'Department admin',
               'last_name'=>'JKUAT',
               'phone_number'=>'+254703311112',
            ],
            [
                'user_id' => 2,
                'department_id' => 2,
               'first_name'=>'DIPCA ADMIN',
               'last_name'=>'JKUAT',
               'phone_number'=>'+254722011144',
            ],
            [
                'user_id' => 4,
                'department_id' => 3,
               'first_name'=>'Central Services Admin',
               'last_name'=>'JKUAT',
               'phone_number'=>'+254700611118',
            ],
        ];
    
        foreach ($department_admins as $key => $department_admin) {
            DepartmentAdmin::create($department_admin);
        }
    }
}
