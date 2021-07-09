<div class="bg-white rounded-md shadow">
    @if($image == "true")
        <div class="flex-none w-48 relative">
            <img src="https://www.fillmurray.com/200/300" alt="" class="absolute inset-0 w-full h-full object-cover rounded-l-md" />
        </div>
    @endif
    <form class="grid grid-cols-2 p-6">
        <div class="col-span-2 grid grid-cols-4">
            <h1 class="col-span-3 sm:col-span-2 text-xl font-semibold">
                {{  substr($family->name, 0, 1)  }} {{  __('Family') }}
                <x-jet-action-message on="sent">
                    {{ __('Donation Email Resent.') }}
                </x-jet-action-message>
        </h1>
            <div class="col-span-1 sm:col-span-2 text-xl font-semibold text-gray-500 text-right"><i class="fas fa-users"></i> {{ count($wishlists) }}</div>
        </div>
        <div class="col-span-2 items-baseline mt-4 mb-6 grid grid-cols-1">
            @foreach($wishlists as $donee)
                <div class="grid grid-cols-2 gap-x-4 mb-4">
                    <div class="font-semibold">{{ $donee['donee']['firstname'] }}</div>
                    <div class="text-right">{{ __('Age') }} {{ $donee['donee']['age'] }} <x-gender-icon :gender="$donee['donee']['gender']" /></div>
                    <div class="col-span-2 leading-snug text-sm text-gray-600">
                        {{ $donee['wishlist'] }}
                        @if($donee['attachment'])
                            <a href="{{ Storage::url($donee['attachment']['filename']) }}"  target="_new"  class="flex text-red-600 hover:text-red-800 hover:underline mt-1"><i class="fas fa-file-download mr-1"></i> {{ $donee['attachment']['name'] }}</a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        <div class="col-span-2 flex space-x-3 text-sm font-medium">
            <div class="flex-auto flex space-x-3">
                @switch($wishlist->status)
                    @case('selected')
                        @if($wishlist->user_id == auth()->user()->id)
                            <button class="w-1/2 flex items-center justify-center rounded-md bg-green-500 text-white" type="button" wire:click="$toggle('deselectingFamily')" wire:loading.attr="disabled"><i class="far fa-check-circle pr-2"></i> {{ __('Selected') }}</button>
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
                        <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white" type="button" wire:click="selectFamily"><i class="fas fa-gifts pr-2"></i> {{ __('Select') }}</button>
                        @break
                @endswitch
                <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300" type="button" wire:click="$toggle('infoModal')" wire:loading.attr="disabled"><i class="far fa-id-card pr-2"></i> {{ __('More Information') }}</button>
            </div>
            @can('donee_edit')
                <a href="{{ route('donee.edit', $wishlist->donee) }}" class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300"><i class="far fa-edit"></i></a>
                <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" wire:click="email" aria-label="like">
                    @if($wishlist->emailed_at)
                        <i class="fas fa-paper-plane"></i>
                    @else
                        <i class="far fa-paper-plane"></i>
                    @endif
                </button>
            @endcan
            <!-- <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" wire:click="like" aria-label="like"><i class="far fa-heart"></i></button> -->
        </div>
    </form>

    <x-jet-confirmation-modal wire:model="deselectingFamily">
        <x-slot name="title">
            {{ __('Deselect Family') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to deselect this family? Once you deselect a family, any user will be able to select this family.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deselectingFamily')" wire:loading.attr="disabled">
                {{ __('Nevermind') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deselectFamily" wire:loading.attr="disabled">
                {{ __('Deselect') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

    <x-jet-dialog-modal wire:model="infoModal">
        <x-slot name="title">
            {{ __('Details') }}
        </x-slot>

        <x-slot name="content">
            @foreach($wishlists as $donee)
                <ul class="mb-4">
                    <li class="text-gray-600">
                        {{ $donee['wishlist'] }}
                    </li>
                </ul>
            @endforeach
            <strong class="flex flex-full text-gray-900 mt-4">{{ __('Donation Instructions:') }}</strong>
            <small class="flex flex-full text-gray-600">
                {{ $wishlist->campaign->description }}
            </small>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('infoModal')" wire:loading.attr="disabled">
                {{ __('Done') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
