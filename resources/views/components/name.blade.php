<span>
    {{ $wishlist->donee->firstname }}
    @if($wishlist->campaign->design->private == "true")
        {{ substr($wishlist->donee->family->name, 0, 1) }}
    @else
        @if($wishlist->status == 'selected' && $wishlist->user->id == auth()->user()->id)
            {{ $wishlist->donee->family->name }}
        @else
            {{ substr($wishlist->donee->family->name, 0, 1) }}
        @endif
    @endif
</span>