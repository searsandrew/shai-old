<div>
    <x-admin-header />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ $campaign->name }}</x-slot>
                <x-slot name="description">{{ $campaign->description }}</x-slot>
            </x-jet-section-title>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="saveCampaign">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="name" value="{{ __('Campaign Name') }}" />
                                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="campaign.name" autocomplete="name" />
                                <x-jet-input-error for="campaign.name" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="description" value="{{ __('Description') }}" />
                                <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="campaign.description" autocomplete="description" />
                                <x-jet-input-error for="campaign.description" class="mt-2" />
                            </div>
                            <div class="col-span-6 sm:col-span-4 grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="started" value="{{ __('Start Date') }}" />
                                    <x-jet-input id="started" type="text" class="mt-1 block w-full" wire:model.defer="campaign.started_at" autocomplete="started" />
                                    <x-jet-input-error for="campaign.started_at" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="ended" value="{{ __('End Date') }}" />
                                    <x-jet-input id="ended" type="text" class="mt-1 block w-full" wire:model.defer="campaign.ended_at" autocomplete="ended" />
                                    <x-jet-input-error for="campaign.ended_at" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-4 grid grid-cols-3 gap-x-6">
                                <h6 class="col-span-3">Campaign Graphics</h6>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="logo" value="{{ __('Logo') }}" />
                                    <x-jet-input id="logo" type="text" class="mt-1 block w-full" wire:model.defer="campaign.logo" autocomplete="logo" />
                                    <x-jet-input-error for="logo" class="mt-2" />
                                </div>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="background" value="{{ __('Background Image') }}" />
                                    <x-jet-input id="background" type="text" class="mt-1 block w-full" wire:model.defer="campaign.background" autocomplete="background" />
                                    <x-jet-input-error for="campaign.background" class="mt-2" />
                                </div>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="icon" value="{{ __('Icon') }}" />
                                    <x-jet-input id="icon" type="text" class="mt-1 block w-full" wire:model.defer="campaign.icon" autocomplete="icon" />
                                    <x-jet-input-error for="campaign.icon" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-4 grid grid-cols-3 gap-x-6">
                                <h6 class="col-span-3">Campaign Options</h6>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="family" value="{{ __('Use families?') }}" />
                                    <select id="family" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="campaign.family" autocomplete="family">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <x-jet-input-error for="campaign.family" class="mt-2" />
                                </div>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="image" value="{{ __('Use images?') }}" />
                                    <select id="image" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="campaign.image" autocomplete="image">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <x-jet-input-error for="campaign.image" class="mt-2" />
                                </div>
                                <div class="col-span-3 sm:col-span-1">
                                    <x-jet-label for="private" value="{{ __('Force privacy?') }}" />
                                    <select id="private" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="campaign.private" autocomplete="private">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <x-jet-input-error for="campaign.private" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <x-jet-action-message class="mr-3" on="campaign_saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>

                        <x-jet-button wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>