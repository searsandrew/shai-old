<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row">
            <h2 class="flex-grow font-semibold text-xl text-gray-800 leading-tight align-middle">
                {{ __('Edit') }} {{ $donee->name }}
            </h2>
            @can('donee_create')
                <a href="{{ route('donee.create') }}" class="btn-muted">{{ _('Add Donee') }}</a>
            @endcan
        </div>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <livewire:edit-donee />
            <x-jet-section-border />

        </div>
    </div>
</x-app-layout>