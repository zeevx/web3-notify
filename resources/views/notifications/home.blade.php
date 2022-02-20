<x-app-layout>
    <div class="px-4 w-full">
        <div class="flex relative flex-col mb-6 min-w-0 break-words bg-white rounded shadow-lg bg-blueGray-100 xl:mb-0">
            <div class="px-6 py-6 mb-0 bg-white rounded-t">
                <div class="flex justify-between text-center">
                    <h6 class="text-xl font-bold text-blueGray-700">
                        {{ __('Notification') }}
                    </h6>
                </div>
            </div>

            <div class="flex-auto p-4">

                @if ($message = Session::get('success'))
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                        <span class="text-xl inline-block mr-5 align-middle">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="inline-block align-middle mr-8">
                            <b class="capitalize">Success!</b> {{ $message }}
                        </span>
                    </div>
                @endif

                <x-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('notification.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-wrap">
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="name" :value="__('Slack Hook')"/>
                                <a target="_blank" href="https://api.slack.com/messaging/webhooks" class="text-sm px-2 py-1 border rounded-full bg-purple-600 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="20" height="20"
                                         class="inline-block text-white"
                                         viewBox="0 0 30 30"
                                         style=" fill:#ffffff;"><path d="M 16.644531 2.0058594 C 16.365063 1.9841719 16.077422 2.0168281 15.794922 2.1113281 C 14.664922 2.4893281 14.053641 3.71375 14.431641 4.84375 L 15.324219 7.5117188 L 10.236328 9.2128906 L 9.3828125 6.6601562 C 9.0048125 5.5301563 7.7803906 4.9208281 6.6503906 5.2988281 C 5.5193906 5.6768281 4.9110625 6.8992969 5.2890625 8.0292969 L 6.1425781 10.582031 L 3.4746094 11.474609 C 2.3446094 11.852609 1.7333281 13.075078 2.1113281 14.205078 C 2.4893281 15.335078 3.71375 15.946359 4.84375 15.568359 L 7.5117188 14.675781 L 9.2128906 19.763672 L 6.6601562 20.617188 C 5.5301563 20.995187 4.9208281 22.219609 5.2988281 23.349609 C 5.6768281 24.480609 6.8992969 25.088938 8.0292969 24.710938 L 10.582031 23.857422 L 11.474609 26.525391 C 11.852609 27.655391 13.075078 28.266672 14.205078 27.888672 C 15.335078 27.510672 15.945359 26.28625 15.568359 25.15625 L 14.675781 22.488281 L 19.763672 20.785156 L 20.617188 23.339844 C 20.995187 24.469844 22.219609 25.079172 23.349609 24.701172 C 24.480609 24.323172 25.089891 23.100703 24.712891 21.970703 L 23.857422 19.416016 L 26.525391 18.523438 C 27.655391 18.145437 28.266672 16.922969 27.888672 15.792969 C 27.510672 14.662969 26.28625 14.053641 25.15625 14.431641 L 22.488281 15.324219 L 20.787109 10.236328 L 23.339844 9.3828125 C 24.469844 9.0048125 25.079172 7.7803906 24.701172 6.6503906 C 24.323172 5.5203906 23.100703 4.9110625 21.970703 5.2890625 L 19.417969 6.1425781 L 18.525391 3.4746094 C 18.241891 2.6271094 17.482937 2.0709219 16.644531 2.0058594 z M 16.693359 11.605469 L 18.394531 16.693359 L 13.306641 18.394531 L 11.605469 13.306641 L 16.693359 11.605469 z"></path></svg>
                                    Get Slack Hook
                                </a>
                                <x-input
                                    class="mt-2"
                                    type="text"
                                    placeholder="e.g https://hooks.slack.com/services/XXXXXXXXXXXXX"
                                    name="route_to_slack_hook"
                                    id="route_to_slack_hook"
                                    value="{{ old('route_to_slack_hook', auth()->user()->route_to_slack_hook) }}"
                                />
                                <div class="my-2">
                                    <input type="hidden" name="activate_slack" value="0">
                                    <label class="inline-flex items-center cursor-pointer"
                                    ><input
                                            {{ auth()->user()->activate_slack ? 'checked' : '' }}
                                            id="activate_slack"
                                            type="checkbox"
                                            name="activate_slack"
                                            value="1"
                                            class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox text-blueGray-700"
                                        /><span
                                            class="ml-2 text-sm font-semibold text-blueGray-600"
                                        >{{ __('Activate Slack') }}</span
                                        ></label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="email" :value="__('Telegram ID')"/>
                                <script async src="https://telegram.org/js/telegram-widget.js?15" data-telegram-login="web3_notify_bot" data-size="medium" data-userpic="false" data-onauth="onTelegramAuth(user)" data-request-access="write"></script>
                                <script type="text/javascript">
                                    function onTelegramAuth(user) {
                                        document.getElementById('telegram_user_id').value = user.id
                                        alert('Logged in on telegram as ' + user.first_name + ' ' + user.last_name + ' (' + user.id + (user.username ? ', @' + user.username : '') + ')');
                                    }
                                </script>
                                <x-input
                                    class="mt-2"
                                    type="text"
                                    name="telegram_user_id"
                                    id="telegram_user_id"
                                    value="{{ old('telegram_user_id', auth()->user()->telegram_user_id) }}"
                                    placeholder="{{ __('Telegram ID') }}"
                                />
                                <div class="my-2">
                                    <input type="hidden" name="activate_telegram" value="0">
                                    <label class="inline-flex items-center cursor-pointer"
                                    ><input
                                            {{ auth()->user()->activate_telegram ? 'checked' : '' }}
                                            id="activate_telegram"
                                            type="checkbox"
                                            name="activate_telegram"
                                            value="1"
                                            class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox text-blueGray-700"
                                        /><span
                                            class="ml-2 text-sm font-semibold text-blueGray-600"
                                        >{{ __('Activate Telegram') }}</span
                                        ></label
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="w-full lg:w-6/12 px-4">
                            <div class="relative w-full mb-3">
                                <x-label for="email" :value="__('Twitter Handle')"/>
                                <a target="_blank" href="https://help.twitter.com/en/managing-your-account/twitter-username-rules" class="text-sm px-2 py-1 border rounded-full bg-blue-400 text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="20" height="20"
                                         class="inline-block text-white"
                                         viewBox="0 0 30 30"
                                         style=" fill:#ffffff;">
                                        <path d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z"></path>
                                    </svg>
                                    Get Twitter Handle
                                </a>
                                <x-input
                                    class="mt-2"
                                    type="text"
                                    name="twitter_handle"
                                    id="twitter_handle"
                                    value="{{ old('twitter_handle', auth()->user()->twitter_handle) }}"
                                    placeholder="e.g @iamadamspaul"
                                />
                                <div class="my-2">
                                    <input type="hidden" name="activate_twitter" value="0">
                                    <label class="inline-flex items-center cursor-pointer"
                                    ><input
                                            {{ auth()->user()->activate_twitter ? 'checked' : '' }}
                                            id="activate_twitter"
                                            type="checkbox"
                                            name="activate_twitter"
                                            value="1"
                                            class="ml-1 w-5 h-5 rounded border-0 transition-all duration-150 ease-linear form-checkbox text-blueGray-700"
                                        /><span
                                            class="ml-2 text-sm font-semibold text-blueGray-600"
                                        >{{ __('Activate Twitter') }}</span
                                        ></label
                                    >
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-divider class="mt-6"/>

                    <div class="mt-6">
                        <x-button>
                            {{ __('Submit') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
