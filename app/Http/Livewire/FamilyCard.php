<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Family;
use App\Models\Wishlist;

class FamilyCard extends Component
{
    public array $wishlists;
    public bool $image;
    public $wishlist;
    public Family $family;
    public bool $deselectingFamily = false;

    public function selectFamily()
    {
        foreach($this->wishlists as $wishlist)
        {
            $current = Wishlist::find($wishlist['id']);
            $current->addSelection();
        }
    }

    public function deselectFamily()
    {
        foreach($this->wishlists as $wishlist)
        {
            $current = Wishlist::find($wishlist->id);
            $current->removeSelection();
        }

        $this->deselectingFamily = false;
    }

    public function mount(bool $image, array $wishlist)
    {
        $pluck = $wishlist[0];
        $this->image = $image;
        $this->wishlists = $wishlist;
        $this->wishlist = $pluck;
        $this->family = Family::find($wishlist[0]->family);
    }

    public function render()
    {
        return view('livewire.family-card');
    }
}
