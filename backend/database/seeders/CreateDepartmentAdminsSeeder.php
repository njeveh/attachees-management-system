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
                'user_id' => 'ec1f765e-acc4-43ea-bddd-91a501eee28a',
                'department_id' => '26a5d95f-1324-47b9-aabc-56c74a15e1ff',
                'first_name' => 'ICT Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254700011111',
                'staff_id' => 'jkuat0900/ict',
            ],
            [
                'user_id' => '884086ed-6082-4df8-b086-16091dc820a9',
                'department_id' => '0c30afb8-6397-452d-bff8-2d7a6f57f5e1',
                'first_name' => 'Finance Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254703311112',
                'staff_id' => 'jkuat0900/fin',
            ],
            [
                'user_id' => '92fc67a9-ce7b-450c-88e6-126d66cadd57',
                'department_id' => '56ee9b58-ee60-4c42-a17b-b3b860eb5f2b',
                'first_name' => 'Transportation',
                'last_name' => 'JKUAT',
                'phone_number' => '+254722011144',
                'staff_id' => 'jkuat0900/trans',
            ],
            [
                'user_id' => '98c9ea00-0e76-496f-b5b7-88dab2a72296',
                'department_id' => '86cc2593-f717-4ef7-8711-d37b410b7c46',
                'first_name' => 'Human Resource',
                'last_name' => 'JKUAT',
                'phone_number' => '+254700611118',
                'staff_id' => 'jkuat0900/hr',
            ],
        ];

        foreach ($department_admins as $key => $department_admin) {
            DepartmentAdmin::create($department_admin);
        }
    }
}