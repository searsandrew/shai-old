<div>
    <form wire:submit.prevent="saveCampaigns">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ __('Campaigns') }}</x-slot>
                <x-slot name="description">{{ __('Edit, manage, maintain, and collect pledges here.') }}</x-slot>
            </x-jet-section-title>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                    <ul class="list-disc">
                    @foreach($campaigns as $index => $campaign)
                        <li class="ml-5"><a class="text-purple-600 no-underline hover:underline hover:text-purple-400" href="{{ route('campaign.show', $campaign->slug) }}">{{ $campaign->name }}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-jet-action-message class="mr-3" on="savedCampaigns">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <x-jet-button wire:loading.attr="disabled">
                        {{ __('Save') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </form>
</div>
