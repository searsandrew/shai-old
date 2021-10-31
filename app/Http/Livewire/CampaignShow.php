<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Campaign;
use Illuminate\Support\Str;

class CampaignShow extends Component
{
    use WithFileUploads;

    public Campaign $campaign;
    public $imageSlug;
    public $showImport = false;

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

    public function mount()
    {
        $this->imageSlug = Str::slug($this->campaign->name . '-' . Str::random(24), '-');
    }

    public function saveCampaign()
    {
        $this->validate();
        
        $this->campaign->update();

        $this->emit('campaign_saved');
    }

    public function imageUpload()
    {
        $this->validate([
            'campaign.icon' => 'image|mimes:png|max:1024',
            'campaign.logo' => 'required|image|mimes:png|max:1024',
            'campaign.background' => 'image|mimes:png|max:2048', // 2MB Max
        ]);

        $imageSlug = Str::slug($this->name . '-' . Str::random(24), '-');
        $logoFilename = $this->logo->storeAs('public/campaigns', $imageSlug . '-logo');
    
    }

    public function render()
    {
        return view('livewire.campaign-show');
    }
}
