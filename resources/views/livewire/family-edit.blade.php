<div>
    <form wire:submit.prevent="saveFamilies">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ __('Families') }}</x-slot>
                <x-slot name="description">{{ __('Edit a family name here, a family slug will be automatically regenerated.') }}</x-slot>
            </x-jet-section-title>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                @foreach($families as $index => $family)
                    <div class="grid grid-cols-6 gap-6 mb-3 items-end" wire:key="family-field-{{ $family->id }}">
                        <div class="col-span-6 sm:col-span-4">
                            <x-jet-label for="family" value="{{ __('Family') }}" />
                            <x-jet-input id="family" type="text" class="mt-1 block w-full" wire:model="families.{{ $index }}.name" autocomplete="family" />
                            <x-jet-input-error for="family" class="mt-2" />
                        </div>
                    </div>
                @endforeach
                </div>
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    <x-jet-action-message class="mr-3" on="savedFamilies">
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
