<div>
    <x-admin-header />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ $campaign->name }}</x-slot>
                <x-slot name="description">
                    {{ $campaign->description }}
                    <div class="grid grid-cols-3 gap-4 mt-3">
                        @can('campaign_edit')
                            <a href="{{ route('campaign.edit', $campaign) }}" class="btn-muted text-center">{{ __('Edit Campaign') }}</a>
                        @endcan
                        @can('collect_responses')
                            <a href="{{ route('campaign.print', $campaign) }}" class="btn-muted text-center">{{ __('QR Labels') }}</a>
                        @endcan
                    </div>
                </x-slot>
            </x-jet-section-title>
            <livewire:recieve-donations :campaign="$campaign" />
        </div>
    </div>
</div>