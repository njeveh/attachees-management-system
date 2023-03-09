<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            [
               'name'=>'ICT Department',
               'description'=>'ict departmet',
               'department_head' => 'Ict department Head',
               'email' => 'ict.department@jkuat.ac.ke',
               'phone' => '+254711122233'
            ],
            [
               'name'=>'Dipca',
               'description'=>'dipca',
                'department_head' => 'Dipca Head',
               'email' => 'dipca.department@jkuat.ac.ke',
               'phone' => '+254711122244'
            ],
            [
               'name'=>'Central Services',
               'description'=>'central services',
               'department_head' => 'Central Services Head',
               'email' => 'central.department@jkuat.ac.ke',
               'phone' => '+254711122255'
            ],
        ];
    
        foreach ($department as $key => $department) {
            Department::create($department);
        }
    }
}
