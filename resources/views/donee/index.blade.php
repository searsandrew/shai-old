<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="flex-grow font-semibold text-xl text-gray-800 leading-tight align-middle">
                {{ __('Donee') }}
            </h2>
            @can('donee_create')
                <a href="{{ route('donee.create') }}" class="btn-muted">{{ _('Add Donee') }}</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex-auto flex flex-wrap">
            @if($campaigns->count() != 0)
                @foreach($campaigns as $wishlists)
                    <h3 class="w-full flex-none font-semibold">{{ $wishlists->first()->campaign->name }}</h3>
                    <p class="w-full flex-none text-gray-700 text-xs italic mb-2">{{ $wishlists->first()->campaign->description }}</p>
                    <div class="flex flex-col w-full md:flex-row space-x-4 mb-5 pb-8 border-b border-gray-300">
                        @foreach($wishlists as $donee)
                            <livewire:donee-card :wishlist="$donee" :image="$wishlists->first()->campaign->design->image" />
                        @endforeach
                    </div>
                @endforeach
            @else
                <div class="p-1 md:px-40 lg:px-96 md:py-3">
                    <x-no-donee />
                    <p class="text-center text-gray-500 mt-3">You haven't selected any current Donee's.</p>
                </div>
            @endif     
        </div>
    </div>
</x-app-layout>