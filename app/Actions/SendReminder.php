<?php

namespace App\Actions;

use App\Mail\DonorReminder;
use App\Models\Campaign;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class SendReminder
{
    use AsAction;

    public function handle(Wishlist $wishlist)
    {
        Mail::to($wishlist->user)->send(new DonorReminder($wishlist));
    }

    public function asController(Campaign $campaign)
    {
        $incomplete = $campaign->wishlists()->where('status', 'selected')->get();
        if($incomplete->count() > 0)
        {
            foreach($incomplete as $remind)
            {
                $this->handle($remind);
            }
    
            return redirect(route('campaign.show', $incomplete->first()->campaign));
        }

        return back()->with('status', 'No reminders need to be sent.');
    }
}
