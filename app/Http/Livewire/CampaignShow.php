<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class CampaignShow extends Component
{
    public Campaign $campaign;

    public function render()
    {
        return view('livewire.campaign-show');
    }
}
