<?php

namespace App\Actions;

use App\Models\Wishlist;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class UpdateWishlistFromQR
{
    use AsAction;

    public function handle(Wishlist $wishlist)
    {
        return $wishlist->addSelection();
    }

    public function asController(Wishlist $wishlist)
    {
        if($this->handle($wishlist))
        {
            return redirect(route('donee.index'))->with('success', 'Donee has been selected, please check your email for instructions.');
        }

        return redirect(route('dashboard'))->with('error', 'Donee selection unavailable, please make another selection.');
    }    
}
