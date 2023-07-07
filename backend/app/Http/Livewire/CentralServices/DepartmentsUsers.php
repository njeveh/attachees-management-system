<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\DepartmentAdmin;

class DepartmentsUsers extends Users
{
    public function render()
    {
        $department_users = DepartmentAdmin::whereLike(['first_name', 'last_name', 'staff_id',], $this->search ?? '')
            ->paginate(10);
        return view('livewire.central-services.departments-users', ['department_users' => $department_users]);
    }
}