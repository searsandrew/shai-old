<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Campaign;
use App\Models\Wishlist;

class RecieveDonations extends Component
{
    public Campaign $campaign;
    public Wishlist $wishlist;

    public function mount(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function completeWishlist(Wishlist $wishlist)
    {
        $wishlist->completeWishlist();
    }

    public function render()
    {
        return view('livewire.recieve-donations');
    }
}
