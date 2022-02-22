<div>
    <div class="flex-auto p-4">
        <div class="relative flex w-full flex-wrap items-stretch mb-3">
            <input wire:model="search" type="text" placeholder="{{ __('Type and search for a platform') }}..." class="px-3 py-3 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10"/>
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
                        <div style="border-color: {{ $platform->color }}" class="border-2 p-2 rounded-tl-xl rounded-tr-xl rounded-br-xl">
                            <div class="container grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div>
                                    <div class="font-bold text-xl md:text-left text-center text-blueGray-700">
                                        <a href="{{ route('platform.index', $platform->code) }}">
                                            [{{ $platform->cat_name ?? 'Uncategorized' }}] {{ $platform->name }}
                                        </a>
                                        <div class="text-gray-500 text-sm">{{ trim($platform->url) }}</div>
                                    </div>
                                </div>
                                <div>
                                    <livewire:subscribe-box platform="{{$platform->code}}"/>
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
