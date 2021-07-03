<div class="flex flex-initial flex-shrink-0 w-1/2 bg-white rounded-md shadow">
    @if($image == true)
        <div class="flex-none w-48 relative">
            <img src="https://www.fillmurray.com/200/300" alt="" class="absolute inset-0 w-full h-full object-cover rounded-l-md" />
        </div>
    @endif
    <form class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold">{{  substr($family->name, 0, 1)  }} {{  __('Family') }}</h1>
            <div class="text-xl font-semibold text-gray-500"><i class="fas fa-users"></i> {{ count($wishlists) }}</div>
        </div>
        <div class="flex items-baseline mt-4 mb-6 grid grid-cols-1">
            @foreach($wishlists as $donee)
                <div class="grid grid-cols-2 gap-x-4 mb-4">
                    <div class="font-semibold">{{ $donee->donee->firstname }}</div>
                    <div class="text-right">{{ __('Age') }} {{ $donee->donee->age }} <x-gender-icon :gender="$donee->donee->gender" /></div>
                    <div class="col-span-2 leading-snug text-sm text-gray-600">
                        {{ $donee->wishlist }}
                    </div>
                </div>
            @endforeach
        </div>
        <div class="flex space-x-3 text-sm font-medium">
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
</div>
