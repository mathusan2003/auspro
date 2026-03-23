<footer class="relative mt-0 overflow-hidden bg-sva-footer bg-[url('/img/footer%20bg.png')] bg-cover bg-center bg-no-repeat text-white">
    <div class="pointer-events-none absolute inset-0 bg-gradient-to-b from-sva-footer/80 via-sva-footer/40 to-transparent" aria-hidden="true"></div>

    <div class="relative z-10">
        <div class="container mx-auto px-4 py-12 md:py-14">
            <div class="flex flex-col items-center gap-10 text-center md:flex-row md:items-start md:justify-between md:text-left">
                <div class="max-w-sm md:max-w-xs">
                    <a
                        href="{{ url('/') }}"
                        class="inline-flex items-center rounded-lg focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                        aria-label="Support Voice Australia — Home"
                    >
                        <img
                            src="{{ asset('img/footlogo.svg') }}"
                            alt="Support Voice Australia"
                            class="h-24 w-auto max-h-32 object-contain sm:h-28 md:h-32 lg:h-36 lg:max-h-40"
                            loading="lazy"
                            decoding="async"
                        >
                    </a>
                </div>

                <div id="contact" class="w-full max-w-md scroll-mt-24 md:max-w-sm">
                    <h2 class="text-lg font-semibold text-white">Address</h2>
                    <p class="mt-3 text-base leading-relaxed text-white/80">
                        <span class="block">Your organisation address line 1</span>
                        <span class="block">Suburb, State Postcode</span>
                        <span class="block">Australia</span>
                    </p>
                </div>

                <div class="w-full max-w-sm">
                    <p class="text-base leading-relaxed text-white/90">
                        Get in touch with us with your inquiries.
                    </p>
                    <a
                        href="{{ route('contact') }}"
                        class="mt-5 inline-flex min-h-12 w-full items-center justify-center rounded-xl bg-white px-6 text-base font-semibold text-sva-accent shadow-lg transition hover:bg-violet-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white md:w-auto"
                    >
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="container mx-auto flex flex-col gap-4 px-4 py-6 text-sm text-white/75 md:flex-row md:items-center md:justify-between">
                <div class="flex flex-wrap items-center justify-center gap-x-6 gap-y-2 md:justify-start">
                    <a href="#" class="rounded-md underline-offset-4 hover:text-white hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Privacy Policy</a>
                    <a href="#" class="rounded-md underline-offset-4 hover:text-white hover:underline focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">Terms and Conditions</a>
                </div>
                <p class="text-center text-xs leading-relaxed text-white/60 md:text-right md:text-sm">
                    Copyright © {{ date('Y') }} Support Voice Australia. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>
