<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Family;
use Illuminate\Support\Str;

class FamilyEdit extends Component
{
    public $families;

    protected $rules = [
        'families.*.name' => 'required|string',
    ];

    public function mount($families)
    {
        $this->families = $families;
    }

    public function saveFamilies()
    {
        $this->validate();

        foreach($this->families as $index => $family)
        {
            $family = Family::find($this->families[$index]->id);
            if($family->name != $this->families[$index]->name)
            {
                $family->update([
                    'slug' => Str::slug($this->families[$index]->name . '-' . Str::random(8), '-'),
                    'name' => $this->families[$index]->name,
                ]);
                $this->emit('savedFamilies');
            }
        }
    }

    public function render()
    {
        return view('livewire.family-edit');
    }
}
