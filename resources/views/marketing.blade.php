<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ __(':app - keep track of your domains!', ['app' => config('app.name')]) }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Icon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon"/>
</head>
<body>
<header x-data="
      {
        navbarOpen: false,
      }
    " :class="scrolledFromTop ? 'fixed z-50 bg-primary bg-opacity-80 shadow-sm backdrop-blur-sm' : 'absolute' " class="left-0 top-0 z-50 w-full absolute">
    <div class="container mx-auto">
        <div class="relative -mx-4 flex items-center justify-between">
            <div class="w-60 max-w-full px-4">
                <a href="{{ route('domains.index') }}" class="block w-full py-5">
                    <x-application-logo class="inline h-20 w-20" />
                </a>
            </div>
            <div class="flex w-full items-center justify-between px-4">
                <div>
                    <button @click="navbarOpen = !navbarOpen " :class="navbarOpen &amp;&amp; 'navbarTogglerActive' " id="navbarToggler" class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] lg:hidden">
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                    </button>
                    <nav :class="!navbarOpen &amp;&amp; 'hidden' " id="navbarCollapse" class="absolute right-4 top-full w-full max-w-[250px] rounded-lg bg-white px-6 py-5 shadow lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:shadow-none hidden">
                        <ul class="blcok lg:flex">
                            <li>
                                <a href="{{ route('domains.index') }}" class="flex py-2 text-base font-medium text-dark hover:text-primary hover:opacity-100 lg:ml-12 lg:inline-flex lg:text-white lg:hover:text-white lg:hover:opacity-50">
                                    {{ __('Home') }}
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
                    <a wire:navigate href="{{ route('login') }}" class="mr-3 rounded-lg bg-primary px-7 py-3 text-base font-medium text-white hover:opacity-50">
                        {{ __('Login') }}
                    </a>
                    <a wire:navigate href="{{ route('register') }}" class="rounded-lg bg-white bg-opacity-20 px-7 py-3 text-base font-medium text-white hover:text-dark ease-in-out hover:opacity-80">
                        {{ __('Join Up') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<div x-data="
        {
          videoOpen: false,
        }
      " class="relative bg-primary pt-[120px] md:pt-[130px] lg:pt-[160px]">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap items-center">
            <div class="w-full px-4">
                <div class="hero-content text-center">
                    <h1 class="mx-auto mb-5 max-w-[530px] text-4xl font-bold leading-snug text-white sm:text-[42px]">
                        {{ __('Keep an eye on that dream domain of yours today!') }}
                    </h1>
                    <p class="mx-auto mb-8 max-w-[480px] text-base text-[#e4e4e4]">
                        {{ __('You know that domain you have always wanted? Sign up and start tracking, we will notify you when it is available immediately.') }}
                    </p>
                    <ul class="flex flex-wrap items-center justify-center">
                        <li class="mx-2 mb-3 sm:mx-4">
                            <a wire:navigate href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-lg bg-white px-5 py-4 text-center text-base font-normal text-dark hover:bg-opacity-90 sm:px-10">
                             {{ __('Lets get started!') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full px-4">
                <div class="relative z-10 mx-auto max-w-[845px]">
                    <div class="mt-16">
                        <img src="{{ asset('hero.png') }}" class="mx-auto max-w-full rounded-t-xl rounded-tr-xl">
                    </div>
                    <div class="absolute -left-9 bottom-0 z-[-1]">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)" fill="white"></circle>
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)" fill="white"></circle>
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)" fill="white"></circle>
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)" fill="white"></circle>
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)" fill="white"></circle>
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)" fill="white"></circle>
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)" fill="white"></circle>
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)" fill="white"></circle>
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)" fill="white"></circle>
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)" fill="white"></circle>
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)" fill="white"></circle>
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)" fill="white"></circle>
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)" fill="white"></circle>
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)" fill="white"></circle>
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)" fill="white"></circle>
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)" fill="white"></circle>
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)" fill="white"></circle>
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)" fill="white"></circle>
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)" fill="white"></circle>
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)" fill="white"></circle>
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)" fill="white"></circle>
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)" fill="white"></circle>
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)" fill="white"></circle>
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)" fill="white"></circle>
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)" fill="white"></circle>
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)" fill="white"></circle>
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)" fill="white"></circle>
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)" fill="white"></circle>
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)" fill="white"></circle>
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)" fill="white"></circle>
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)" fill="white"></circle>
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)" fill="white"></circle>
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)" fill="white"></circle>
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)" fill="white"></circle>
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)" fill="white"></circle>
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)" fill="white"></circle>
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)" fill="white"></circle>
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)" fill="white"></circle>
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)" fill="white"></circle>
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)" fill="white"></circle>
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)" fill="white"></circle>
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)" fill="white"></circle>
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)" fill="white"></circle>
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)" fill="white"></circle>
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)" fill="white"></circle>
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)" fill="white"></circle>
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)" fill="white"></circle>
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)" fill="white"></circle>
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)" fill="white"></circle>
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)" fill="white"></circle>
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)" fill="white"></circle>
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)" fill="white"></circle>
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)" fill="white"></circle>
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)" fill="white"></circle>
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)" fill="white"></circle>
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)" fill="white"></circle>
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)" fill="white"></circle>
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)" fill="white"></circle>
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)" fill="white"></circle>
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)" fill="white"></circle>
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)" fill="white"></circle>
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)" fill="white"></circle>
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)" fill="white"></circle>
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)" fill="white"></circle>
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)" fill="white"></circle>
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)" fill="white"></circle>
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)" fill="white"></circle>
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)" fill="white"></circle>
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)" fill="white"></circle>
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)" fill="white"></circle>
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)" fill="white"></circle>
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)" fill="white"></circle>
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)" fill="white"></circle>
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)" fill="white"></circle>
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)" fill="white"></circle>
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)" fill="white"></circle>
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)" fill="white"></circle>
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)" fill="white"></circle>
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)" fill="white"></circle>
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)" fill="white"></circle>
                        </svg>
                    </div>
                    <div class="absolute -right-6 -top-6 z-[-1]">
                        <svg width="134" height="106" viewBox="0 0 134 106" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.66667" cy="104" r="1.66667" transform="rotate(-90 1.66667 104)" fill="white"></circle>
                            <circle cx="16.3333" cy="104" r="1.66667" transform="rotate(-90 16.3333 104)" fill="white"></circle>
                            <circle cx="31" cy="104" r="1.66667" transform="rotate(-90 31 104)" fill="white"></circle>
                            <circle cx="45.6667" cy="104" r="1.66667" transform="rotate(-90 45.6667 104)" fill="white"></circle>
                            <circle cx="60.3333" cy="104" r="1.66667" transform="rotate(-90 60.3333 104)" fill="white"></circle>
                            <circle cx="88.6667" cy="104" r="1.66667" transform="rotate(-90 88.6667 104)" fill="white"></circle>
                            <circle cx="117.667" cy="104" r="1.66667" transform="rotate(-90 117.667 104)" fill="white"></circle>
                            <circle cx="74.6667" cy="104" r="1.66667" transform="rotate(-90 74.6667 104)" fill="white"></circle>
                            <circle cx="103" cy="104" r="1.66667" transform="rotate(-90 103 104)" fill="white"></circle>
                            <circle cx="132" cy="104" r="1.66667" transform="rotate(-90 132 104)" fill="white"></circle>
                            <circle cx="1.66667" cy="89.3333" r="1.66667" transform="rotate(-90 1.66667 89.3333)" fill="white"></circle>
                            <circle cx="16.3333" cy="89.3333" r="1.66667" transform="rotate(-90 16.3333 89.3333)" fill="white"></circle>
                            <circle cx="31" cy="89.3333" r="1.66667" transform="rotate(-90 31 89.3333)" fill="white"></circle>
                            <circle cx="45.6667" cy="89.3333" r="1.66667" transform="rotate(-90 45.6667 89.3333)" fill="white"></circle>
                            <circle cx="60.3333" cy="89.3338" r="1.66667" transform="rotate(-90 60.3333 89.3338)" fill="white"></circle>
                            <circle cx="88.6667" cy="89.3338" r="1.66667" transform="rotate(-90 88.6667 89.3338)" fill="white"></circle>
                            <circle cx="117.667" cy="89.3338" r="1.66667" transform="rotate(-90 117.667 89.3338)" fill="white"></circle>
                            <circle cx="74.6667" cy="89.3338" r="1.66667" transform="rotate(-90 74.6667 89.3338)" fill="white"></circle>
                            <circle cx="103" cy="89.3338" r="1.66667" transform="rotate(-90 103 89.3338)" fill="white"></circle>
                            <circle cx="132" cy="89.3338" r="1.66667" transform="rotate(-90 132 89.3338)" fill="white"></circle>
                            <circle cx="1.66667" cy="74.6673" r="1.66667" transform="rotate(-90 1.66667 74.6673)" fill="white"></circle>
                            <circle cx="1.66667" cy="31.0003" r="1.66667" transform="rotate(-90 1.66667 31.0003)" fill="white"></circle>
                            <circle cx="16.3333" cy="74.6668" r="1.66667" transform="rotate(-90 16.3333 74.6668)" fill="white"></circle>
                            <circle cx="16.3333" cy="31.0003" r="1.66667" transform="rotate(-90 16.3333 31.0003)" fill="white"></circle>
                            <circle cx="31" cy="74.6668" r="1.66667" transform="rotate(-90 31 74.6668)" fill="white"></circle>
                            <circle cx="31" cy="31.0003" r="1.66667" transform="rotate(-90 31 31.0003)" fill="white"></circle>
                            <circle cx="45.6667" cy="74.6668" r="1.66667" transform="rotate(-90 45.6667 74.6668)" fill="white"></circle>
                            <circle cx="45.6667" cy="31.0003" r="1.66667" transform="rotate(-90 45.6667 31.0003)" fill="white"></circle>
                            <circle cx="60.3333" cy="74.6668" r="1.66667" transform="rotate(-90 60.3333 74.6668)" fill="white"></circle>
                            <circle cx="60.3333" cy="31.0001" r="1.66667" transform="rotate(-90 60.3333 31.0001)" fill="white"></circle>
                            <circle cx="88.6667" cy="74.6668" r="1.66667" transform="rotate(-90 88.6667 74.6668)" fill="white"></circle>
                            <circle cx="88.6667" cy="31.0001" r="1.66667" transform="rotate(-90 88.6667 31.0001)" fill="white"></circle>
                            <circle cx="117.667" cy="74.6668" r="1.66667" transform="rotate(-90 117.667 74.6668)" fill="white"></circle>
                            <circle cx="117.667" cy="31.0001" r="1.66667" transform="rotate(-90 117.667 31.0001)" fill="white"></circle>
                            <circle cx="74.6667" cy="74.6668" r="1.66667" transform="rotate(-90 74.6667 74.6668)" fill="white"></circle>
                            <circle cx="74.6667" cy="31.0001" r="1.66667" transform="rotate(-90 74.6667 31.0001)" fill="white"></circle>
                            <circle cx="103" cy="74.6668" r="1.66667" transform="rotate(-90 103 74.6668)" fill="white"></circle>
                            <circle cx="103" cy="31.0001" r="1.66667" transform="rotate(-90 103 31.0001)" fill="white"></circle>
                            <circle cx="132" cy="74.6668" r="1.66667" transform="rotate(-90 132 74.6668)" fill="white"></circle>
                            <circle cx="132" cy="31.0001" r="1.66667" transform="rotate(-90 132 31.0001)" fill="white"></circle>
                            <circle cx="1.66667" cy="60.0003" r="1.66667" transform="rotate(-90 1.66667 60.0003)" fill="white"></circle>
                            <circle cx="1.66667" cy="16.3336" r="1.66667" transform="rotate(-90 1.66667 16.3336)" fill="white"></circle>
                            <circle cx="16.3333" cy="60.0003" r="1.66667" transform="rotate(-90 16.3333 60.0003)" fill="white"></circle>
                            <circle cx="16.3333" cy="16.3336" r="1.66667" transform="rotate(-90 16.3333 16.3336)" fill="white"></circle>
                            <circle cx="31" cy="60.0003" r="1.66667" transform="rotate(-90 31 60.0003)" fill="white"></circle>
                            <circle cx="31" cy="16.3336" r="1.66667" transform="rotate(-90 31 16.3336)" fill="white"></circle>
                            <circle cx="45.6667" cy="60.0003" r="1.66667" transform="rotate(-90 45.6667 60.0003)" fill="white"></circle>
                            <circle cx="45.6667" cy="16.3336" r="1.66667" transform="rotate(-90 45.6667 16.3336)" fill="white"></circle>
                            <circle cx="60.3333" cy="60.0003" r="1.66667" transform="rotate(-90 60.3333 60.0003)" fill="white"></circle>
                            <circle cx="60.3333" cy="16.3336" r="1.66667" transform="rotate(-90 60.3333 16.3336)" fill="white"></circle>
                            <circle cx="88.6667" cy="60.0003" r="1.66667" transform="rotate(-90 88.6667 60.0003)" fill="white"></circle>
                            <circle cx="88.6667" cy="16.3336" r="1.66667" transform="rotate(-90 88.6667 16.3336)" fill="white"></circle>
                            <circle cx="117.667" cy="60.0003" r="1.66667" transform="rotate(-90 117.667 60.0003)" fill="white"></circle>
                            <circle cx="117.667" cy="16.3336" r="1.66667" transform="rotate(-90 117.667 16.3336)" fill="white"></circle>
                            <circle cx="74.6667" cy="60.0003" r="1.66667" transform="rotate(-90 74.6667 60.0003)" fill="white"></circle>
                            <circle cx="74.6667" cy="16.3336" r="1.66667" transform="rotate(-90 74.6667 16.3336)" fill="white"></circle>
                            <circle cx="103" cy="60.0003" r="1.66667" transform="rotate(-90 103 60.0003)" fill="white"></circle>
                            <circle cx="103" cy="16.3336" r="1.66667" transform="rotate(-90 103 16.3336)" fill="white"></circle>
                            <circle cx="132" cy="60.0003" r="1.66667" transform="rotate(-90 132 60.0003)" fill="white"></circle>
                            <circle cx="132" cy="16.3336" r="1.66667" transform="rotate(-90 132 16.3336)" fill="white"></circle>
                            <circle cx="1.66667" cy="45.3336" r="1.66667" transform="rotate(-90 1.66667 45.3336)" fill="white"></circle>
                            <circle cx="1.66667" cy="1.66683" r="1.66667" transform="rotate(-90 1.66667 1.66683)" fill="white"></circle>
                            <circle cx="16.3333" cy="45.3336" r="1.66667" transform="rotate(-90 16.3333 45.3336)" fill="white"></circle>
                            <circle cx="16.3333" cy="1.66683" r="1.66667" transform="rotate(-90 16.3333 1.66683)" fill="white"></circle>
                            <circle cx="31" cy="45.3336" r="1.66667" transform="rotate(-90 31 45.3336)" fill="white"></circle>
                            <circle cx="31" cy="1.66683" r="1.66667" transform="rotate(-90 31 1.66683)" fill="white"></circle>
                            <circle cx="45.6667" cy="45.3336" r="1.66667" transform="rotate(-90 45.6667 45.3336)" fill="white"></circle>
                            <circle cx="45.6667" cy="1.66683" r="1.66667" transform="rotate(-90 45.6667 1.66683)" fill="white"></circle>
                            <circle cx="60.3333" cy="45.3338" r="1.66667" transform="rotate(-90 60.3333 45.3338)" fill="white"></circle>
                            <circle cx="60.3333" cy="1.66707" r="1.66667" transform="rotate(-90 60.3333 1.66707)" fill="white"></circle>
                            <circle cx="88.6667" cy="45.3338" r="1.66667" transform="rotate(-90 88.6667 45.3338)" fill="white"></circle>
                            <circle cx="88.6667" cy="1.66707" r="1.66667" transform="rotate(-90 88.6667 1.66707)" fill="white"></circle>
                            <circle cx="117.667" cy="45.3338" r="1.66667" transform="rotate(-90 117.667 45.3338)" fill="white"></circle>
                            <circle cx="117.667" cy="1.66707" r="1.66667" transform="rotate(-90 117.667 1.66707)" fill="white"></circle>
                            <circle cx="74.6667" cy="45.3338" r="1.66667" transform="rotate(-90 74.6667 45.3338)" fill="white"></circle>
                            <circle cx="74.6667" cy="1.66707" r="1.66667" transform="rotate(-90 74.6667 1.66707)" fill="white"></circle>
                            <circle cx="103" cy="45.3338" r="1.66667" transform="rotate(-90 103 45.3338)" fill="white"></circle>
                            <circle cx="103" cy="1.66707" r="1.66667" transform="rotate(-90 103 1.66707)" fill="white"></circle>
                            <circle cx="132" cy="45.3338" r="1.66667" transform="rotate(-90 132 45.3338)" fill="white"></circle>
                            <circle cx="132" cy="1.66707" r="1.66667" transform="rotate(-90 132 1.66707)" fill="white"></circle>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="relative z-20 overflow-hidden bg-white pb-12 pt-20 dark:bg-dark lg:pb-[90px] lg:pt-[120px]">
    <div class="container mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="w-full px-4">
                <div class="mx-auto mb-[60px] max-w-[510px] text-center">
              <span class="mb-2 block text-lg font-semibold text-primary">
                  {{ __('Our Plans!') }}
              </span>
                    <h2 class="mb-3 text-3xl font-bold text-dark dark:text-white sm:text-4xl md:text-[40px]">
                        {{ __('See what plan suits you..') }}
                    </h2>
                    <p class="text-base text-body-color dark:text-dark-6">
                        {{ __('We have a range of plans to suit everybody, take a look below!') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="-mx-4 flex flex-wrap justify-center">
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="relative z-10 mb-10 overflow-hidden rounded-xl bg-white px-8 py-10 shadow-pricing-2 dark:bg-dark-2 sm:p-12 lg:px-6 lg:py-10 xl:p-14">
              <span class="mb-5 block text-xl font-medium text-dark dark:text-white">
                Starter
              </span>

                    <h2 class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:text-[42px]">
                        <span class="text-xl font-medium">$</span>
                        <span class="px-0.5">4.00</span>
                        <span class="text-base text-body-color dark:text-dark-6">
                  Per Month
                </span>
                    </h2>

                    <div class="mb-[50px]">
                        <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">
                            Features
                        </h5>

                        <div class="flex flex-col gap-[14px]">
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Track 1 Domain') }}
                            </p>
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Access to Support') }}
                            </p>
                        </div>
                    </div>
                    <a wire:navigate href="{{ route('domains.index') }}" class="inline-block rounded-md bg-primary px-7 py-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                        {{ __('Join and subscribe now!') }}
                    </a>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="relative z-10 mb-10 overflow-hidden rounded-xl bg-white px-8 py-10 shadow-pricing-2 dark:bg-dark-2 sm:p-12 lg:px-6 lg:py-10 xl:p-14">
                    <p class="absolute right-[-50px] top-[60px] inline-block -rotate-90 rounded-bl-md rounded-tl-md bg-primary px-5 py-2 text-base font-medium text-white">
                        Recommended
                    </p>
                    <span class="mb-5 block text-xl font-medium text-dark dark:text-white">
                Basic
              </span>

                    <h2 class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:text-[42px]">
                        <span class="text-xl font-medium">$</span>
                        <span class="px-0.5">9.00</span>
                        <span class="text-base text-body-color dark:text-dark-6">
                  Per Month
                </span>
                    </h2>

                    <div class="mb-[50px]">
                        <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">
                            Features
                        </h5>

                        <div class="flex flex-col gap-[14px]">
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Track 5 Domains') }}
                            </p>
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Access to Support') }}
                            </p>
                        </div>
                    </div>
                    <a wire:navigate href="{{ route('domains.index') }}" class="inline-block rounded-md bg-primary px-7 py-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                        {{ __('Join and subscribe now!') }}
                    </a>
                </div>
            </div>
            <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                <div class="relative z-10 mb-10 overflow-hidden rounded-xl bg-white px-8 py-10 shadow-pricing-2 dark:bg-dark-2 sm:p-12 lg:px-6 lg:py-10 xl:p-14">
              <span class="mb-5 block text-xl font-medium text-dark dark:text-white">
                Premium
              </span>

                    <h2 class="mb-11 text-4xl font-semibold text-dark dark:text-white xl:text-[42px]">
                        <span class="text-xl font-medium">$</span>
                        <span class="px-0.5">25.00</span>
                        <span class="text-base text-body-color dark:text-dark-6">
                  Per Month
                </span>
                    </h2>

                    <div class="mb-[50px]">
                        <h5 class="mb-5 text-lg font-medium text-dark dark:text-white">
                            Features
                        </h5>

                        <div class="flex flex-col gap-[14px]">
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Track 15 Domains') }}
                            </p>
                            <p class="text-base text-body-color dark:text-dark-6">
                                {{ __('Access to Support') }}
                            </p>
                        </div>
                    </div>
                    <a wire:navigate href="{{ route('domains.index') }}" class="inline-block rounded-md bg-primary px-7 py-3 text-center text-base font-medium text-white transition hover:bg-blue-dark">
                        {{ __('Join and subscribe now!') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative z-10 overflow-hidden bg-primary py-20 lg:py-[110px]">
    <div class="container mx-auto">
        <div class="relative overflow-hidden">
            <div class="-mx-4 flex flex-wrap items-stretch">
                <div class="w-full px-4">
                    <div class="mx-auto max-w-[570px] text-center">
                        <h2 class="mb-6 text-3xl font-semibold leading-snug text-white md:text-[40px]">
                            {{ __('What are you waiting for?') }}
                            <span class="font-light">
                                {{ __('Keep an eye on your dream domain now!') }}
                            </span>
                        </h2>
                        <p class="mb-8 text-base leading-relaxed text-white md:pr-10">
                            {{ __('Let us keep an eye on the domain you have always wanted.') }}
                        </p>
                        <a href="{{ route('register') }}" class="inline-block rounded bg-[#13C296] px-7 py-3 text-base font-medium text-white transition hover:bg-opacity-90">
                            Join Up!
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <span class="absolute left-0 top-0">
          <svg width="495" height="470" viewBox="0 0 495 470" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="55" cy="442" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50"></circle>
            <circle cx="446" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20"></circle>
            <path d="M245.406 137.609L233.985 94.9852L276.609 106.406L245.406 137.609Z" stroke="white" stroke-opacity="0.08" stroke-width="12"></path>
          </svg>
        </span>
        <span class="absolute bottom-0 right-0">
          <svg width="493" height="470" viewBox="0 0 493 470" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="462" cy="5" r="138" stroke="white" stroke-opacity="0.04" stroke-width="50"></circle>
            <circle cx="49" cy="470" r="39" stroke="white" stroke-opacity="0.04" stroke-width="20"></circle>
            <path d="M222.393 226.701L272.808 213.192L259.299 263.607L222.393 226.701Z" stroke="white" stroke-opacity="0.06" stroke-width="13"></path>
          </svg>
        </span>
    </div>
</section>
<footer>
    <div class="bg-primary border-t-4 border-white">
        <div class="mx-auto max-w-5xl py-3 text-white hover:underline ease-in-out font-bold text-center">
            <a href="mailto:lewis@larsens.dev">
                {{ __('Contact Us!') }}
            </a>
        </div>
    </div>
</footer>
</body>
</html>
