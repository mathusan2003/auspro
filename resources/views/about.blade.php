@extends('layouts.support-voice')

@section('title', 'About us')

@section('content')
    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('img/heroback2.png') }}"
            alt="Support worker assisting a child"
            class="h-[64vh] min-h-[360px] w-full object-cover object-center sm:h-[70vh] md:h-[80vh] md:min-h-[560px]"
            loading="eager"
            decoding="async"
        >
        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(49,46,129,0.78)_0%,rgba(79,70,229,0.45)_38%,rgba(99,102,241,0.16)_68%,rgba(99,102,241,0.04)_100%)]"></div>
        <div class="absolute inset-0 flex items-center">
            <div class="container mx-auto px-4">
                <div class="max-w-2xl text-white">
                    <p class="max-w-xl text-base leading-relaxed text-white/90 sm:text-lg">
                        Support Voice Australia exists to amplify participant voices, strengthen community connections, and make navigating the NDIS clearer and fairer. We bring people together through advocacy, education, and practical support so every person can pursue their goals with confidence.
                    </p>
                    <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:items-center">
                        <a
                            href="#about-content"
                            class="inline-flex min-h-12 items-center justify-center rounded-xl bg-white px-6 text-base font-semibold text-indigo-700 shadow-md transition hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        >
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="relative isolate overflow-hidden bg-gradient-to-br from-violet-100 via-sva-lavender to-violet-200/70 pt-8 md:pt-10 lg:pt-12">
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            <div class="absolute -left-24 top-0 h-72 w-72 rounded-full bg-violet-400/25 blur-3xl md:-left-32 md:h-96 md:w-96"></div>
            <div class="absolute -right-20 top-1/4 h-64 w-64 -translate-y-1/2 rounded-full bg-indigo-400/20 blur-3xl md:right-0 md:h-80 md:w-80"></div>
            <div class="absolute bottom-0 left-1/2 h-48 w-[120%] max-w-4xl -translate-x-1/2 translate-y-1/3 rounded-[100%] bg-violet-300/30 blur-3xl"></div>
            <div class="absolute right-[12%] top-[18%] hidden h-24 w-24 rotate-12 rounded-2xl bg-violet-500/15 blur-xl sm:block"></div>
        </div>
    <section class="relative z-10 overflow-hidden bg-gradient-to-b from-white/82 via-violet-100/78 to-sva-lavender-deep/80 pb-14 pt-10 backdrop-blur-[2px] md:pb-20 md:pt-14">
        <div class="pointer-events-none absolute inset-0 opacity-60" aria-hidden="true">
            <div class="absolute -left-20 top-10 h-48 w-48 rounded-full bg-violet-200/70 blur-3xl"></div>
            <div class="absolute right-0 top-32 h-56 w-56 rounded-full bg-sky-200/60 blur-3xl"></div>
            <div class="absolute bottom-0 left-1/3 h-40 w-72 -translate-x-1/2 rounded-[100%] bg-violet-100/80 blur-2xl"></div>
        </div>

        <div class="container relative mx-auto px-4">
            <div
                id="about-content"
                class="mx-auto max-w-3xl scroll-mt-24"
                x-data="{ tab: 'about' }"
                x-cloak
            >

                <div class="relative grid min-h-[12rem] text-center sm:min-h-[10rem] md:text-left">
                    <div
                        role="tabpanel"
                        id="about-panel-about"
                        aria-labelledby="about-tab-about"
                        tabindex="0"
                        class="col-start-1 row-start-1"
                        x-bind:aria-hidden="tab !== 'about'"
                        x-show="tab === 'about'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <h2 class="text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl md:text-5xl">
                            About us
                        </h2>
                        <p class="mt-5 max-w-none text-base leading-relaxed text-sva-body sm:text-lg">
                            Support Voice Australia exists to amplify participant voices, strengthen community connections, and make navigating the NDIS clearer and fairer. We bring people together through advocacy, education, and practical support so every person can pursue their goals with confidence.
                        </p>
                        <a
                            href="#services"
                            class="mt-6 inline-flex min-h-11 items-center text-base font-semibold text-sva-accent underline decoration-violet-300 decoration-2 underline-offset-8 transition hover:text-sva-accent-hover hover:decoration-violet-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-violet-600"
                        >
                            Learn More
                        </a>
                    </div>

                    <div
                        role="tabpanel"
                        id="about-panel-mission"
                        aria-labelledby="about-tab-mission"
                        tabindex="0"
                        class="col-start-1 row-start-1"
                        x-bind:aria-hidden="tab !== 'mission'"
                        x-show="tab === 'mission'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <h2 class="text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl md:text-5xl">
                            Mission
                        </h2>
                        <p class="mt-5 text-base leading-relaxed text-sva-body sm:text-lg">
                            To empower NDIS participants by amplifying their voices, providing clear guidance, and delivering practical support that helps individuals navigate the system with confidence, fairness, and dignity.
                        </p>
                    </div>

                    <div
                        role="tabpanel"
                        id="about-panel-vision"
                        aria-labelledby="about-tab-vision"
                        tabindex="0"
                        class="col-start-1 row-start-1"
                        x-bind:aria-hidden="tab !== 'vision'"
                        x-show="tab === 'vision'"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 translate-y-1"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                    >
                        <h2 class="text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl md:text-5xl">
                            Vision
                        </h2>
                        <p class="mt-5 text-base leading-relaxed text-sva-body sm:text-lg">
                            A connected and inclusive community where every person is heard, supported, and able to pursue their goals with clarity, confidence, and equal opportunity.
                        </p>
                    </div>
                </div>

                <div class="mt-10 flex flex-col gap-3 sm:mt-12 sm:flex-row sm:gap-3" role="tablist" aria-label="About, Mission, and Vision">
                    <button
                        type="button"
                        role="tab"
                        id="about-tab-about"
                        class="min-h-12 w-full rounded-xl px-4 py-3 text-center text-base font-semibold transition duration-200 ease-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 sm:flex-1 sm:py-3.5"
                        x-on:click="tab = 'about'"
                        x-bind:class="tab === 'about'
                            ? 'bg-indigo-950 text-white shadow-md'
                            : 'bg-sva-lavender text-sva-ink shadow-sm ring-1 ring-violet-200/70 hover:bg-sva-lavender-deep'"
                        x-bind:aria-selected="tab === 'about' ? 'true' : 'false'"
                        aria-controls="about-panel-about"
                    >
                        About us
                    </button>
                    <button
                        type="button"
                        role="tab"
                        id="about-tab-mission"
                        class="min-h-12 w-full rounded-xl px-4 py-3 text-center text-base font-semibold transition duration-200 ease-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 sm:flex-1 sm:py-3.5"
                        x-on:click="tab = 'mission'"
                        x-bind:class="tab === 'mission'
                            ? 'bg-indigo-950 text-white shadow-md'
                            : 'bg-sva-lavender text-sva-ink shadow-sm ring-1 ring-violet-200/70 hover:bg-sva-lavender-deep'"
                        x-bind:aria-selected="tab === 'mission' ? 'true' : 'false'"
                        aria-controls="about-panel-mission"
                    >
                        Mission
                    </button>
                    <button
                        type="button"
                        role="tab"
                        id="about-tab-vision"
                        class="min-h-12 w-full rounded-xl px-4 py-3 text-center text-base font-semibold transition duration-200 ease-out focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 sm:flex-1 sm:py-3.5"
                        x-on:click="tab = 'vision'"
                        x-bind:class="tab === 'vision'
                            ? 'bg-indigo-950 text-white shadow-md'
                            : 'bg-sva-lavender text-sva-ink shadow-sm ring-1 ring-violet-200/70 hover:bg-sva-lavender-deep'"
                        x-bind:aria-selected="tab === 'vision' ? 'true' : 'false'"
                        aria-controls="about-panel-vision"
                    >
                        Vision
                    </button>
                </div>
            </div>
        </div>
    </section>

    </div>
@endsection
