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
            ],
            [
               'name'=>'Dipca',
               'description'=>'dipca',
            ],
            [
               'name'=>'Central Services',
               'description'=>'central services',
            ],
        ];
    
        foreach ($department as $key => $department) {
            Department::create($department);
        }
    }
}
