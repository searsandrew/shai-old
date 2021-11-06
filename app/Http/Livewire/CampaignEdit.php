<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Campaign;
use Illuminate\Support\Str;

class CampaignEdit extends Component
{
    use WithFileUploads;

    public Campaign $campaign;
    public $icon, $logo, $background;
    public $replaceLogo = false, $replaceIcon = false, $replaceBackground = false;

    protected $rules = [
        'campaign.name' => 'required|string',
        'campaign.description' => 'required|string',
        'campaign.started_at' => 'required|date:Y-m-d',
        'campaign.ended_at' => 'required|date:Y-m-d',
        'campaign.family' => 'required',
        'campaign.private' => 'required',
        'campaign.image' => 'required',
    ];

    public function saveCampaign()
    {
        $this->validate([
            'icon' => 'image|mimes:png|max:1024',
            'logo' => 'image|mimes:png|max:1024',
            'background' => 'image|mimes:png|max:2048', // 2MB Max
        ]);

        $this->campaign->update();

        $imageSlug = Str::slug($this->campaign->name . '-' . Str::random(24), '-');
        if($this->icon)
        {
            $this->icon->storeAs('public/campaigns', $imageSlug . '-icon.png');
            $this->campaign->icon = 'public/campaigns/' . $imageSlug . '-icon.png';
        }

        if($this->logo)
        {
            $this->logo->storeAs('public/campaigns', $imageSlug . '-logo.png');
            $this->campaign->logo = 'public/campaigns/' . $imageSlug . '-logo.png';
        }

        if($this->background)
        {
            $this->background->storeAs('public/campaigns', $imageSlug . '-background.png');
            $this->campaign->background = 'public/campaigns/' . $imageSlug . '-background.png';
        }
        
        $this->campaign->save();

        $this->emit('campaign_saved');
    }

    public function render()
    {
        return view('livewire.campaign-edit');
    }
}
