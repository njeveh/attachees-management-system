<?php

namespace App\Http\Livewire\CentralServices;

use App\Models\DipcaAdmin;

class DipcaUsers extends Users
{
    public function render()
    {
        $dipca_users = DipcaAdmin::whereLike(['first_name', 'last_name', 'staff_id',], $this->search ?? '')
            ->paginate(1);
        return view('livewire.central-services.dipca-users', ['dipca_users' => $dipca_users]);
    }
}