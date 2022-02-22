<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">

            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('Dashboard') }}
                    </h6>
                </div>
            </div>

            <livewire:search-box />

            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('Top Subscribed Platforms') }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto p-4">
                <div class="">
                    @forelse($tsps as $tsp)
                        <div class="px-4 py-2">
                            <div style="border-color: {{ $tsp->color }}" class="border-2 p-2 rounded-tl-xl rounded-tr-xl rounded-br-xl">
                                <div class="container grid grid-cols-1 md:grid-cols-2 gap-2">
                                    <div>
                                        <div class="font-bold text-xl md:text-left text-center text-blueGray-700">
                                            <a href="{{ route('platform.index', $tsp->code) }}">
                                                [{{ $tsp->cat_name ?? 'Uncategorized' }}] {{ $tsp->name }}
                                            </a>
                                            <div class="text-gray-500 text-sm">{{ trim($tsp->url) }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <livewire:subscribe-box platform="{{$tsp->code}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <b>{{ __('No Subscription Yet') }}</b>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
