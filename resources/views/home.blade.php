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

    <section class="relative isolate overflow-hidden">
        <img
            src="{{ asset('img/heroimg.jpeg') }}"
            alt="Support worker assisting a child"
            class="h-[62vh] min-h-[420px] w-full object-cover object-center md:h-[72vh] md:min-h-[520px]"
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
                            href="{{ route('about') }}"
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

        @php
            $servicesUrl = \Illuminate\Support\Facades\Route::has('services')
                ? route('services')
                : url('/services');
        @endphp

        <section
            id="services"
            class="relative isolate scroll-mt-24 overflow-hidden bg-[#D4D2F7] py-14 md:py-20"
            data-services-magnifier
        >
            <div class="pointer-events-none absolute inset-0 z-0 overflow-hidden" aria-hidden="true">
                {{-- Mobile / coarse pointer: subtle static wash (no JS tracking) --}}
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_90%_60%_at_50%_32%,rgba(255,255,255,0.2)_0%,rgba(233,213,255,0.07)_45%,transparent_70%)]"></div>
            </div>

            {{-- Desktop: circular magnifier (cloned #services-source scaled inside; see initServicesMagnifier in app.js) --}}
            <a
                id="services-lens"
                href="{{ $servicesUrl }}"
                class="absolute left-0 top-0 z-20 flex h-[220px] w-[220px] items-center justify-center overflow-hidden rounded-full border border-white/25 bg-transparent opacity-0 shadow-[0_0_0_1px_rgba(255,255,255,0.12),0_0_36px_rgba(124,58,237,0.22),0_12px_40px_rgba(91,33,182,0.12)] ring-1 ring-violet-200/30 transition-opacity duration-300 ease-out will-change-[transform,opacity] motion-reduce:hidden"
                aria-label="Explore more services"
            >
                <div id="services-lens-inner" class="pointer-events-none absolute left-0 top-0 origin-top-left will-change-[left,top]"></div>
                <span class="relative z-20 text-center text-sm font-semibold uppercase tracking-[0.14em] text-violet-950/90 drop-shadow-[0_1px_1px_rgba(255,255,255,0.65)]">
                    Explore More
                </span>
            </a>

            <div id="services-source" class="container relative z-10 mx-auto px-4">
                <h2 class="text-center text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl">
                    Our Services
                </h2>
                <p class="mx-auto mt-4 max-w-2xl text-center text-base leading-relaxed text-sva-body">
                    Practical support designed for real life on mobile — clear, approachable, and easy to explore.
                </p>
                <ul class="mx-auto mt-10 grid max-w-5xl grid-cols-1 gap-4 sm:gap-5 md:grid-cols-2 md:gap-6">
                    @foreach ($services as $service)
                        <li>
                            <article class="flex min-h-[5.5rem] items-center gap-4 rounded-2xl border border-violet-100 bg-gradient-to-br from-white to-violet-50/80 p-4 shadow-md shadow-violet-100/60 transition hover:border-violet-200 hover:shadow-lg sm:gap-5 sm:p-5">
                                <div class="flex h-14 w-14 shrink-0 items-center justify-center rounded-full bg-sva-accent text-white shadow-md ring-4 ring-violet-100 sm:h-16 sm:w-16" aria-hidden="true">
                                    @switch($service['icon'])
                                        @case('users')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" stroke-linecap="round"/>
                                                <circle cx="9" cy="7" r="3"/>
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" stroke-linecap="round"/>
                                            </svg>
                                            @break
                                        @case('network')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <circle cx="5" cy="6" r="2.2"/>
                                                <circle cx="19" cy="6" r="2.2"/>
                                                <circle cx="12" cy="18" r="2.2"/>
                                                <path d="M6.8 7.6L10 16M17.2 7.6L14 16M7.5 6h9" stroke-linecap="round"/>
                                            </svg>
                                            @break
                                        @case('megaphone')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <path d="M3 11v4h4l5 3V8l-5 3H3Z" stroke-linejoin="round"/>
                                                <path d="M16 9a4 4 0 0 1 0 6" stroke-linecap="round"/>
                                            </svg>
                                            @break
                                        @case('education')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <path d="M4 19.5V6l8-3 8 3v13.5" stroke-linejoin="round"/>
                                                <path d="M12 3v18" stroke-linecap="round"/>
                                                <path d="M8 11h2M8 15h4" stroke-linecap="round"/>
                                            </svg>
                                            @break
                                        @case('hub')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <path d="M4 6h7v6H4V6Z" stroke-linejoin="round"/>
                                                <path d="M13 6h7v4h-7V6Z" stroke-linejoin="round"/>
                                                <path d="M13 12h7v6h-7v-6Z" stroke-linejoin="round"/>
                                                <path d="M4 14h7v4H4v-4Z" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @case('provider')
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <path d="M12 3l7 4v6c0 5-3 9-7 10-4-1-7-5-7-10V7l7-4Z" stroke-linejoin="round"/>
                                                <path d="M9 12l2 2 4-4" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            @break
                                        @default
                                            <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true">
                                                <circle cx="8" cy="9" r="2.2"/>
                                                <circle cx="16" cy="9" r="2.2"/>
                                                <path d="M4 20c1.2-3 3.8-5 8-5s6.8 2 8 5" stroke-linecap="round"/>
                                            </svg>
                                    @endswitch
                                </div>
                                <h3 class="text-base font-semibold leading-snug text-sva-ink sm:text-lg">
                                    {{ $service['title'] }}
                                </h3>
                            </article>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section id="faq" class="relative scroll-mt-24 overflow-hidden bg-neutral-950 bg-[url('/img/qu01.png')] bg-cover bg-center bg-no-repeat py-16 md:py-24">
            <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-black/20 via-transparent to-black/30" aria-hidden="true"></div>
            <div class="container relative z-10 mx-auto px-4">
                <h2 class="text-center text-3xl font-bold tracking-tight text-[#9784B0] sm:text-4xl md:text-[2.5rem] md:leading-tight">
                    Frequently Asked Questions
                </h2>

                <div class="mx-auto mt-12 max-w-5xl space-y-8 sm:mt-14 sm:space-y-10 md:mt-16 md:space-y-12">
                    <div class="grid grid-cols-1 gap-7 sm:grid-cols-2 sm:gap-8 md:gap-10 lg:gap-12">
                        <a
                            href="#"
                            class="group relative flex min-h-[6.5rem] items-center justify-center rounded-[1.75rem] bg-gradient-to-br from-white via-violet-50/95 to-sva-lavender/85 px-7 py-8 text-center text-base font-semibold leading-snug text-sva-ink shadow-[0_4px_24px_rgba(109,40,217,0.1),0_20px_44px_-8px_rgba(76,29,149,0.2),14px_26px_52px_-12px_rgba(88,28,135,0.18),inset_0_1px_0_rgba(255,255,255,0.9)] ring-1 ring-violet-100/80 transition duration-300 ease-out hover:-translate-y-2 hover:shadow-[0_8px_32px_rgba(109,40,217,0.14),0_28px_56px_-10px_rgba(76,29,149,0.26),18px_32px_64px_-14px_rgba(88,28,135,0.22),inset_0_1px_0_rgba(255,255,255,0.95)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-violet-600 sm:min-h-32 sm:rounded-[2rem] sm:px-8 sm:py-10 sm:text-lg md:translate-y-1"
                        >
                            How to get the best out of your NDIS Plan
                        </a>
                        <a
                            href="#"
                            class="group relative flex min-h-[6.5rem] items-center justify-center rounded-[1.75rem] bg-gradient-to-br from-white via-violet-50/95 to-sva-lavender/85 px-7 py-8 text-center text-base font-semibold leading-snug text-sva-ink shadow-[0_4px_24px_rgba(109,40,217,0.1),0_20px_44px_-8px_rgba(76,29,149,0.2),14px_26px_52px_-12px_rgba(88,28,135,0.18),inset_0_1px_0_rgba(255,255,255,0.9)] ring-1 ring-violet-100/80 transition duration-300 ease-out hover:-translate-y-2 hover:shadow-[0_8px_32px_rgba(109,40,217,0.14),0_28px_56px_-10px_rgba(76,29,149,0.26),18px_32px_64px_-14px_rgba(88,28,135,0.22),inset_0_1px_0_rgba(255,255,255,0.95)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-violet-600 sm:min-h-32 sm:rounded-[2rem] sm:px-8 sm:py-10 sm:text-lg md:-translate-y-0.5"
                        >
                            NDIS Issues
                        </a>
                    </div>

                    <div class="flex justify-center px-1 sm:px-4">
                        <a
                            href="#"
                            class="group relative flex w-full max-w-md min-h-[6.5rem] items-center justify-center rounded-[1.75rem] bg-gradient-to-br from-white via-violet-50/95 to-sva-lavender/85 px-7 py-8 text-center text-base font-semibold leading-snug text-sva-ink shadow-[0_4px_24px_rgba(109,40,217,0.1),0_24px_48px_-8px_rgba(76,29,149,0.22),16px_30px_58px_-12px_rgba(88,28,135,0.2),inset_0_1px_0_rgba(255,255,255,0.9)] ring-1 ring-violet-100/80 transition duration-300 ease-out hover:-translate-y-2 hover:shadow-[0_8px_32px_rgba(109,40,217,0.14),0_32px_60px_-10px_rgba(76,29,149,0.28),20px_36px_70px_-14px_rgba(88,28,135,0.24),inset_0_1px_0_rgba(255,255,255,0.95)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-violet-600 sm:max-w-lg sm:min-h-32 sm:rounded-[2rem] sm:px-10 sm:py-10 sm:text-lg md:max-w-xl"
                        >
                            Commonly Asked Questions
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
