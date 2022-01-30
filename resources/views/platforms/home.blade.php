<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">

            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <div>
                        <h6 class="text-xl font-bold text-blueGray-700">
                            <a href="{{ $permalink }}">{{ $title }}</a>
                        </h6>
                    </div>
                    <div>
                        <livewire:subscribe-box platform="{{request()->code}}"/>
                    </div>
                </div>
            </div>

            <div class="flex-auto p-4">
                @foreach ($items as $item)
                    <div class="item">
                        <div class="text-xl uppercase py-2 font-mono"><a target="_blank" href="{{ $item->get_permalink() }}">{!! $item->get_title() !!}</a></div>
                        <div class="font-bold underline py-2 mb-4"><small>Posted on {{ $item->get_date('j F Y | g:i a') }}</small></div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
