<?php

namespace App\Http\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class DoneeCard extends Component
{
    public Wishlist $wishlist;
    public bool $image;
    public bool $deselectingWishlist = false;
    public bool $infoModal = false;

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

    public function deselectWishlist()
    {
        $this->wishlist->removeSelection();
        $this->deselectingWishlist = false;
    }

    public function render()
    {
        return view('livewire.donee-card');
    }
}
