<x-slot name="header">
    <div class="flex flex-1 gap-x-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin') }}
        </h2>

        <x-jet-nav-link href="{{ route('family.create') }}" :active="request()->routeIs('family.create')">
            {{ __('Manage Families') }}
        </x-jet-nav-link>
        
        <x-jet-nav-link href="{{ route('donee.create') }}" :active="request()->routeIs('donee.create')">
            {{ __('Manage Donee\'s') }}
        </x-jet-nav-link>

        <x-jet-nav-link href="{{ route('campaign.index') }}" :active="request()->routeIs('campaign.index')">
            {{ __('Manage Campaign\'s') }}
        </x-jet-nav-link>
    </div>
</x-slot>