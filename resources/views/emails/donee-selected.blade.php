@component('mail::message')
<h2>{{ __('Thank you for choosing to donate and bless each child and family!')}}</h2>

{{ __('To complete your donation please refer to the information below, or log in to your account.') }}

@component('mail::button', ['url' => route('login')])
{{ __('Sign In to your Account') }}
@endcomponent

{{ __('Your donations for the :campaign campaign', ['campaign' => $campaign->name]) }}

<h3>{{ __('Donee Information') }}</h3>
<dl>
    @if($campaign->family == 'true')
        @foreach($wishlists as $family)
            @foreach($family as $wishlist)
                <dt>{{ $wishlist->donee->firstname }} <em>[Age {{ $wishlist->donee->age }}, {{ucfirst( $wishlist->donee->gender )}}]</em></dt>
                <dd>
                    {{ $wishlist->wishlist }}
                    @if($wishlist->attachment_id != null)
                        @component('mail::button', ['url' => config('app.url') . 'storage/' . $wishlist->attachment->filename])
                            {{ $wishlist->attachment->name }}
                        @endcomponent
                    @endif
                </dd>
            @endforeach
            <hr/>
        @endforeach
    @else
        @foreach($wishlists as $wishlist)
            <dt>{{ $wishlist->donee->firstname }} <em>[Age {{ $wishlist->donee->age }}, {{ucfirst( $wishlist->donee->gender )}}]</em></dt>
            <dd>{{ $wishlist->wishlist }}</dd>
        @endforeach
    @endif
</dl>

<h3>{{ __('Donation Instructions') }}</h3>
{{ $campaign->instruction }}

@endcomponent