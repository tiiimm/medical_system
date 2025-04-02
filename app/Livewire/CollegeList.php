<?php

namespace App\Livewire;

use App\Models\College;
use Livewire\Component;

class CollegeList extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $selectedCollege = null;

    public $search = '';
    public $colleges = [];

    public $name;
    public $abbreviation;
    public $is_active = 1;

    public $edit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'abbreviation' => 'required|string|max:255',
        'is_active' => 'required|boolean',
    ];

    public function mount()
    {
        $this->colleges = College::all();
    }

    public function updatedSearch()
    {
        $this->filterColleges('search');
    }

    public function filterColleges($category)
    {
        $query = College::query();

        if ($category == 'search' && $this->search) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('abbreviation', 'like', '%' . $this->search . '%');
            });
        }
    
        $this->colleges = $query->get();
    }

    public function deactivateCollege($collegeId)
    {
        $college = College::find($collegeId);

        if ($college) {
            $college->update(['is_active' => false]);
            $this->js("alert('College deactivated successfully!')");
        } else $this->js("alert('College not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function reactivateCollege($collegeId)
    {
        $college = College::find($collegeId);

        if ($college) {
            $college->update(['is_active' => true]);
            $this->js("alert('College reactivated successfully!')");
        } else $this->js("alert('College not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function addModal() {
        $this->edit = false;
        $this->reset(['name', 'abbreviation', 'is_active', 'search']);
        $this->dispatch('showModal');
    }

    public function addCollege()
    {
        $this->validate();
        
        College::create([
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['name', 'abbreviation', 'is_active', 'search']);

        $this->dispatch('closeModal');

        $this->js("alert('College added successfully!')");
        
        $this->colleges = College::all();
    }

    public function collegeDetails($collegeId)
    {
        $college = College::find($collegeId);
        if ($college) {
            $this->selectedCollege = $college->id;
            $this->name = $college->name;
            $this->abbreviation = $college->abbreviation;
            $this->is_active = $college->is_active;
            $this->edit = true;

            $this->dispatch('showModal');
        } else $this->js("alert('College not found.')");
    }

    public function updateCollege()
    {
        $this->validate();

        $college = College::find($this->selectedCollege);
        if ($college) {
            $college->update([
                'name' => $this->name,
                'abbreviation' => $this->abbreviation,
                'is_active' => $this->is_active,
            ]);

            $this->dispatch('closeModal');

            $this->js("alert('College updated successfully!')");
            $this->edit = false;

            $this->colleges = College::all();

            $this->reset(['selectedCollege', 'name', 'abbreviation', 'is_active']);
        } else {
            $this->js("alert('College not found.')");
        }
    }

    public function render()
    {
        return view('livewire.college-list');
    }
}
