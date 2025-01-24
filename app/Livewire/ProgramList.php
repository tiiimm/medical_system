<?php

namespace App\Livewire;

use App\Models\College;
use App\Models\Program;
use Livewire\Component;

class ProgramList extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $selectedProgram = null;

    public $search = '';
    public $programs = [];
    public $colleges = [];

    public $name;
    public $abbreviation;
    public $description;
    public $duration_years = 1;
    public $college_id = 1;
    public $is_active = 1;

    public $edit = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'abbreviation' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'college_id' => 'required|exists:colleges,id',
        'is_active' => 'required|boolean',
        'duration_years' => 'required|integer|min:1',
    ];

    public function mount()
    {
        $this->programs = Program::all();
        $this->colleges = College::all();
    }

    public function updatedSearch()
    {
        $this->filterPrograms('search');
    }

    public function filterPrograms($category)
    {
        $query = Program::query();

        if ($category == 'search' && $this->search) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('abbreviation', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%')
                    ->orWhere('duration_years', 'like', '%' . $this->search . '%')
                    ->orWhereHas('college', function ($query) {
                        $query->where('abbreviation', 'like', '%' . $this->search . '%');
                    });
            });
        }
    
        $this->programs = $query->with('college')->get();
    }

    public function deactivateProgram($programId)
    {
        $program = Program::find($programId);

        if ($program) {
            $program->update(['is_active' => false]);
            $this->js("alert('Program deactivated successfully!')");
        } else $this->js("alert('Program not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function reactivateProgram($programId)
    {
        $program = Program::find($programId);

        if ($program) {
            $program->update(['is_active' => true]);
            $this->js("alert('Program reactivated successfully!')");
        } else $this->js("alert('Program not found.')");
        
        $this->dispatch('refreshComponent');
    }

    public function addModal() {
        $this->edit = false;
        $this->reset(['name', 'abbreviation', 'description', 'duration_years', 'college_id', 'is_active', 'search']);
    }

    public function addProgram()
    {
        $this->validate();
    
        Program::create([
            'name' => $this->name,
            'abbreviation' => $this->abbreviation,
            'description' => $this->description,
            'duration_years' => $this->duration_years,
            'college_id' => $this->college_id,
            'is_active' => $this->is_active,
        ]);

        $this->reset(['name', 'abbreviation', 'description', 'duration_years', 'college_id', 'is_active', 'search']);
        
        $this->dispatch('closeModal');
        
        $this->js("alert('Program added successfully!')");

        $this->programs = Program::all();
    }

    public function programDetails($programId)
    {
        $program = Program::find($programId);
        if ($program) {
            $this->selectedProgram = $program->id;
            $this->name = $program->name;
            $this->abbreviation = $program->abbreviation;
            $this->description = $program->description;
            $this->duration_years = $program->duration_years;
            $this->college_id = $program->college_id;
            $this->is_active = $program->is_active;
            $this->edit = true;

            $this->dispatch('showModal');
        } else $this->js("alert('Program not found.')");
    }

    public function updateProgram()
    {
        $this->validate();

        $program = Program::find($this->selectedProgram);
        if ($program) {
            $program->update([
                'name' => $this->name,
                'abbreviation' => $this->abbreviation,
                'description' => $this->description,
                'duration_years' => $this->duration_years,
                'college_id' => $this->college_id,
                'is_active' => $this->is_active,
            ]);

            $this->dispatch('closeModal');

            $this->js("alert('Program updated successfully!')");
            $this->edit = false;

            $this->programs = Program::all();

            $this->reset(['selectedProgram', 'name', 'abbreviation', 'description', 'duration_years', 'college_id', 'is_active']);
        } else {
            $this->js("alert('Program not found.')");
        }
    }

    public function render()
    {
        return view('livewire.program-list');
    }
}
