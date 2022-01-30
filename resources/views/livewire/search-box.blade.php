<div>
    <div class="flex-auto p-4">
        <div class="relative flex w-full flex-wrap items-stretch mb-3">
            <input wire:model="search" type="text" placeholder="{{ __('Search for a platform') }}" class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10"/>
            <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-3 py-3">
                <i class="fas fa-search"></i>
            </span>
        </div>
        @if($search)
            You're searching <b>{{ $search }}</b>
        @endif

        <br>

        @if($result)
            @foreach($result as $platform)
                @if(is_object($platform) && property_exists($platform, 'name'))
                    <div class="px-4 py-2">
                        <div class="border-2 p-2 border-blueGray-700 rounded-tl-xl rounded-tr-xl rounded-br-xl">
                            <div class="flex justify-start">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blueGray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="pl-2">
                                    <div class="font-bold text-xl text-blueGray-700">
                                        <a href="{{ route('platform.index', $platform->code) }}">
                                            {{ $platform->name }}
                                        </a>
                                    </div>
                                    <div class="text-gray-500 text-sm">{{ trim($platform->url) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <br>
            @endforeach
        @endif
    </div>
</div>
