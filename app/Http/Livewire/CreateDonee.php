<?php

namespace App\Http\Livewire;

use App\Models\Donee;
use App\Models\Family;
use Illuminate\Support\Str;
use Livewire\Component;

use Auth;

class CreateDonee extends Component
{
    public $firstname, $description, $age, $gender, $family, $campaigns;
    public $families;

    protected $rules = [
        'firstname' => 'required|string',
        'description' => 'required|string|max:200',
        'age' => 'required|integer',
        'gender' => 'required',
        'family' => 'required',
    ];

    public function mount()
    {
        $this->campaigns = Auth::user()->campaigns;
        $this->families = Family::all();
    }

    public function saveDonee()
    {
        $this->validate();
    
        $family = Family::find($this->family);
        $family->donees()->create([
            'slug' => Str::slug($this->firstname . '-' . Str::random(8), '-'),
            'firstname' => $this->firstname,
            'description' => $this->description,
            'age' => $this->age,
            'gender' => $this->gender,
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.create-donee');
    }
}
