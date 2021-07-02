<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CampaignCreate extends Component
{
    use WithFileUploads;

    public $name, $description, $started, $ended, $icon, $logo, $image, $background, $family, $private;

    public function saveCampaign()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'started' => 'required|date:Y-m-d',
            'ended' => 'required|date:Y-m-d',
            'icon' => 'required|image|mimes:png|max:1024',
            'logo' => 'required|image|mimes:png|max:1024',
            'background' => 'required|image|mimes:png|max:2048', // 2MB Max
            'family' => 'required',
            'private' => 'required',
            'image' => 'required',
        ]);

        $imageSlug = Str::slug($this->name . '-' . Str::random(24), '-');
        $this->icon->storeAs('public/campaigns', $imageSlug . '-icon.png');
        $this->logo->storeAs('public/campaigns', $imageSlug . '-logo.png');
        $this->background->storeAs('public/campaigns', $imageSlug . '-background.png');

        Campaign::create([
            'slug' => Str::slug($this->name . '-' . Str::random(8), '-'),
            'name' => $this->name,
            'description' => $this->description,
            'started_at' => $this->started,
            'ended_at' => $this->ended,
            'design' => json_encode([
                'icon' => 'public/' . $imageSlug . '-icon.png',
                'logo' => 'public/' . $imageSlug . '-logo.png',
                'background' => 'public/' . $imageSlug . '-background.png',
                'family' => $this->family,
                'private' => $this->private,
                'image' => $this->image,
            ]),
        ]);

        $this->background->store('background');

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.campaign-create');
    }
}
