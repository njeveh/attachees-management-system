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
                'user_id' => '9cd5928d-54bb-4387-b2a7-4f13e1723f5e',
                'department_id' => '9cd593cb-649a-496a-8bce-6256722e39fc',
                'first_name' => 'ICT Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254700011111',
                'staff_id' => 'jkuat0900/ict',
            ],
            [
                'user_id' => '9cd5928d-6df2-4c7a-98d8-f46ae0019916',
                'department_id' => '9cd593cb-c850-4ddb-99b3-70832ba39469',
                'first_name' => 'Finance Department',
                'last_name' => 'JKUAT',
                'phone_number' => '+254703311112',
                'staff_id' => 'jkuat0900/fin',
            ],
            [
                'user_id' => '9cd5928d-950d-417f-9c7d-237f711b43c9',
                'department_id' => '9cd593cb-7e78-4225-98d5-dad0c44e6781',
                'first_name' => 'Transportation',
                'last_name' => 'JKUAT',
                'phone_number' => '+254722011144',
                'staff_id' => 'jkuat0900/trans',
            ],
            [
                'user_id' => '9cd5928d-b7ec-423a-bb9f-03a83a0bf617',
                'department_id' => '9cd593cb-9894-41f0-a113-a19d844360ec',
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