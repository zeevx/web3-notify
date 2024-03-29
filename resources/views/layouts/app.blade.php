<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="antialiased text-blueGray-700">
    @include('layouts.navigation')

    <div class="relative md:ml-64 bg-blueGray-50">
        <!-- TOP NAV -->
        <nav
            class="absolute top-0 left-0 z-10 flex items-center w-full p-4 bg-transparent md:flex-row md:flex-nowrap md:justify-start">
            <div class="flex flex-wrap items-center justify-end w-full px-4 mx-auto md:flex-nowrap md:px-10">
                <x-dropdown>
                    <x-slot name="trigger">
                        <a class="hidden md:block block text-blueGray-500" href="#pablo" onclick="openDropdown(event,'user-dropdown')">
                            <span class="text-white">
                                <img
                                    alt="email"
                                    class="w-12 h-12 mx-auto rounded-full align-middle border-none shadow-lg"
                                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(auth()->user()->email)))}}"
                                />
                                {{ Auth::user()->name }}
                            </span>
                        </a>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.show') }}">{{ __('My profile') }}</x-dropdown-link>
                        <x-divider />
                        <x-dropdown-link href="{{ \Illuminate\Support\Facades\URL::signedRoute('web3.logout') }}"
                        >
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </nav>
        <!-- END TOP NAV -->

        <div class="relative pt-12 pb-32 md:pt-32">
            <div
                class="absolute top-0 w-full h-full bg-blueGray-800 bg-full bg-no-repeat"
                style="background-image: url({{ asset('images/register_bg_2.png') }})"
            ></div>
            <div class="w-full px-4 mx-auto md:px-10">
                <div class="flex flex-wrap"></div>
            </div>
        </div>
        <div class="w-full px-4 mx-auto -m-24 md:px-10">
            {{ $slot }}
        </div>
    </div>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
        /* Sidebar - Side navigation menu on mobile/responsive mode */
        function toggleNavbar(collapseID) {
            document.getElementById(collapseID).classList.toggle("hidden");
            document.getElementById(collapseID).classList.toggle("bg-white");
            document.getElementById(collapseID).classList.toggle("m-2");
            document.getElementById(collapseID).classList.toggle("py-3");
            document.getElementById(collapseID).classList.toggle("px-6");
        }

        /* Function for dropdowns */
        function openDropdown(event, dropdownID) {
            let element = event.target;
            while (element.nodeName !== "A") {
                element = element.parentNode;
            }
            Popper.createPopper(element, document.getElementById(dropdownID), {
                placement: "bottom-start",
            });
            document.getElementById(dropdownID).classList.toggle("hidden");
            document.getElementById(dropdownID).classList.toggle("block");
        }
    </script>
    @livewireScripts
</body>

</html>
