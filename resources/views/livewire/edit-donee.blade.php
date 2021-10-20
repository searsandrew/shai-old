<div>
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-row">
                <h2 class="flex-grow font-semibold text-xl text-gray-800 leading-tight align-middle">
                    {{ __('Edit') }} {{ $donee->name }}
                </h2>
                @can('donee_create')
                    <a href="{{ route('donee.create') }}" class="btn-muted">{{ __('Add Donee') }}</a>
                @endcan
            </div>
        </div>
    </header>
    
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ __('Edit Donee') }}</x-slot>
                <x-slot name="description">{{ __('Update information about the Donee here. For campaign specific edits for this Donee, use the section below.') }}</x-slot>
            </x-jet-section-title>

            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="saveDonee">
                    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <x-jet-label for="firstname" value="{{ __('First Name') }}" />
                                <x-jet-input id="firstname" type="text" class="mt-1 block w-full" wire:model="donee.firstname" autocomplete="firstname" />
                                <x-jet-input-error for="firstname" class="mt-2" />
                            </div>
                            <div class="col-span-3 sm:col-span-2">
                                <x-jet-label for="lastname" value="{{ __('Last Name') }}" />
                                <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model="donee.lastname" autocomplete="lastname" />
                                <x-jet-input-error for="lastname" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <x-jet-label for="description" value="{{ __('About') }}" />
                                <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="donee.description" autocomplete="description" />
                                <x-jet-input-error for="description" class="mt-2" />
                            </div>

                            <div class="col-span-6 sm:col-span-4 grid grid-cols-2 gap-6">
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="age" value="{{ __('Age') }}" />
                                    <x-jet-input id="age" type="text" class="mt-1 block w-full" wire:model.defer="donee.age" autocomplete="age" />
                                    <x-jet-input-error for="age" class="mt-2" />
                                </div>
                                <div class="col-span-2 sm:col-span-1">
                                    <x-jet-label for="gender" value="{{ __('Gender') }}" />
                                    <select id="gender" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="donee.gender" autocomplete="gender">
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

        <form wire:submit.prevent="saveWishlist">
            @foreach($wishlists as $index => $wishlist)
                <div class="md:grid md:grid-cols-3 md:gap-6" }}>
                    <x-jet-section-title>
                        <x-slot name="title">{{ $wishlist->campaign->name }}</x-slot>
                        <x-slot name="description">{{ $wishlist->campaign->description }}</x-slot>
                    </x-jet-section-title>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            <div class="grid grid-cols-6 gap-6" wire:key="wishlist-field-{{ $wishlist->id }}">
                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="wishlist" value="{{ __('Wishlist') }}" />
                                    <x-jet-input id="wishlist" type="text" class="mt-1 block w-full" wire:model="wishlists.{{ $index }}.wishlist" autocomplete="wishlist" />
                                    <x-jet-input-error for="wishlist" class="mt-2" />
                                </div>

                                <div class="col-span-6 sm:col-span-4">
                                    <x-jet-label for="status" value="{{ __('Status') }}" />
                                    <select id="status" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="wishlists.{{ $index }}.status" autocomplete="status">
                                        <option value="unfilled">{{ __('Unfilled') }}</option>
                                        <option value="selected">{{ __('Selected') }}</option>
                                        <option value="completed">{{ __('Completed') }}</option>
                                        <option value="retracted">{{ __('Retracted') }}</option>
                                    </select>
                                    <x-jet-input-error for="status" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="flex items-center justify-end px-4 py-3 text-right sm:px-6">
                <x-jet-action-message class="mr-3" on="savedWishlist">
                    {{ __('Saved.') }}
                </x-jet-action-message>

                <x-jet-button wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>
            </div>
        </form>
    </div>
</div>