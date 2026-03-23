@php
    $home = route('home');
    $navTelHref = 'tel:+611300000000';
    $navMailHref = 'mailto:hello@supportvoiceaustralia.org.au';
    $navLinks = [
        ['label' => 'Home', 'href' => $home],
        ['label' => 'About us', 'href' => route('about')],
        ['label' => 'Services', 'href' => $home . '#services'],
        [
            'label' => 'Q&A',
            'dropdown' => true,
            'children' => [
                ['label' => 'FAQs', 'href' => route('faq')],
                ['label' => 'You Asked', 'href' => route('you.asked')],
            ],
        ],
        ['label' => 'Business Directory', 'href' => '#'],
        ['label' => 'Events', 'href' => '#'],
        ['label' => 'Blog', 'href' => '#'],
        ['label' => 'Latest News', 'href' => '#'],
        ['label' => 'Webinar', 'href' => '#'],
    ];
    $mobileNavLinks = [
        ['label' => 'Home', 'href' => $home],
        ['label' => 'About us', 'href' => route('about')],
        ['label' => 'Services', 'href' => $home . '#services'],
        [
            'label' => 'Q&A',
            'dropdown' => true,
            'children' => [
                ['label' => 'FAQs', 'href' => $home . '#faq'],
                ['label' => 'You Asked', 'href' => route('you.asked')],
            ],
        ],
        ['label' => 'Business Directory', 'href' => '#'],
        ['label' => 'Events', 'href' => '#'],
        ['label' => 'Blog', 'href' => '#'],
        ['label' => 'Latest News', 'href' => '#'],
        ['label' => 'Webinar', 'href' => '#'],
    ];
@endphp

<header
    class="fixed inset-x-0 top-0 z-40"
    data-nav-root
    x-data="supportVoiceNav"
    x-on:scroll.window.passive="onScroll()"
    x-on:keydown.escape.window="closeMenu(); closeQaDropdown()"
    x-on:resize.window="if (window.innerWidth >= 1024) { closeMenu(); } if (window.innerWidth < 1024) { closeQaDropdown(); }"
>
    {{-- Transform only this wrapper so fixed mobile overlay stays viewport-relative --}}
    <div
        class="border-b border-violet-200/60 bg-white/90 transition-[transform,box-shadow,backdrop-filter] duration-300 ease-[cubic-bezier(0.4,0,0.2,1)] will-change-transform"
        x-bind:class="{
            'translate-y-0': reduceMotion || navVisible,
            '-translate-y-full pointer-events-none': !(reduceMotion || navVisible),
            'shadow-sm backdrop-blur-md': navVisible && (atTop || reduceMotion),
            'shadow-lg shadow-violet-300/25 ring-1 ring-black/[0.06] backdrop-blur-lg': navVisible && !atTop && !reduceMotion,
        }"
        x-bind:inert="!navVisible"
        x-bind:aria-hidden="navVisible ? false : true"
    >
        <div class="container mx-auto px-4">
            <div class="flex min-h-[5.5rem] items-center justify-between gap-3 py-2 md:min-h-28 md:py-3 lg:min-h-[7.5rem]">
            <a
                href="{{ url('/') }}"
                class="group flex shrink-0 items-center rounded-lg py-1 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                aria-label="Support Voice Australia — Home"
            >
                <img
                    src="{{ asset('img/newlogo.svg') }}"
                    alt="Support Voice Australia"
                    class="h-16 w-auto max-h-24 shrink-0 object-contain sm:h-20 sm:max-h-28 md:h-24 md:max-h-32 lg:h-28 lg:max-h-36"
                    decoding="async"
                    fetchpriority="high"
                >
            </a>

            <nav class="hidden items-center gap-0.5 lg:flex lg:flex-1 lg:justify-center" aria-label="Primary">
                @foreach ($navLinks as $link)
                    @if (! empty($link['dropdown']))
                        @php
                            $qaNavActive = request()->routeIs('faq') || request()->routeIs('you.asked');
                        @endphp
                        <div class="relative" x-on:click.outside="closeQaDropdown()">
                            <button
                                type="button"
                                id="nav-qa-button"
                                @class([
                                    'inline-flex items-center gap-0.5 rounded-lg px-2 py-2 text-xs font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 xl:px-2.5 xl:text-sm',
                                    'font-semibold text-sva-ink' => $qaNavActive,
                                    'text-sva-body hover:bg-violet-50 hover:text-sva-accent' => ! $qaNavActive,
                                ])
                                x-bind:aria-expanded="qaDropdownOpen ? 'true' : 'false'"
                                aria-haspopup="true"
                                aria-controls="nav-qa-menu"
                                x-on:click="toggleQaDropdown()"
                            >
                                {{ $link['label'] }}
                                <svg class="h-4 w-4 shrink-0 text-current transition-transform duration-200" x-bind:class="qaDropdownOpen ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                            <div
                                id="nav-qa-menu"
                                role="menu"
                                aria-labelledby="nav-qa-button"
                                x-show="qaDropdownOpen"
                                x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 translate-y-1"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-100"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 translate-y-1"
                                x-cloak
                                class="absolute left-0 top-full z-[60] mt-1 min-w-[12rem] rounded-xl border border-violet-200/80 bg-white py-1 shadow-lg shadow-violet-200/40 ring-1 ring-black/5"
                            >
                                @foreach ($link['children'] as $child)
                                    @php
                                        $childActive =
                                            ($child['label'] === 'FAQs' && request()->routeIs('faq')) ||
                                            ($child['label'] === 'You Asked' && request()->routeIs('you.asked'));
                                    @endphp
                                    <a
                                        href="{{ $child['href'] }}"
                                        role="menuitem"
                                        @class([
                                            'block px-4 py-2.5 text-sm font-medium transition focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600',
                                            'bg-violet-50 font-semibold text-sva-accent' => $childActive,
                                            'text-sva-body hover:bg-violet-50 hover:text-sva-accent' => ! $childActive,
                                        ])
                                        x-on:click="closeQaDropdown()"
                                    >
                                        {{ $child['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ $link['href'] }}"
                            @php
                                $navActive =
                                    ($link['label'] === 'Home' && request()->routeIs('home')) ||
                                    ($link['label'] === 'About us' && request()->routeIs('about'));
                            @endphp
                            @class([
                                'rounded-lg px-2 py-2 text-xs font-medium transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 xl:px-2.5 xl:text-sm',
                                'font-semibold text-sva-ink' => $navActive,
                                'text-sva-body hover:text-sva-accent hover:bg-violet-50' => ! $navActive,
                            ])
                        >
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>

            <div class="flex shrink-0 items-center gap-2">
                <div class="flex items-center gap-1 sm:gap-1.5">
                    <a
                        href="{{ $navTelHref }}"
                        class="inline-flex min-h-11 min-w-11 shrink-0 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 hover:text-sva-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        aria-label="Call us"
                    >
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </a>
                    <a
                        href="{{ $navMailHref }}"
                        class="inline-flex min-h-11 min-w-11 shrink-0 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 hover:text-sva-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        aria-label="Email us"
                    >
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-lg bg-sva-accent px-3 text-sm font-semibold text-white shadow-md transition hover:bg-sva-accent-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 sm:px-4"
                    >
                        Contact us
                    </a>
                </div>

                <button
                    type="button"
                    class="relative z-[60] inline-flex min-h-11 min-w-11 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 lg:hidden"
                    aria-controls="mobile-navigation"
                    x-bind:aria-expanded="menuOpen ? 'true' : 'false'"
                    x-on:click.stop="toggleMenu()"
                >
                    <span class="sr-only">Toggle menu</span>
                    <svg class="h-6 w-6" x-show="! menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                    </svg>
                    <svg class="h-6 w-6" x-show="menuOpen" x-cloak viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
        </div>
    </div>

    <template x-teleport="body">
        <div
            id="mobile-navigation"
            class="fixed inset-0 z-[100] flex items-stretch justify-end lg:hidden"
            data-mobile-panel
            x-show="menuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            role="dialog"
            aria-modal="true"
            aria-label="Mobile navigation"
        >
            <button
                type="button"
                class="absolute inset-0 bg-sva-ink/40 backdrop-blur-[2px]"
                data-mobile-overlay
                tabindex="-1"
                aria-label="Close menu"
                x-on:click="closeMenu()"
            ></button>
            <div
                class="relative z-10 flex h-full w-[min(100%,22rem)] max-w-full flex-col bg-white shadow-2xl"
                x-transition:enter="transform transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                x-on:click.stop
            >
                <div class="flex items-center justify-between border-b border-violet-100 px-4 py-4">
                    <span class="text-sm font-semibold text-sva-ink">Menu</span>
                    <button
                        type="button"
                        class="inline-flex min-h-11 min-w-11 items-center justify-center rounded-lg border border-violet-200 text-sva-ink hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        x-on:click="closeMenu()"
                    >
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
                <nav class="flex flex-1 flex-col gap-1 overflow-y-auto px-3 py-4" aria-label="Mobile primary">
                    @foreach ($mobileNavLinks as $link)
                        @if (! empty($link['dropdown']))
                            <div class="flex flex-col rounded-xl">
                                <button
                                    type="button"
                                    class="flex min-h-12 w-full items-center justify-between rounded-xl px-4 py-3 text-left text-base font-medium text-sva-ink transition hover:bg-violet-50 active:bg-violet-100"
                                    x-bind:aria-expanded="qaMobileOpen ? 'true' : 'false'"
                                    x-on:click="qaMobileOpen = ! qaMobileOpen"
                                >
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="h-5 w-5 shrink-0 text-sva-body transition-transform duration-200" x-bind:class="qaMobileOpen ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                        <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </button>
                                <div
                                    x-show="qaMobileOpen"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1"
                                    class="flex flex-col gap-0.5 border-l-2 border-violet-200/80 py-1 pl-3 ml-4"
                                >
                                    @foreach ($link['children'] as $child)
                                        <a
                                            href="{{ $child['href'] }}"
                                            class="flex min-h-11 items-center rounded-lg px-3 py-2.5 text-sm font-medium text-sva-body transition hover:bg-violet-50 hover:text-sva-accent"
                                            data-mobile-nav-link
                                            x-on:click="closeMenu()"
                                        >
                                            {{ $child['label'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a
                                href="{{ $link['href'] }}"
                                class="flex min-h-12 items-center rounded-xl px-4 py-3 text-base font-medium text-sva-ink transition hover:bg-violet-50 active:bg-violet-100"
                                data-mobile-nav-link
                                x-on:click="closeMenu()"
                            >
                                {{ $link['label'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>
            </div>
        </div>
    </template>
</header>
