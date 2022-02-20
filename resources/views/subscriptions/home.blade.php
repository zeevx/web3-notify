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
                            <div class="flex justify-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" style="color: {{ $sub->platform->color }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="pl-2">
                                    <div class="font-bold text-xl text-blueGray-700">
                                        <a href="{{ route('platform.index', $sub->platform->code) }}">
                                            {{ $sub->platform->name }}
                                        </a>
                                    </div>
                                    <div class="text-gray-500 text-sm">{{ trim($sub->platform->url) }}</div>
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
