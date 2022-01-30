<div>
    @if($subscribed == false)
    <button wire:click="doAction" class="w-full p-2 rounded-full bg-green-700 text-sm text-white">
        {{ __('SUBSCRIBE') }}
    </button>
    @else
    <button wire:click="doAction" class="w-full p-2 rounded-full bg-red-500 text-sm text-white">
        {{ __('UN-SUBSCRIBE') }}
    </button>
    @endif
</div>
