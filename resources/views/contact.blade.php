@extends('layouts.support-voice')

@section('title', 'Contact us')

@section('content')
    <div class="min-h-[60vh] bg-gradient-to-b from-sva-lavender via-white to-violet-50/40">
        <section class="relative overflow-hidden py-12 md:py-16 lg:py-20">
            <div class="pointer-events-none absolute inset-0 opacity-50" aria-hidden="true">
                <div class="absolute -left-16 top-20 h-56 w-56 rounded-full bg-violet-200/60 blur-3xl"></div>
                <div class="absolute bottom-0 right-0 h-64 w-64 rounded-full bg-violet-300/40 blur-3xl"></div>
            </div>

            <div class="container relative mx-auto px-4">
                <div class="mx-auto max-w-3xl text-center md:max-w-2xl">
                    <h1 class="text-3xl font-bold tracking-tight text-sva-ink sm:text-4xl md:text-5xl">
                        Contact us
                    </h1>
                    <p class="mt-4 text-base leading-relaxed text-sva-body sm:text-lg">
                        Have a question about advocacy, NDIS support, or how we can help? Send us a message and our team will respond as soon as we can.
                    </p>
                </div>

                <div class="mx-auto mt-12 grid max-w-5xl gap-10 lg:mt-16 lg:grid-cols-12 lg:gap-12">
                    <div class="lg:col-span-7">
                        @if (session('success'))
                            <div
                                class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-left text-sm text-emerald-900 sm:px-5"
                                role="status"
                            >
                                {{ session('success') }}
                            </div>
                        @endif

                        <form
                            method="post"
                            action="{{ route('contact.submit') }}"
                            class="rounded-2xl border border-violet-100 bg-white/90 p-6 shadow-lg shadow-violet-100/50 backdrop-blur-sm sm:p-8"
                            novalidate
                        >
                            @csrf

                            <div class="space-y-5">
                                <div>
                                    <label for="contact-name" class="block text-sm font-semibold text-sva-ink">Name</label>
                                    <input
                                        type="text"
                                        name="name"
                                        id="contact-name"
                                        value="{{ old('name') }}"
                                        required
                                        autocomplete="name"
                                        class="mt-2 min-h-12 w-full rounded-xl border border-violet-200 bg-white px-4 py-3 text-base text-sva-ink shadow-sm transition placeholder:text-violet-300 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/30"
                                        placeholder="Your full name"
                                    >
                                    @error('name')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="contact-email" class="block text-sm font-semibold text-sva-ink">Email</label>
                                    <input
                                        type="email"
                                        name="email"
                                        id="contact-email"
                                        value="{{ old('email') }}"
                                        required
                                        autocomplete="email"
                                        class="mt-2 min-h-12 w-full rounded-xl border border-violet-200 bg-white px-4 py-3 text-base text-sva-ink shadow-sm transition placeholder:text-violet-300 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/30"
                                        placeholder="you@example.com"
                                    >
                                    @error('email')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="contact-subject" class="block text-sm font-semibold text-sva-ink">Subject <span class="font-normal text-sva-body">(optional)</span></label>
                                    <select
                                        name="subject"
                                        id="contact-subject"
                                        class="mt-2 min-h-12 w-full rounded-xl border border-violet-200 bg-white px-4 py-3 text-base text-sva-ink shadow-sm transition placeholder:text-violet-300 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/30"
                                    >
                                        <option value="">Select a subject (optional)</option>
                                        <option value="Subject 1" @selected(old('subject') === 'Subject 1')>Subject 1</option>
                                        <option value="Subject 2" @selected(old('subject') === 'Subject 2')>Subject 2</option>
                                        <option value="Subject 3" @selected(old('subject') === 'Subject 3')>Subject 3</option>
                                        <option value="Subject 4" @selected(old('subject') === 'Subject 4')>Subject 4</option>
                                        <option value="Others" @selected(old('subject') === 'Others')>Others</option>
                                    </select>
                                    @error('subject')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="contact-message" class="block text-sm font-semibold text-sva-ink">Message</label>
                                    <textarea
                                        name="message"
                                        id="contact-message"
                                        rows="5"
                                        required
                                        class="mt-2 w-full resize-y rounded-xl border border-violet-200 bg-white px-4 py-3 text-base leading-relaxed text-sva-ink shadow-sm transition placeholder:text-violet-300 focus:border-violet-400 focus:outline-none focus:ring-2 focus:ring-violet-400/30"
                                        placeholder="Tell us how we can help…"
                                    >{{ old('message') }}</textarea>
                                    @error('message')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="mt-8 flex min-h-12 w-full items-center justify-center rounded-xl bg-indigo-950 px-6 text-base font-semibold text-white shadow-md transition hover:bg-indigo-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-violet-600 sm:w-auto sm:px-10"
                            >
                                Send message
                            </button>
                        </form>
                    </div>

                    <aside class="lg:col-span-5">
                        <div class="space-y-8 rounded-2xl border border-violet-100 bg-white/70 p-6 shadow-md shadow-violet-100/40 backdrop-blur-sm sm:p-8 lg:sticky lg:top-28">
                            
                            <div>
                                <h2 class="text-lg font-semibold text-sva-ink">Email</h2>
                                <a
                                    href="mailto:hello@supportvoiceaustralia.org.au"
                                    class="mt-2 inline-flex min-h-11 items-center text-base font-medium text-sva-accent underline decoration-violet-300 underline-offset-4 transition hover:text-sva-accent-hover"
                                >
                                    hello@supportvoiceaustralia.org.au
                                </a>
                            </div>
                            <div>
                                <h2 class="text-lg font-semibold text-sva-ink">Phone</h2>
                                <p class="mt-2 text-base text-sva-body">
                                    <a href="tel:+611300000000" class="font-medium text-sva-accent hover:text-sva-accent-hover">1300 000 000</a>
                                    <span class="mt-1 block text-sm text-sva-body/90">Replace with your organisation number.</span>
                                </p>
                            </div>
                            <p class="text-sm leading-relaxed text-sva-body">
                                For urgent NDIS safety concerns, contact the NDIS Commission or emergency services as appropriate.
                            </p>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </div>
@endsection
