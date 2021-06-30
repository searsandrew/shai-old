<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

use Illuminate\Database\Eloquent\Collection;

class Dashboard extends Component
{
    public Collection $campaigns;

    public function mount()
    {
        $this->campaigns = Campaign::whereDate('started_at', '<=', now())->whereDate('ended_at', '>=', now())->get();
        // foreach($this->campaigns as $campaign)
        // {
        //     dd($campaign->wishlists);
        // }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
