<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;
use App\Models\Wishlist;

class CheckinWishlist
{
    use AsAction;

    public function handle(Wishlist $wishlist)
    {
        return $wishlist->update([
            'status' => 'completed',
        ]);
    }

    public function asController(Wishlist $wishlist)
    {
        if($this->handle($wishlist))
        {
            return redirect(route('campaign.show', $wishlist->campaign));
        }

        return redirect(route('wishlist.collect', $wishlist));
    }
}
