<?php

namespace App\Http\Livewire;

use App\Models\Donee;
use Livewire\Component;

use Auth;

class CreateDonee extends Component
{
    public Donee $donee;
    public $campaigns;

    protected $rules = [
        'donee.name' => 'required|string',
        'donee.description' => 'required|string|max:200',
        'campaigns.*.name' => 'required',
        'campaigns.*.description' => 'required',
        'campaigns.*.started_at' => 'required',
        'campaigns.*.ended_at' => 'required',
    ];

    public function mount()
    {
        $this->campaigns = Auth::user()->campaigns;
    }

    public function saveDonee()
    {
        $this->validate();

        $this->donee->save();
    }

    public function render()
    {
        return view('livewire.create-donee');
    }
}
