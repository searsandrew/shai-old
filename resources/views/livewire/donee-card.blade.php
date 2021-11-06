<div class="bg-white rounded-md shadow">
    @if($image)
        <div class="flex-none w-48 relative">
            <img src="https://www.fillmurray.com/200/300" alt="" class="absolute inset-0 w-full h-full object-cover rounded-l-md" />
        </div>
    @endif
    <form class="grid grid-cols-2 p-6">
        <div class="col-span-2 grid grid-cols-4">
            <h1 class="col-span-3 sm:col-span-2 text-xl font-semibold"><x-name :wishlist="$wishlist" /></h1>
            <div class="col-span-1 sm:col-span-2 text-xl font-semibold text-gray-500 text-right">{{ __('Age') }} {{ $wishlist->donee->age }} <x-gender-icon :gender="$wishlist->donee->gender" /></div>
        </div>
        <div class="col-span-2 items-baseline mt-4 mb-6">
            {{ $wishlist->wishlist }}
        </div>
        <div class="col-span-2 flex space-x-3 text-sm font-medium">
            <div class="flex-auto flex space-x-3">
                @switch($wishlist->status)
                    @case('selected')
                        @if($wishlist->user_id == auth()->user()->id)
                            <button class="w-1/2 flex items-center justify-center rounded-md bg-green-500 text-white" type="button" wire:click="$toggle('deselectingWishlist')" wire:loading.attr="disabled"><i class="far fa-check-circle pr-2"></i> {{ __('Selected') }}</button>
                        @else
                            <button class="w-1/2 flex items-center justify-center rounded-md bg-gray-100 text-gray-800 border-gray-300 cursor-not-allowed" type="button" disabled><i class="far fa-user-check pr-2"></i> {{ __('Claimed') }}</button>
                        @endif
                        @break

                    @case('completed')
                        <button class="w-1/2 flex items-center justify-center rounded-md bg-gray-100 text-green-800 border-green-600 cursor-default" type="button" disabled><i class="far fa-check-circle pr-2"></i> {{ __('Completed') }}</button>
                        @break

                    @case('retracted')
                        <button class="w-1/2 flex items-center justify-center rounded-md bg-gray-100 text-red-800 border-red-600 cursor-not-allowed" type="button" disabled><i class="far fa-ban pr-2"></i> {{ __('Request Retracted') }}</button>
                        @break

                    @default
                        <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white" type="button" wire:click="selectWishlist"><i class="fas fa-gifts pr-2"></i> {{ __('Select') }}</button>
                        @break
                @endswitch
                <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300" type="button" wire:click="$toggle('infoModal')" wire:loading.attr="disabled"><i class="far fa-id-card pr-2"></i> {{ __('More Information') }}</button>
            </div>
            @can('donee_edit')
                <a href="{{ route('donee.edit', $wishlist->donee) }}" class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300"><i class="far fa-edit"></i></a>
            @endcan
            <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" wire:click="like" aria-label="like"><i class="far fa-heart"></i></button>
        </div>
    </form>

    <x-jet-confirmation-modal wire:model="deselectingWishlist">
        <x-slot name="title">
            {{ __('Deselect Donee') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to deselect this donee? Once you deselect a donee, any user will be able to select this donee.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deselectingWishlist')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deselectWishlist" wire:loading.attr="disabled">
                {{ __('Deselect') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

    <x-jet-dialog-modal wire:model="infoModal">
        <x-slot name="title">
            {{ __('About') }} {{ $wishlist->donee->name }}
        </x-slot>

        <x-slot name="content">
            {{ $wishlist->campaign->description }}
            <strong class="flex flex-full text-gray-900 mt-4">{{ __('Donation Instructions:') }}</strong>
            <small class="flex flex-full text-gray-600">
                {!! nl2br($wishlist->campaign->instruction) !!}
            </small>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('infoModal')" wire:loading.attr="disabled">
                {{ __('Done') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>