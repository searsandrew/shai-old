<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class DoneeCard extends Component
{
    public Wishlist $wishlist;
    public bool $image;

    public function mount(bool $image)
    {
        $this->image = $image;
    }

    public function like()
    {
        $this->wishlist->addLikeBy(auth()->user());
    }

    public function selectWishlist()
    {
        $this->wishlist->addSelection();
    }

    public function render()
    {
        return view('livewire.donee-card');
    }
}
