<div>
    <x-admin-header />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ __('Create Donee') }}</x-slot>
                <x-slot name="description">{{ __('Create a new Donee. To add a campaign specific wishlist, use the section') }}</x-slot>
            </x-jet-section-title>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="saveDonee">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-4 grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="firstname" value="{{ __('First Name') }}" />
                                    <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model="firstname" autocomplete="firstname" />
                                    <x-jet-input-error for="firstname" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="family" value="{{ __('Family') }}" />
                                    <select id="family" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="family" autocomplete="family">
                                        <option selected>-- Select Family --</option>
                                        @foreach($families as $family)
                                            <option value="{{ $family->id }}">{{ $family->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-input-error for="family" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="description" value="{{ __('About') }}" />
                                <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description" autocomplete="description" />
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="age" value="{{ __('Age') }}" />
                                    <x-jet-input id="age" type="text" class="mt-1 block w-full" wire:model.defer="age" autocomplete="age" />
                                    <x-jet-input-error for="age" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="gender" value="{{ __('Gender') }}" />
                                    <select id="gender" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="gender" autocomplete="gender">
                                        <option selected>-- Select Gender --</option>
                                        <option value="male">{{ __('Male') }}</option>
                                        <option value="female">{{ __('Female') }}</option>
                                        <option value="transgender">{{ __('Transgender') }}</option>
                                        <option value="undeclared">{{ __('Undeclared') }}</option>
                                    </select>
                                    <x-jet-input-error for="gender" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                        <x-jet-action-message class="mr-3" on="saved">
                            {{ __('Saved.') }}
                        </x-jet-action-message>

                        <x-jet-button wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>
                </form>
            </div>
        </div>
        <x-jet-section-border />    
    </div>
</div>