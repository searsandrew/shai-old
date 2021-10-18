<div class="md:grid md:grid-cols-3 md:gap-6" }}>
    <x-jet-section-title>
        <x-slot name="title">{{ __('Wishlists') }}</x-slot>
        <x-slot name="description">{{ __('Recieve donations and manage wishlists for this campaign.') }}</x-slot>
    </x-jet-section-title>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
            <table>
                <thead>
                    <tr>
                        <th width="20%">Donee Name</th>
                        <th width="20%">Donor Name</th>
                        <th width="40%">Wishlist</th>
                        <th width="15%">Status</th>
                        <th width="5%">Recieve</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaign->wishlists as $wishlist)
                        <tr>
                            <td>{{ $wishlist->donee->firstname }} {{ $wishlist->donee->family->name }}</td>
                            <td class="text-center">
                                @if($wishlist->status == 'selected' || $wishlist->status == 'completed')
                                    {{ $wishlist->user->name }}
                                @else
                                    Not Selected
                                @endif
                            </td>
                            <td>{{ $wishlist->wishlist }}</td>
                            <td class="text-center">{{ ucfirst($wishlist->status) }}</td>
                            <td class="text-center">
                                <button class="flex items-center justify-center rounded-md bg-black text-white p-1" type="button" wire:click="completeWishlist({{ $wishlist }})"><i class="far fa-check-circle"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>