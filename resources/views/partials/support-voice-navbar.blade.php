@php
    $home = route('home');
    $navTelHref = 'tel:+611300000000';
    $navMailHref = 'mailto:hello@supportvoiceaustralia.org.au';
    $navWhatsAppHref = 'https://wa.me/611300000000';
    $servicesPageUrl = \Illuminate\Support\Facades\Route::has('services')
        ? route('services')
        : url('/services');
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
                    src="{{ asset('img/navilogo.png') }}"
                    alt="Support Voice Australia"
                    class="h-20 w-auto max-h-28 shrink-0 object-contain sm:h-24 sm:max-h-32 md:h-28 md:max-h-36 lg:h-32 lg:max-h-40"
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
                <div class="hidden items-center gap-1 sm:gap-1.5 lg:flex">
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
                        href="{{ $navWhatsAppHref }}"
                        target="_blank"
                        rel="noopener noreferrer"
                    class="hidden min-h-11 min-w-11 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 lg:inline-flex"
                        aria-label="WhatsApp"
                        title="WhatsApp"
                    >
                        <svg class="h-6 w-6 text-current" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M20 11.5a8 8 0 0 1-11.9 6.9L4 20l1.7-3.6A8 8 0 1 1 20 11.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.4 9.1c.3-.7.6-.7 1-.7h.7c.2 0 .4.1.5.4l.7 1.6c.1.2.1.4 0 .6l-.3.5c-.1.2-.2.3-.1.5.2.6.8 1.3 1.4 1.6.2.1.4.1.6 0l.6-.3c.2-.1.4-.1.6 0l1.4.7c.2.1.3.3.3.5v.7c0 .4-.1.7-.6 1-1 .6-2.3.2-3.5-.4-1.3-.7-2.5-1.9-3.2-3.2-.6-1.2-1-2.5-.4-3.5Z" fill="currentColor"/>
                        </svg>
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex min-h-11 shrink-0 items-center justify-center rounded-lg bg-sva-accent px-3 text-sm font-semibold text-white shadow-md transition hover:bg-sva-accent-hover focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-700 sm:px-4"
                    >
                        Contact us
                    </a>

                    <a
                        href="{{ $servicesPageUrl }}"
                        class="hidden min-h-11 items-center justify-center rounded-lg bg-white px-3 text-sm font-semibold text-sva-ink shadow-md ring-1 ring-violet-200/60 transition hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 lg:inline-flex"
                        aria-label="Request services"
                    >
                        Request Services
                    </a>
                </div>

                <div class="flex items-center gap-1.5 lg:hidden">
                    <a
                        href="{{ $navTelHref }}"
                        class="inline-flex min-h-10 min-w-10 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 hover:text-sva-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        aria-label="Call us"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </a>
                    <a
                        href="{{ $navMailHref }}"
                        class="inline-flex min-h-10 min-w-10 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 hover:text-sva-accent focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        aria-label="Email us"
                    >
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </a>
                    <a
                        href="{{ $navWhatsAppHref }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex min-h-10 min-w-10 items-center justify-center rounded-lg border border-violet-200 bg-white text-sva-ink shadow-sm transition hover:border-violet-300 hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        aria-label="WhatsApp"
                    >
                        <svg class="h-5 w-5 text-current" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M20 11.5a8 8 0 0 1-11.9 6.9L4 20l1.7-3.6A8 8 0 1 1 20 11.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.4 9.1c.3-.7.6-.7 1-.7h.7c.2 0 .4.1.5.4l.7 1.6c.1.2.1.4 0 .6l-.3.5c-.1.2-.2.3-.1.5.2.6.8 1.3 1.4 1.6.2.1.4.1.6 0l.6-.3c.2-.1.4-.1.6 0l1.4.7c.2.1.3.3.3.5v.7c0 .4-.1.7-.6 1-1 .6-2.3.2-3.5-.4-1.3-.7-2.5-1.9-3.2-3.2-.6-1.2-1-2.5-.4-3.5Z" fill="currentColor"/>
                        </svg>
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
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/>
                    </svg>
                </button>
            </div>
        </div>
        </div>
    </div>

    <template x-teleport="body">
        <div class="contents lg:hidden" data-mobile-panel>
            <div
                class="fixed inset-0 z-[100] bg-black/50 backdrop-blur-[2px]"
                aria-hidden="true"
                x-show="menuOpen"
                x-cloak
                x-transition:enter="transition-opacity ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                x-on:click="closeMenu()"
            ></div>

            <aside
                id="mobile-navigation"
                class="fixed right-0 top-0 z-[101] flex h-full w-[min(82vw,22rem)] flex-col bg-white shadow-[-10px_0_28px_rgba(15,23,42,0.12)]"
                role="dialog"
                aria-modal="true"
                aria-label="Mobile navigation"
                x-show="menuOpen"
                x-cloak
                x-on:click.stop
                x-transition:enter="transform transition ease-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in duration-200"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
            >
                <div class="flex shrink-0 items-center justify-between border-b border-neutral-200 px-5 pb-4 pt-6 sm:px-6">
                    <span class="text-lg font-bold tracking-tight text-[#2D2D5F]">Menu</span>
                    <button
                        type="button"
                        class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-lg border border-neutral-300 bg-white text-[#2D2D5F] shadow-sm transition hover:bg-neutral-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600"
                        x-on:click="closeMenu()"
                    >
                        <span class="sr-only">Close menu</span>
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path d="M6 6l12 12M18 6L6 18" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>

                <nav class="flex flex-1 flex-col overflow-y-auto px-2 py-4 sm:px-3" aria-label="Mobile primary">
                    @foreach ($mobileNavLinks as $link)
                        @if (! empty($link['dropdown']))
                            <div class="flex flex-col">
                                <button
                                    type="button"
                                    class="flex w-full items-center justify-between gap-3 px-4 py-4 text-left text-base font-medium text-[#2D2D5F] transition hover:bg-violet-50/80 sm:text-[1.05rem]"
                                    x-bind:aria-expanded="qaMobileOpen ? 'true' : 'false'"
                                    x-on:click="qaMobileOpen = ! qaMobileOpen"
                                >
                                    <span>{{ $link['label'] }}</span>
                                    <svg class="h-5 w-5 shrink-0 text-[#2D2D5F]/80 transition-transform duration-200" x-bind:class="qaMobileOpen ? 'rotate-180' : ''" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
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
                                    class="flex flex-col border-l border-violet-200/80 pl-4 ml-4 mr-2"
                                >
                                    @foreach ($link['children'] as $child)
                                        <a
                                            href="{{ $child['href'] }}"
                                            class="px-3 py-3 text-sm font-medium text-[#2D2D5F]/90 transition hover:bg-violet-50/80 sm:text-base"
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
                                class="block px-4 py-4 text-base font-medium text-[#2D2D5F] transition hover:bg-violet-50/80 sm:text-[1.05rem]"
                                data-mobile-nav-link
                                x-on:click="closeMenu()"
                            >
                                {{ $link['label'] }}
                            </a>
                        @endif
                    @endforeach
                </nav>
            </aside>
        </div>
    </template>
</header>
