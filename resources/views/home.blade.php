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
        class="relative isolate flex min-h-[360px] h-[64vh] items-center justify-center overflow-hidden bg-violet-50 sm:h-[70vh] md:h-[80vh] md:min-h-[560px]"
        aria-label="Support Voice Australia hero"
    >
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
            <img
                src="{{ asset('img/jhjk.png') }}"
                alt=""
                class="h-full w-full object-cover object-center"
                loading="eager"
                decoding="async"
            >
            <div class="absolute inset-0 bg-gradient-to-b from-white/45 via-white/20 to-sva-lavender/35"></div>
        </div>

        <div class="relative z-10 mx-auto flex w-full max-w-4xl flex-col items-center px-4 py-14 text-center sm:max-w-5xl sm:py-16 md:max-w-6xl md:py-20">
            <h1 class="max-w-4xl text-balance text-3xl font-bold leading-snug tracking-tight text-violet-700 sm:text-4xl md:text-5xl md:leading-tight lg:text-[3rem] lg:leading-tight">
                Supporting You Every Step of the Way
            </h1>
            <p class="mt-6 max-w-3xl text-pretty text-lg leading-relaxed text-neutral-900 sm:mt-7 sm:text-xl md:mt-8 md:text-2xl">
                Personalised NDIS support designed around your needs and goals.
            </p>
        </div>
    </section>

    <section class="bg-white py-12 sm:py-14 md:py-16">
        <div class="container mx-auto px-4">
            <div class="mx-auto max-w-4xl text-center">
                <h2 class="text-3xl font-semibold tracking-tight text-sva-ink sm:text-4xl md:text-[2.65rem]">
                    We are here to support
                </h2>
                <p class="mx-auto mt-6 max-w-3xl text-base leading-relaxed text-sva-body sm:text-lg">
                    Support Voice Australia exists to amplify participant voices, strengthen community connections, and make navigating the NDIS clearer and fairer. We bring people together through advocacy, education, and practical support so every person can pursue their goals with confidence.
                </p>
            </div>
        </div>
    </section>

    @php
        $servicesUrl = \Illuminate\Support\Facades\Route::has('services')
            ? route('services')
            : url('/services');
    @endphp

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
        class="relative scroll-mt-24 bg-[#f7f5ff] pt-12 pb-9 md:pt-14 md:pb-11"
        x-data="{
            slides: @js($serviceSlides),
            current: 0,
            timer: null,
            touchStartX: 0,
            init() { this.startAuto(); },
            startAuto() {
                this.stopAuto();
                this.timer = setInterval(() => this.next(), 5000);
            },
            stopAuto() {
                if (this.timer) clearInterval(this.timer);
                this.timer = null;
            },
            next() { this.current = (this.current + 1) % this.slides.length; },
            prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length; },
            isPrev(i) { return i === (this.current - 1 + this.slides.length) % this.slides.length; },
            isNext(i) { return i === (this.current + 1) % this.slides.length; },
            onTouchStart(e) {
                this.touchStartX = e.changedTouches[0]?.clientX ?? 0;
                this.stopAuto();
            },
            onTouchEnd(e) {
                const endX = e.changedTouches[0]?.clientX ?? this.touchStartX;
                const delta = endX - this.touchStartX;
                if (Math.abs(delta) > 40) {
                    delta > 0 ? this.prev() : this.next();
                }
                this.startAuto();
            },
        }"
        x-on:mouseenter="stopAuto()"
        x-on:mouseleave="startAuto()"
    >
        <div class="container relative z-10 mx-auto px-4 pt-1 md:pt-2">
            <h2 class="mb-0 text-center text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl">
                Our Services
            </h2>

            <div
                class="relative mx-auto mt-5 w-full max-w-6xl overflow-hidden py-2 sm:mt-6"
                x-on:touchstart.passive="onTouchStart($event)"
                x-on:touchend.passive="onTouchEnd($event)"
            >
                    <button
                        type="button"
                        class="absolute left-2 top-1/2 z-40 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-violet-200/80 bg-white/85 text-sva-ink shadow-md transition hover:bg-white md:flex"
                        x-on:click="prev(); startAuto()"
                        aria-label="Previous service"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>

                    <div class="relative mx-auto h-[22rem] sm:h-[20rem] md:h-[24rem]">
                        <template x-for="(slide, index) in slides" :key="slide.title">
                            <article
                                class="absolute left-1/2 top-1/2 w-[88%] max-w-3xl -translate-x-1/2 -translate-y-1/2 rounded-2xl rounded-br-[3.25rem] border border-violet-200/55 bg-[#7b5ea7] p-7 text-white shadow-[0_18px_45px_rgba(91,46,135,0.32)] transition-all duration-500 ease-out sm:p-8 md:w-[74%] md:p-10"
                                x-bind:class="{
                                    'z-30 scale-100 opacity-100': index === current,
                                    'z-20 hidden -translate-x-[112%] scale-[0.92] opacity-35 md:block': isPrev(index),
                                    'z-20 hidden translate-x-[12%] scale-[0.92] opacity-35 md:block': isNext(index),
                                    'z-0 pointer-events-none scale-90 opacity-0': index !== current && !isPrev(index) && !isNext(index),
                                }"
                            >
                                <h3 class="text-center text-xl font-bold leading-snug sm:text-2xl md:text-[1.65rem]" x-text="slide.title"></h3>
                                <p class="mt-4 text-sm leading-relaxed text-white/92 sm:text-base" x-text="slide.description"></p>
                            </article>
                        </template>
                    </div>

                    <button
                        type="button"
                        class="absolute right-2 top-1/2 z-40 hidden h-10 w-10 -translate-y-1/2 items-center justify-center rounded-full border border-violet-200/80 bg-white/85 text-sva-ink shadow-md transition hover:bg-white md:flex"
                        x-on:click="next(); startAuto()"
                        aria-label="Next service"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M9 18l6-6-6-6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>

                <div class="mt-6 flex items-center justify-center gap-2">
                    <template x-for="(slide, i) in slides" :key="`dot-${i}`">
                        <button
                            type="button"
                            class="h-2.5 w-2.5 rounded-full transition"
                            x-bind:class="i === current ? 'bg-sva-accent w-6' : 'bg-violet-300/80 hover:bg-violet-400'"
                            x-on:click="current = i; startAuto()"
                            :aria-label="`Go to service ${i + 1}`"
                        ></button>
                    </template>
                </div>
            </div>
    </section>

    <section id="faq" class="relative scroll-mt-24 bg-[#eee5ff] py-16 md:py-24">
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
