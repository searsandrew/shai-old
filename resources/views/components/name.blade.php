<span>
    {{ $wishlist->donee->firstname }}
    @if($wishlist->donee->privacy == true)
        {{ substr($wishlist->donee->lastname, 0, 1) }}
    @else
        @if($wishlist->campaign->private == true)
            {{ substr($wishlist->donee->lastname, 0, 1) }}
        @else
            @if($wishlist->status == 'selected' && $wishlist->user->id == auth()->user()->id)
                {{ $wishlist->donee->lastname }}
            @else
                {{ substr($wishlist->donee->lastname, 0, 1) }}
            @endif
        @endif
    @endif
</span>