<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Family;
use Illuminate\Support\Str;

class FamilyCreate extends Component
{
    public $name;
    public $families;

    protected $rules = [
        'name' => 'required|string',
    ];

    public function mount()
    {
        $this->families = Family::all();
    }

    public function saveFamily()
    {
        $this->validate();
    
        Family::create([
            'slug' => Str::slug($this->name . '-' . Str::random(8), '-'),
            'name' => $this->name,
        ]);

        $this->name = '';

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.family-create');
    }
}
