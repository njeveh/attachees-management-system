<?php

namespace App\Http\Livewire;

use App\Models\Advert;
use App\Models\Department;
use Livewire\Component;

class ShowAdverts extends Component
{
    public $search = '';
    public $name;

    public function render()
    {
        /**
         * whereLike is a query builder macro defined on /Providers/AppserviceProvider boot method
         * 
        */
        $departments = Department::all();
        $adverts = Advert::whereLike(['title', 'description','reference_number', 'department.name', 'accompaniments.value'], $this->search ?? '')
        ->get();
        return view('livewire.show-adverts', ['adverts' => $adverts, 'departments' => $departments]);
    }

    // public function updatingSearch()
    // {
    //     $this->resetPage();
    // }
    public function resetFilters()
    {
        $this->reset('search');
    
        // $this->reset(['search', 'isActive']);
        // // Will reset both the search AND the isActive property.
    
        // $this->resetExcept('search');
        // // Will only reset the isActive property (any property but the search property).
    }
}
