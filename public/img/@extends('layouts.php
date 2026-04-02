@extends('layouts.support-voice')

@section('title', 'Home')

@section('content')
    @php
        $services = [
            ['title' => 'Community Networking and Support Forum','icon' => 'users'],
            ['title' => 'Support Network Development','icon' => 'network'],
            ['title' => 'Advocacy and Participant Support','icon' => 'megaphone'],
            ['title' => 'Information and Education Session','icon' => 'education'],
            ['title' => 'Resource and Information Hub','icon' => 'hub'],
            ['title' => 'Service Provider Connection and Guidance','icon' => 'provider'],
            ['title' => 'Stakeholder Engagement and Collaboration','icon' => 'collab'],
        ];
    @endphp

    <!-- HERO SECTION -->
    <section class="relative isolate flex min-h-[360px] h-[64vh] items-start justify-center overflow-hidden bg-violet-50 sm:h-[70vh] md:h-[80vh] md:min-h-[560px]">

        <div class="pointer-events-none absolute inset-0 overflow-hidden">
            <img src="{{ asset('img/zxy.jpeg') }}" class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-b from-white/45 via-white/20 to-sva-lavender/35"></div>
        </div>

        <div class="relative z-10 mx-auto flex w-full max-w-4xl flex-col items-center px-4 pt-6 pb-12 text-center">

            <!-- MAIN HERO HEADING -->
            <h1 class="text-3xl font-bold sm:text-4xl md:text-5xl" style="color:#7B2FF7;">
                Supporting You Every Step of the Way
            </h1>

            <!-- SUB TEXT -->
            <p class="mt-6 max-w-3xl text-lg leading-relaxed sm:text-xl md:text-2xl" style="color:#9A7BD6;">
                Support Voice Australia exists to amplify participant voices, strengthen community connections, and make navigating the NDIS clearer and fairer.
            </p>

        </div>
    </section>


    <!-- SERVICES SECTION -->
    <section id="services" class="py-10">

        <div class="container mx-auto max-w-3xl px-4" x-data="{ servicesOpen: null }">

            <!-- SERVICES HEADING -->
            <h2 class="text-center text-3xl font-bold sm:text-4xl" style="color:#7B2FF7;">
                Our Services
            </h2>

            <ul class="mt-8 flex flex-col gap-3">

                @foreach ($services as $index => $item)
                <li>

                    <div class="rounded-2xl bg-white p-4 shadow">

                        <button
                            class="flex w-full justify-between text-left"
                            x-on:click="servicesOpen = servicesOpen === {{ $index }} ? null : {{ $index }}"
                        >

                            <!-- ✅ SUB SERVICE TITLE -->
                            <span class="font-bold text-lg" style="color:#9A7BD6;">
                                {{ $item['title'] }}
                            </span>

                            <span>⌄</span>
                        </button>

                        <!-- DESCRIPTION -->
                        <div x-show="servicesOpen === {{ $index }}" class="mt-3 text-gray-600">
                            Example description here...
                        </div>

                    </div>

                </li>
                @endforeach

            </ul>

        </div>
    </section>

@endsection