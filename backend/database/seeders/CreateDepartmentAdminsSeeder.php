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
                'user_id' => '996b86b7-9806-4490-96d3-070ed78b7ed1',
                'department_id' => '996b8705-bb3d-46fb-86ad-16070abf0f9b',
                'first_name' => 'ICT Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254700011111',
                'staff_id' => 'jkuat0900/ict',
            ],
            [
                'user_id' => '996b86b8-6674-4d4a-938a-f69f6195e7b5',
                'department_id' => '996b8706-7e47-496b-b317-5a99a67e8897',
                'first_name' => 'Finance Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254703311112',
                'staff_id' => 'jkuat0900/fin',
            ],
            [
                'user_id' => '996b86b8-be52-469b-99b0-6b3e8153cea8',
                'department_id' => '996b8706-04ae-491e-9e1f-3c7bfe9e5d94',
                'first_name' => 'Transportation',
                'last_name' => 'JKUAT',
                'phone_number' => '+254722011144',
                'staff_id' => 'jkuat0900/trans',
            ],
            [
                'user_id' => '996b86b9-7dc4-4cb2-98e2-8fd31fe0143e',
                'department_id' => '996b8706-445c-45e8-96f1-e4ad6f9ee6db',
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