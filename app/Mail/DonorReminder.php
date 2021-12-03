<?php

namespace App\Mail;

use App\Models\Campaign;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonorReminder extends Mailable
{
    use Queueable, SerializesModels;

    public Campaign $campaign;
    public $wishlists;
    public User $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Wishlist $wishlist)
    {
        $this->campaign = $wishlist->campaign;
        $this->user = $wishlist->user;
        $this->wishlists = $this->getWishlists();
    }

    public function getWishlists()
    {
        if($this->campaign->family == 'true')
        {
            return $this->user->familyWishlistsByCampaign($this->campaign->id);
        }
        return $this->user->wishlistsByCampaign($this->campaign->id);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.donor-reminder');
    }
}
