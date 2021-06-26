<div class="flex flex-initial w-1/2 bg-white rounded-md shadow">
    @if($image)
        <div class="flex-none w-48 relative">
            <img src="https://www.fillmurray.com/200/300" alt="" class="absolute inset-0 w-full h-full object-cover rounded-l-md" />
        </div>
    @endif
    <form class="flex-auto p-6">
        <div class="flex flex-wrap">
            <h1 class="flex-auto text-xl font-semibold">{{ $donee->name }}</h1>
            <div class="text-xl font-semibold text-gray-500">Age 5 <i class="fas fa-venus text-pink-300"></i></div>
            <div class="w-full flex-none text-sm font-medium text-gray-500 mt-2">{{ $status }}</div>
        </div>
        <div class="flex items-baseline mt-4 mb-6">
            {{ $slot }}
        </div>
        <div class="flex space-x-3 text-sm font-medium">
            <div class="flex-auto flex space-x-3">
                <button class="w-1/2 flex items-center justify-center rounded-md bg-black text-white" type="button"><i class="fas fa-gifts"></i> {{ _('Donate') }}</button>
                <button class="w-1/2 flex items-center justify-center rounded-md border border-gray-300" type="button"><i class="fas fa-donate"></i> {{ _('Support') }}</button>
            </div>
            @can('donee_edit')
                <a href="{{ route('donee.edit', $donee) }}" class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300"><i class="far fa-edit"></i></a>
            @endcan
            <button class="flex-none flex items-center justify-center w-9 h-9 rounded-md text-gray-400 border border-gray-300" type="button" aria-label="like"><i class="far fa-heart"></i></button>
        </div>
    </form>
</div>