<div class="flex flex-initial flex-shrink-0 w-1/2 bg-white rounded-md shadow">
    @if($image)
        <div class="flex-none w-48 relative">
            <img src="https://www.fillmurray.com/200/300" alt="" class="absolute inset-0 w-full h-full object-cover rounded-l-md" />
        </div>
    @endif
    <form class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold">{{ $wishlist->donee->name }}</h1>
            <div class="text-xl font-semibold text-gray-500">Age {{ $wishlist->donee->age }} <x-gender-icon :gender="$wishlist->donee->gender" /></div>
            <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">{{ $wishlist->status }}</div>
        </div>
        <div class="flex items-baseline mt-4 mb-6">
            {{ $wishlist->wishlist }}
        </div>
        <div class="flex space-x-3 text-sm font-medium">
            <div class="flex-auto flex space-x-3">
                <button class="w-1/2 flex items-center justify-center rounded-md @if($wishlist->user_id != null) bg-green-500 text-white @else bg-black text-white @endif" type="button" wire:click="selectWishlist"><i class="fas fa-gifts pr-2"></i> {{ _('Donate') }}</button>
                <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300" type="button"><i class="fas fa-donate"></i> {{ _('Support') }}</button>
            </div>
            @can('donee_edit')
                <a href="{{ route('donee.edit', $wishlist->donee) }}" class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300"><i class="far fa-edit"></i></a>
            @endcan
            <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" wire:click="like" aria-label="like"><i class="far fa-heart"></i></button>
        </div>
    </form>
</div>