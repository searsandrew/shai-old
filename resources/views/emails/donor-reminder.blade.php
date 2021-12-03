@component('mail::message')

<h2>{{ __('Thank you for choosing to pray for and bless one or more children and their families for Christmas through Project Greatest Gift!')}}</h2>

{{ __('You are the hands and feet of Jesus.  May each gift tell of God's love and draw these children and families to Jesus as their Savior -- God's greatest gift to all!
Please remember that this is the final week to shop, wrap and RETURN YOUR GIFTS AND BAGS NO LATER THAN THIS SUNDAY, DECEMBER 5TH by 11-o-clock am.') }}

{{ __('There will be many gifts being returned, so plan to arrive a bit earlier than normal to allow time to check them in and get to the service on time.') }}
{{ __('If you have any questions, please feel free to call or text me at 720-237-4411.') }}
{{ __('I appreciate all of you and your heart for others!') }}
<strong>{{ __('Christine Appel') }}</strong>

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