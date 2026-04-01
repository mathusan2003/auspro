@extends('layouts.support-voice')

@section('title', 'Home')

@section('content')
    @php
        $services = [
            [
                'title' => 'Community Networking and Support Forum',
                'icon' => 'users',
            ],
            [
                'title' => 'Support Network Development',
                'icon' => 'network',
            ],
            [
                'title' => 'Advocacy and Participant Support',
                'icon' => 'megaphone',
            ],
            [
                'title' => 'Information and Education Session',
                'icon' => 'education',
            ],
            [
                'title' => 'Resource and Information Hub',
                'icon' => 'hub',
            ],
            [
                'title' => 'Service Provider Connection and Guidance',
                'icon' => 'provider',
            ],
            [
                'title' => 'Stakeholder Engagement and Collaboration',
                'icon' => 'collab',
            ],
        ];
    @endphp

    <section
        class="relative isolate flex min-h-[360px] h-[64vh] items-start justify-center overflow-hidden bg-violet-50 sm:h-[70vh] md:h-[80vh] md:min-h-[560px]"
        aria-label="Support Voice Australia hero"
    >
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            <img
                src="{{ asset('img/zxy.jpeg') }}"
                alt=""
                class="h-full w-full object-cover object-center"
                loading="eager"
                decoding="async"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-white/45 via-white/20 to-sva-lavender/35"></div>
        </div>

        <div class="relative z-10 mx-auto flex w-full max-w-4xl flex-col items-center px-4 pt-6 pb-12 text-center sm:max-w-5xl sm:pt-8 sm:pb-14 md:max-w-6xl md:pt-10 md:pb-16">
            <h1 class="max-w-4xl text-balance text-3xl font-bold leading-snug tracking-tight text-violet-700 sm:text-4xl md:text-5xl md:leading-tight lg:text-[3rem] lg:leading-tight">
                Supporting You Every Step of the Way
            </h1>
            <p class="mt-6 max-w-3xl text-pretty text-lg leading-relaxed text-neutral-900 sm:mt-7 sm:text-xl md:mt-8 md:text-2xl">
                Support Voice Australia exists to amplify participant voices, strengthen community connections, and make navigating the NDIS clearer and fairer. We bring people together through advocacy, education, and practical support so every person can pursue their goals with confidence.
            </p>
        </div>
    </section>

    <section class="w-full overflow-hidden bg-violet-50/40" aria-hidden="true">
        <img
            src="{{ asset('img/afterhero.jpeg') }}"
            alt=""
            class="block h-auto w-full"
            loading="lazy"
            decoding="async"
        >
    </section>

    @php
        $serviceDescriptions = [
            'Community Networking and Support Forum' => 'Build meaningful peer connections through guided forums and community-led support spaces.',
            'Support Network Development' => 'Strengthen your personal support circle with practical planning and trusted local connections.',
            'Advocacy and Participant Support' => 'Receive participant-first advocacy that protects your rights and helps you navigate decisions confidently.',
            'Information and Education Session' => 'Access clear NDIS education sessions that simplify complex information for families and participants.',
            'Resource and Information Hub' => 'Explore reliable tools, references, and curated resources in one easy-to-use place.',
            'Service Provider Connection and Guidance' => 'Find suitable providers faster with informed guidance tailored to your goals and preferences.',
            'Stakeholder Engagement and Collaboration' => 'Create better outcomes through coordinated communication with families, providers, and communities.',
        ];
        $serviceSlides = array_map(
            fn ($service) => [
                'title' => $service['title'],
                'description' => $serviceDescriptions[$service['title']] ?? 'Practical support designed around your goals.',
            ],
            $services,
        );
    @endphp

    <section
        id="services"
        class="relative isolate scroll-mt-24 overflow-hidden py-10 md:py-12"
        aria-labelledby="services-heading"
    >
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <img
                src="{{ asset('img/serback.jpeg') }}"
                alt=""
                class="h-full w-full object-cover object-center"
                loading="lazy"
                decoding="async"
            >
        </div>
        <div class="container relative z-10 mx-auto max-w-3xl px-4" x-data="{ servicesOpen: null }">
            <h2
                id="services-heading"
                class="text-center text-3xl font-bold tracking-tight text-[#9784B0] sm:text-4xl md:text-[2.5rem] md:leading-tight"
            >
                Our Services
            </h2>

            <ul class="mt-8 flex flex-col gap-3 sm:mt-10 md:gap-4" role="list">
                @foreach ($serviceSlides as $index => $item)
                    <li class="list-none">
                        <div class="rounded-2xl bg-white px-4 py-4 shadow-sm ring-1 ring-violet-200/60 md:rounded-3xl md:px-5 md:py-5">
                            <button
                                type="button"
                                id="services-trigger-{{ $index }}"
                                class="flex w-full items-start justify-between gap-4 text-left focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-500"
                                x-on:click="servicesOpen = servicesOpen === {{ $index }} ? null : {{ $index }}"
                                x-bind:aria-expanded="servicesOpen === {{ $index }} ? 'true' : 'false'"
                                aria-controls="services-panel-{{ $index }}"
                            >
                                <span class="min-w-0 flex-1 pt-0.5 text-base font-bold leading-snug text-[#9784B0] md:text-lg">
                                    {{ $item['title'] }}
                                </span>
                                <span
                                    class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-950 text-white shadow-md"
                                    aria-hidden="true"
                                >
                                    <svg
                                        class="h-5 w-5 transition-transform duration-200"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2.2"
                                        x-bind:class="servicesOpen === {{ $index }} ? 'rotate-180' : ''"
                                    >
                                        <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                            </button>
                            <div
                                id="services-panel-{{ $index }}"
                                role="region"
                                aria-labelledby="services-trigger-{{ $index }}"
                                x-show="servicesOpen === {{ $index }}"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-1"
                                x-cloak
                                class="mt-4 border-t border-violet-200/50 pt-4"
                            >
                                <p class="pr-14 text-sm leading-relaxed text-sva-body md:text-base">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="w-full overflow-hidden bg-violet-50/40" aria-hidden="true">
        <img
            src="{{ asset('img/afterfq.jpeg') }}"
            alt=""
            class="block h-auto w-full"
            loading="lazy"
            decoding="async"
        >
    </section>

    <section id="faq" class="relative isolate scroll-mt-24 overflow-hidden py-16 md:py-24">
        <div class="pointer-events-none absolute inset-0" aria-hidden="true">
            <img
                src="{{ asset('img/fqback.jpeg') }}"
                alt=""
                class="h-full w-full object-cover object-center"
                loading="lazy"
                decoding="async"
            >
        </div>
        <div class="container relative z-10 mx-auto px-4">
                <h2 class="text-center text-3xl font-bold tracking-tight text-[#9784B0] sm:text-4xl md:text-[2.5rem] md:leading-tight">
                    Frequently Asked Questions
                </h2>

                <div class="mx-auto mt-12 grid max-w-3xl grid-cols-1 gap-5 sm:mt-14 sm:grid-cols-2 sm:gap-6">
                    <a
                        href="{{ route('faq') }}"
                        class="group relative inline-flex min-h-14 items-center justify-between rounded-full border-2 border-[#5C55F2] bg-white pl-6 pr-2 text-base font-semibold text-[#2E2A6E] shadow-[0_10px_25px_rgba(92,85,242,0.18)] transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_14px_30px_rgba(92,85,242,0.24)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-300 sm:min-h-16 sm:pl-7 sm:text-lg"
                    >
                        <span>FAQs</span>
                        <span class="ml-4 inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#5C55F2] text-white transition group-hover:bg-[#4A44CC] sm:h-11 sm:w-11">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                    <a
                        href="{{ route('you.asked') }}"
                        class="group relative inline-flex min-h-14 items-center justify-between rounded-full border-2 border-[#5C55F2] bg-white pl-6 pr-2 text-base font-semibold text-[#2E2A6E] shadow-[0_10px_25px_rgba(92,85,242,0.18)] transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_14px_30px_rgba(92,85,242,0.24)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-300 sm:min-h-16 sm:pl-7 sm:text-lg"
                    >
                        <span>You Asked</span>
                        <span class="ml-4 inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-[#5C55F2] text-white transition group-hover:bg-[#4A44CC] sm:h-11 sm:w-11">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                                <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>
            </div>
    </section>
@endsection
