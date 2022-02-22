<!DOCTYPE html>
<html class="h-full js-focus-visible" lang="en" data-js-focus-visible=""><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="@web3notify">
    <meta name="twitter:site" content="@web3notify">
    <meta name="twitter:title" content="Web3 Notify">
    <meta name="twitter:description" content="Get updates of web3 jobs, events and news on slack, telegram and twitter">
    <meta name="twitter:image" content="{{ url('/images/logo-big.png') }}">

    <meta property="og:url" content="https://web3notify.com">
    <meta property="og:type" content="product">
    <meta property="og:title" content="Web3 Notify">
    <meta name="og:description" content="Get updates of web3 jobs, events and news on slack, telegram and twitter">
    <meta name="og:image" content="{{ url('/images/logo-big.png') }}">

    <meta name="description" content="Get updates of web3 jobs, events and news on slack, telegram and twitter">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style type="text/css">
        body{
            background: #1d293b;
        }
        @font-face {
            font-weight: 400;
            font-style:  normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Book-cd7d2bcec649b1243839a15d5eb8f0a3.woff2') format('woff2');
        }

        @font-face {
            font-weight: 500;
            font-style:  normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Medium-d74eac43c78bd5852478998ce63dceb3.woff2') format('woff2');
        }

        @font-face {
            font-weight: 700;
            font-style:  normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Bold-83b8ceaf77f49c7cffa44107561909e4.woff2') format('woff2');
        }

        @font-face {
            font-weight: 900;
            font-style:  normal;
            font-family: 'Circular-Loom';

            src: url('https://cdn.loom.com/assets/fonts/circular/CircularXXWeb-Black-bf067ecb8aa777ceb6df7d72226febca.woff2') format('woff2');
        }</style>
</head>
<body>
<div class="absolute top-0 w-full bg-blueGray-800 bg-full bg-no-repeat"
     style="background-image: url({{ asset('images/register_bg_2.png') }})">
    <div class="container px-8 mx-auto mt-4">
        <header class="text-white pb-6 flex w-full justify-between items-center">
            <div>
                <a href="{{ url('/') }}" class="inline-flex items-center">
                    <p class="ml-4 font-headline text-lg">Web3Notify</p>
                </a>
            </div>
            <div>
                <a class="font-medium text-white pr-4" href="/login">
                    Login
                </a>
                <a class="font-medium text-white pr-4" href="/register">
                    Register
                </a>
            </div>
        </header>

        <main class="mt-8 md:px-4 py-5 sm:rounded-lg w-full md:w-11/12 mx-auto">
            <h1 class="text-4xl md:text-6xl text-center text-white font-bold leading-tight">
                Get Automated Updates of Web3
                <p class="inline-block relative">
                    <span class="px-1 absolute top-0 left-0 z-10 text-white" style="background: #f5355d">Jobs</span>
                    <mark class="px-1 h-8 md:h-10 text-transparent inline-block">
                        Jobs
                    </mark>
                </p>
                <p class="inline-block relative text-gray-700">
                    <span class="px-1 absolute top-0 left-0 z-10 text-white" style="background: #2dce89">Events</span>
                    <mark class="px-1 h-8 md:h-10 text-transparent inline-block">
                        Events
                    </mark>
                </p>
                 and
                <p class="inline-block relative text-gray-700">
                    <span class="px-1 absolute top-0 left-0 z-10 text-white" style="background: #fb6240">News</span>
                    <mark class="px-1 h-8 md:h-10 text-transparent inline-block">
                        News
                    </mark>
                </p>
            </h1>
            <div class="flex-col mt-12 flex lg:mt-6 text-center">
                <p class="mb-4 text-sm font-medium tracking-widest text-white uppercase">Seamless Connection With</p>
                <div class="flex justify-center">
                    <svg class="h-8 mr-4 text-white duration-150 fill-current transition-color"
                         viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="none" stroke-width="1">
                            <g>
                                <path d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z"></path>
                            </g>
                        </g>
                    </svg>
                    <svg class="h-8 mr-4 text-white duration-150 fill-current transition-color"
                         viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="none" stroke-width="1"></g>
                        <g>
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                        </g>
                        </g>
                    </svg>
                    <svg class="h-8 mr-4 text-white duration-150 fill-current transition-color"
                         viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="none" stroke-width="1">
                            <g transform="translate(-.157)">
                                <path d="M4.671 0c.88 0 1.733.247 2.468.702a7.423 7.423 0 0 1 6.02 2.118 7.372 7.372 0 0 1 2.167 5.215c0 .344-.024.687-.072 1.026a4.662 4.662 0 0 1 .6 2.281 4.645 4.645 0 0 1-1.37 3.294A4.673 4.673 0 0 1 11.18 16c-.84 0-1.658-.226-2.37-.644a7.423 7.423 0 0 1-6.114-2.107A7.374 7.374 0 0 1 .529 8.035c0-.363.026-.724.08-1.081a4.644 4.644 0 0 1 .76-5.59A4.68 4.68 0 0 1 4.67 0zm.447 7.01c.18.309.43.572.729.769a7.07 7.07 0 0 0 1.257.653c.492.205.873.38 1.145.523.229.112.437.264.615.448.135.142.21.331.21.528a.872.872 0 0 1-.335.723c-.291.196-.64.289-.99.264a2.618 2.618 0 0 1-1.048-.206 11.44 11.44 0 0 1-.532-.253 1.284 1.284 0 0 0-.587-.15.717.717 0 0 0-.501.176.63.63 0 0 0-.195.491.796.796 0 0 0 .148.482 1.2 1.2 0 0 0 .456.354 5.113 5.113 0 0 0 2.212.419 4.554 4.554 0 0 0 1.624-.265 2.296 2.296 0 0 0 1.08-.801c.267-.39.402-.855.386-1.327a2.09 2.09 0 0 0-.279-1.101 2.53 2.53 0 0 0-.772-.792A7.198 7.198 0 0 0 8.486 7.3a1.05 1.05 0 0 0-.145-.058 18.182 18.182 0 0 1-1.013-.447 1.827 1.827 0 0 1-.54-.387.727.727 0 0 1-.2-.508.805.805 0 0 1 .385-.723 1.76 1.76 0 0 1 .968-.247c.26-.003.52.03.772.096.274.079.542.177.802.293.105.049.22.075.336.076a.6.6 0 0 0 .453-.19.69.69 0 0 0 .18-.496.717.717 0 0 0-.17-.476 1.374 1.374 0 0 0-.556-.354 3.69 3.69 0 0 0-.708-.183 5.963 5.963 0 0 0-1.022-.078 4.53 4.53 0 0 0-1.536.258 2.71 2.71 0 0 0-1.174.784 1.91 1.91 0 0 0-.45 1.287c-.01.37.076.736.25 1.063z"/>
                            </g>
                        </g>
                    </svg>
                    <svg class="h-8 mr-4 text-white duration-150 fill-current transition-color"
                         viewBox="0 0 680 680" xmlns="http://www.w3.org/2000/svg">
                        <g stroke="none" stroke-width="1">
                            <g transform="translate(-401 -701)">
                                <g transform="translate(-293 -236)">
                                    <g transform="translate(463 909)">
                                        <g transform="translate(0 28)">
                                            <g transform="translate(229.885)">
                                                <path
                                                    d="M242.088 0c-36.478.027-66 29.582-65.973 66-.027 36.418 29.522 65.973 66 66h66V66.027C308.142 29.608 278.593.054 242.088 0c.027 0 .027 0 0 0zm.23 175H66.912c-36.365.027-65.824 29.576-65.797 65.987-.054 36.41 29.405 65.96 65.77 66.013h175.433c36.366-.027 65.824-29.576 65.797-65.987.027-36.437-29.431-65.986-65.797-66.013zM681.115 240.987c.027-36.411-29.522-65.96-66-65.987-36.478.027-66.027 29.576-66 65.987V307h66c36.478-.027 66.027-29.576 66-66.013zm-175 .214V65.772C506.142 29.506 476.614.054 440.13 0c-36.486.027-66.04 29.48-66.014 65.772v175.429c-.054 36.293 29.501 65.745 65.987 65.799 36.485-.027 66.04-29.48 66.013-65.8zM440.115 680c36.478-.027 66.027-29.582 66-66 .027-36.418-29.522-65.973-66-66h-66v66c-.027 36.392 29.522 65.946 66 66zm-.23-175h175.433c36.366-.027 65.824-29.576 65.797-65.987.054-36.41-29.404-65.96-65.77-66.013H439.912c-36.366.027-65.824 29.576-65.797 65.987-.027 36.437 29.405 65.986 65.77 66.013zM1.115 439c-.027 36.418 29.522 65.973 66 66 36.478-.027 66.027-29.582 66-66v-66h-66c-36.478.027-66.027 29.582-66 66zm175-.249v175.444c-.054 36.296 29.501 65.751 65.987 65.805 36.485-.027 66.04-29.482 66.013-65.778V438.805c.054-36.296-29.501-65.751-65.986-65.805-36.513 0-66.04 29.455-66.014 65.751 0 0 0 .027 0 0z" />
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

            <div class="relative pt-8 pb-8 overflow-hidden bg-white bg-opacity-90 rounded-md mt-16 ">
                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-48 "></div>

                <div class="relative">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 w-full">
                        <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-16 lg:px-0">
                            <div>
                                <div class="">
                                    <h2 class="mt-8 md:mt-0 text-center md:text-left text-3xl font-extrabold tracking-tight text-gray-900">
                                        The web3 space is rapidly growing, how do I stay updated?
                                    </h2>
                                    <p class="mt-4 text-lg text-gray-500">
                                        We have collated platforms that post updates about jobs, events,
                                        and news in the web3 space and have created a way for you to
                                        connect to them via Telegram, Slack, and Twitter platforms.
                                        You subscribe here and we deliver the updates to you via these platforms.
                                    </p>
                                    <div class="flex items-center justify-center">
                                        <div class="mt-6 flex flex-col flex-grow-0 flex-shrink items-center">
                                            <a href="/login" class="inline-flex bg-blueGray-800 bg-origin-border px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white hover:from-hulk-700 hover:to-hulk-800">
                                                Login To Start
                                            </a>
                                            <div class="inline-block text-xs font-midnight-800 text-center uppercase font-medium pt-2">
                                                Yeah! It is free.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </main>

    </div>

    <footer class="flex flex-col md:flex-row items-center justify-center md:space-x-8 ">
        <a class="text-gray-100 no-underline text-sm py-2 md:py-4" href="/">Imprint</a>
        <a class="text-gray-100 no-underline text-sm py-2 md:py-4" href="/">Privacy Policy</a>
        <a class="text-gray-100 no-underline text-sm py-2 md:py-4" href="/">Terms &amp; Conditions</a>
        <a class="text-gray-100 no-underline text-sm py-2 md:py-4" href="/">Disclaimer</a>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</div>
