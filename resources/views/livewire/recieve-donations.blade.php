<div class="mt-5 md:mt-0 md:col-span-2">
    <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
        <table>
            <thead>
                <tr>
                    <th width="20%">Donee Name</th>
                    <th width="20%">Donor Name</th>
                    <th width="40%" class="hidden sm:block">Wishlist</th>
                    <th width="15%">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaign->wishlists as $wishlist)
                    <tr>
                        <td><x-name :wishlist="$wishlist" /></td>
                        <td class="text-center">
                            @if($wishlist->status == 'selected' || $wishlist->status == 'completed')
                                <a href="{{ route('wishlist.collect', $wishlist) }}" class="text-purple-600 no-underline hover:underline hover:text-purple-400">{{ $wishlist->user->name }}</a>
                            @else
                                Not Selected
                            @endif
                        </td>
                        <td class="hidden sm:block">{{ $wishlist->wishlist }}</td>
                        <td class="text-center">{{ ucfirst($wishlist->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>