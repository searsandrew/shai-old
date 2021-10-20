<div>
    <x-admin-header />

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6" }}>
            <x-jet-section-title>
                <x-slot name="title">{{ __('Campaigns') }}</x-slot>
                <x-slot name="description">
                    {{ __('Edit, manage, maintain, and collect pledges here.') }}
                    @can('campaign_create')
                        <p><a href="{{ route('campaign.create') }}" class="btn-muted mt-6">{{ __('Add Campaign') }}</a></p>
                    @endcan
                </x-slot>
            </x-jet-section-title>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit.prevent="saveCampaigns">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                            <table class="table-fixed">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="w-1/5">Campaign</th>
                                        <th rowspan="2" class="w-1/5">Start Date</th>
                                        <th rowspan="2" class="w-1/5">End Date</th>
                                        <th colspan="4" class="w-2/5">Donees</th>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th>Selected</th>
                                        <th>Retracted</th>
                                        <th>Completed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($campaigns as $index => $campaign)
                                    <tr>
                                        <td><a class="text-purple-600 no-underline hover:underline hover:text-purple-400" href="{{ route('campaign.show', $campaign->slug) }}">{{ $campaign->name }}</a></td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($campaign->started_at)->toFormattedDateString() }}</td>
                                        <td class="text-center">{{ \Carbon\Carbon::parse($campaign->ended_at)->toFormattedDateString() }}</td>
                                        <td class="text-center">{{ $campaign->wishlists->count() }}</td>
                                        <td class="text-center">{{ $campaign->wishlists->where('status', 'selected')->count() }}</td>
                                        <td class="text-center">{{ $campaign->wishlists->where('status', 'retracted')->count() }}</td>
                                        <td class="text-center">{{ $campaign->wishlists->where('status', 'completed')->count() }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
