<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">
            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('Subscriptions') }}
                    </h6>
                </div>
            </div>

            <div class="px-4 py-2">
                @forelse($subscriptions as $sub)
                    <div class="px-4 py-2">
                        <div style="border-color: {{ $sub->platform->color }}" class="border-2 p-2 rounded-tl-xl rounded-tr-xl rounded-br-xl">
                            <div class="container grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div>
                                    <div class="font-bold text-xl md:text-left text-center text-blueGray-700">
                                        <a href="{{ route('platform.index', $sub->platform->code) }}">
                                            [{{ $sub->platform->category->name ?? 'Uncategorized' }}] {{ $sub->platform->name }}
                                        </a>
                                        <div class="text-gray-500 text-sm">{{ trim($sub->platform->url) }}</div>
                                    </div>
                                </div>
                                <div>
                                    <livewire:subscribe-box platform="{{$sub->platform->code}}"/>
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
</x-app-layout>
