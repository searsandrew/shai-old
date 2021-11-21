<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="flex-grow font-semibold text-xl text-gray-800 leading-tight align-middle">
                {{ __('Check-in Donation') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl m-3 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2">
            <span class="mb-4">
                <span class="text-xs font-semibold text-gray-400 uppercase mb-1">Donee</span>
                <div class="p-2 bg-white rounded-md shadow">
                    <h3 class="w-auto text-center font-semibold slashed-zero">{{ $wishlist->donee->firstname }}</h3>
                    {{ $wishlist->wishlist }}
                </div>
            </span>

            <span class="mb-4">
                <span class="text-xs font-semibold text-gray-400 uppercase mb-1 flex-1">Donor</span>
                <div class="p-2 bg-white rounded-md shadow">
                    <h3 class="w-auto font-semibold slashed-zero">{{ $wishlist->user->name }}</h3>
                    <a href="mailto:{{ $wishlist->user->email }}">{{ $wishlist->user->email }}</a>
                </div>
            </span>

            <form method="POST" action="{{ route('wishlist.process', $wishlist) }}">
                @csrf
                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Process Donation') }}
                </x-jet-button>
            </form>
        </div>
    </div>

</x-app-layout>