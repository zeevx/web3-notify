<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">

            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('My profile') }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto p-4">

                <div class="flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <x-label for="wallet" :value="__('Wallet Address')"/>
                            <x-input
                                readonly
                                type="text"
                                name="wallet"
                                id="wallet"
                                value="{{ auth()->user()->wallet }}"
                            />
                        </div>
                    </div>
                    <div class="w-full lg:w-6/12 px-4">
                        <div class="relative w-full mb-3">
                            <x-label for="last_login" :value="__('Last Login')"/>
                            <x-input
                                readonly
                                type="text"
                                name="last_login"
                                id="last_login"
                                value="{{ auth()->user()->last_login->diffForHumans() }}"
                            />
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
