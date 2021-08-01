<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;

class RecieveDonations extends Component
{
    public Campaign $campaign;

    public function mount(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function completeWishlist()
    {
        $this->wishlist->completeWishlist();
    }

    public function render()
    {
        return view('livewire.recieve-donations');
    }
}
