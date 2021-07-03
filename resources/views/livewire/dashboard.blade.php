<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($campaigns->count() != 0)
                @foreach($campaigns as $campaign)
                    <h3 class="w-full flex-none font-semibold">{{ $campaign->name }}</h3>
                    <p class="w-full flex-none text-gray-700 text-xs italic mb-2">{{ $campaign->description }}</p>
                    <div class="grid grid-flow-row grid-cols-2 space-4 mb-5 pb-8 border-b border-gray-300">
                        @if($campaign->design->family == "true")
                            @foreach($campaign->familyWishlists() as $wishlist)
                                <livewire:family-card :wishlist="$wishlist" :image="$campaign->design->image" />
                            @endforeach
                        @else
                            @foreach($campaign->wishlists as $wishlist)
                                <livewire:donee-card :wishlist="$wishlist" :image="$campaign->design->image" />
                            @endforeach
                        @endif
                    </div>
                @endforeach
            @else
                <div class="p-1 md:px-40 lg:px-96 md:py-3">
                    <x-no-donee />
                    <p class="text-center text-gray-500 mt-3">{{ __('You haven\'t selected any current Donee\'s.') }}</p>
                </div>
            @endif     
        </div>
    </div>
</div>
