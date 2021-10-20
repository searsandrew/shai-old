<?php

namespace App\Mail;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use Auth;

class DoneeSelected extends Mailable
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
    public function __construct(Campaign $campaign, $user = false)
    {
        $this->campaign = $campaign;
        $this->user = !$user ? Auth::user() : $user;
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
        return $this->markdown('emails.donee-selected');
    }
}
