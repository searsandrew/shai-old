<?php

namespace App\Mail;

use App\Models\Campaign;
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

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
        $this->wishlists = $this->getWishlists();
    }

    public function getWishlists()
    {
        if($this->campaign->design->family == 'true')
        {
            return Auth::user()->familyWishlistsByCampaign($this->campaign->id);
        }
        return Auth::user()->wishlistsByCampaign($this->campaign->id);
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
