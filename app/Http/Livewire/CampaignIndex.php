<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class CampaignIndex extends Component
{
    public $campaigns;

    public function mount()
    {
        $this->campaigns = Campaign::all();
    }

    public function render()
    {
        return view('livewire.campaign-index');
    }
}
