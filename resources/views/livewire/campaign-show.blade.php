<div>
    <x-admin-header />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ $campaign->name }}</x-slot>
                <x-slot name="description">{{ $campaign->description }}</x-slot>
            </x-jet-section-title>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                    {{ $campaign }}
                </div>
            </div>
        </div>
        <x-jet-section-border />   

        <livewire:recieve-donations :campaign="$campaign" />
    </div>
</div>