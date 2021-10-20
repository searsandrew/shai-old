<?php

namespace App\Http\Livewire;

use App\Models\Donee;
use Livewire\Component;

use Auth;

class EditDonee extends Component
{
    public Donee $donee;
    public $wishlists;

    protected $rules = [
        'donee.firstname' => 'required|string|min:2',
        'donee.lastname' => 'required|string',
        'donee.description' => 'required|string|max:500',
        'donee.age' => 'required|integer',
        'donee.gender' => 'required',
        'wishlists.*.wishlist' => 'required|string|max:500',
        'wishlists.*.status' => 'required|string|max:25',
    ];

    public function mount()
    {
        $this->wishlists = $this->donee->wishlists;
    }

    public function saveWishlist()
    {
        $this->validate();

        foreach($this->wishlists as $wishlist)
        {
            $wishlist->save();
            $this->emit('savedWishlist');
        }
    }

    public function saveDonee()
    {
        $this->validate();

        $this->donee->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.edit-donee');
    }
}
