<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class CampaignEdit extends Component
{
    public Campaign $campaign;

    protected $rules = [
        'campaign.name' => 'required|string',
        'campaign.description' => 'required|string',
        'campaign.started_at' => 'required|date:Y-m-d',
        'campaign.ended_at' => 'required|date:Y-m-d',
        'campaign.icon' => 'string',
        'campaign.logo' => 'string',
        'campaign.background' => 'string', // 2MB Max
        'campaign.family' => 'required',
        'campaign.private' => 'required',
        'campaign.image' => 'required',
    ];

    public function saveCampaign()
    {
        $this->validate();
        
        $this->campaign->update();

        $this->emit('campaign_saved');
    }

    public function render()
    {
        return view('livewire.campaign-edit');
    }
}
