<?php

namespace App\Livewire;

use App\Models\Campus;
use Livewire\Component;

class CampusList extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $selectedCampus = null;

    public $search = '';
    public $campuses = [];

    public $name;
    public $address;
    public $is_active = 1;

    public $edit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'is_active' => 'required|boolean',
    ];

    public function mount()
    {
        $this->campuses = Campus::all();
    }

    public function updatedSearch()
    {
        $this->filterCampus('search');
    }

    public function filterCampus($category)
    {
        $query = Campus::query();

        if ($category == 'search' && $this->search) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            });
        }
    
        $this->campuses = $query->get();
    }

    public function deactivateCampus($campusId)
    {
        $campus = Campus::find($campusId);

        if ($campus) {
            $campus->update(['is_active' => false]);
            $this->js("alert('Campus deactivated successfully!')");
        } else $this->js("alert('Campus not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function reactivateCampus($campusId)
    {
        $campus = Campus::find($campusId);

        if ($campus) {
            $campus->update(['is_active' => true]);
            $this->js("alert('Campus reactivated successfully!')");
        } else $this->js("alert('Campus not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function addModal() {
        $this->edit = false;
        $this->reset(['name', 'address', 'is_active', 'search']);
    }

    public function addCampus()
    {
        $this->validate();

        Campus::create([
            'name' => $this->name,
            'address' => $this->address,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['name', 'address', 'is_active', 'search']);

        $this->dispatch('closeModal');

        $this->js("alert('Campus added successfully!')");
        
        $this->campuses = Campus::all();
    }

    public function campusDetails($campusId)
    {
        $campus = Campus::find($campusId);
        if ($campus) {
            $this->selectedCampus = $campus->id;
            $this->name = $campus->name;
            $this->address = $campus->address;
            $this->is_active = $campus->is_active;
            $this->edit = true;

            $this->dispatch('showModal');
        } else $this->js("alert('Campus not found.')");
    }

    public function updateCampus()
    {
        $this->validate();

        $campus = Campus::find($this->selectedCampus);
        if ($campus) {
            $campus->update([
                'name' => $this->name,
                'address' => $this->address,
                'is_active' => $this->is_active,
            ]);

            $this->dispatch('closeModal');

            $this->js("alert('Campus updated successfully!')");
            $this->edit = false;

            $this->campuses = Campus::all();

            $this->reset(['selectedCampus', 'name', 'address', 'is_active']);
        } else {
            $this->js("alert('Campus not found.')");
        }
    }

    public function render()
    {
        return view('livewire.campus-list');
    }
}
