<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Campaign;

class CampaignShow extends Component
{
    use WithFileUploads;

    public Campaign $campaign;

    protected $rules = [
        'campaign.name' => 'required|string',
        'campaign.description' => 'required|string',
        'campaign.started_at' => 'required|date:Y-m-d',
        'campaign.ended_at' => 'required|date:Y-m-d',
        'campaign.icon' => 'image|mimes:png|max:1024',
        'campaign.logo' => 'image|mimes:png|max:1024',
        'campaign.background' => 'image|mimes:png|max:2048', // 2MB Max
        'campaign.family' => 'required',
        'campaign.private' => 'required',
        'campaign.image' => 'required',
    ];

    public function saveCampaign()
    {
        $this->validate();
        
        //dd($this->campaign);
        $this->campaign->update();

        $this->emit('campaign_saved');
    }

    public function render()
    {
        return view('livewire.campaign-show');
    }
}
