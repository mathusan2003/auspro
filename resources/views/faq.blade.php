@extends('layouts.support-voice')

@section('title', 'Frequently Asked Questions')

@section('content')
    @php
        $faqItems = [
            [
                'q' => 'What is Support Voice Australia?',
                'a' => 'We are a community-focused organisation that advocates for NDIS participants, families, and carers—helping people understand their rights, connect with peers, and navigate support with confidence.',
            ],
            [
                'q' => 'Who can use your services?',
                'a' => 'Our information and community programs are designed for NDIS participants, families, guardians, and supporters. Some activities may be tailored to specific groups—check each program page or contact us for details.',
            ],
            [
                'q' => 'Is there a cost to participate?',
                'a' => 'Many of our community sessions and general information resources are free or low cost. Where a fee applies, it will always be clearly advertised before you register.',
            ],
            [
                'q' => 'How is this different from the NDIS?',
                'a' => 'The NDIS is the national insurance scheme. We are an independent community organisation—we do not make NDIS decisions, but we can help you understand processes and connect with trustworthy information.',
            ],
            [
                'q' => 'Can you help me with my NDIS plan?',
                'a' => 'We can help you understand planning conversations, prepare questions, and explore options. For formal plan management or plan reviews, you may also work with your planner, LAC, or a registered provider.',
            ],
            [
                'q' => 'Do you provide one-on-one advocacy?',
                'a' => 'Support varies by location and capacity. Contact us with a short summary of your situation and we will let you know what is available or refer you to a suitable service.',
            ],
            [
                'q' => 'How do I join a workshop or forum?',
                'a' => 'Browse upcoming events on our site (when published) or contact us to register your interest. We will send details when new sessions are scheduled.',
            ],
            [
                'q' => 'Is my information kept private?',
                'a' => 'We take privacy seriously. Personal information is collected only where needed, handled in line with applicable privacy laws, and not sold to third parties. See our Privacy Policy for full details.',
            ],
            [
                'q' => 'Can you help with a complaint about a provider?',
                'a' => 'We can explain common complaint pathways and documentation tips. Serious or urgent safety concerns should be raised with the NDIS Quality and Safeguards Commission or emergency services as appropriate.',
            ],
            [
                'q' => 'Do you endorse specific providers?',
                'a' => 'We share educational information and connection opportunities. Listing or mentioning a provider is not a guarantee of quality—you should always do your own checks and choose what fits your goals.',
            ],
            [
                'q' => 'How do I stay updated on news and webinars?',
                'a' => 'Follow our Latest News and Webinar sections, subscribe where offered, or contact us to join our mailing list for announcements.',
            ],
            [
                'q' => 'What should I bring to a first meeting or session?',
                'a' => 'Bring any relevant letters or plan summaries you are comfortable sharing, a list of questions, and contact details. If you need accessibility adjustments, tell us in advance so we can prepare.',
            ],
            [
                'q' => 'Can family members attend with me?',
                'a' => 'Yes, in many cases supporters are welcome. Let us know who will attend so we can plan seating, materials, and any accessibility needs.',
            ],
            [
                'q' => 'What languages are available?',
                'a' => 'Sessions are primarily delivered in English. If you need an interpreter, contact us early and we will advise what arrangements may be possible.',
            ],
            [
                'q' => 'How long does a typical workshop run?',
                'a' => 'Most workshops run between 60 and 120 minutes including questions. Exact times are listed on each event description.',
            ],
            [
                'q' => 'Do you offer online sessions?',
                'a' => 'When advertised, yes—some events are hybrid or online-only. Connection details are shared after registration.',
            ],
            [
                'q' => 'What if I need to cancel my registration?',
                'a' => 'Please contact us as soon as possible so we can offer your place to someone else. Cancellation terms may vary for paid events.',
            ],
            [
                'q' => 'How can I volunteer or partner with you?',
                'a' => 'We welcome conversations with community members and organisations that align with our values. Email us a brief introduction and the type of collaboration you have in mind.',
            ],
            [
                'q' => 'Where are you located?',
                'a' => 'Our contact details and address appear in the site footer and on the Contact page. We may also host events in partner venues across regions.',
            ],
            [
                'q' => 'What accessibility supports are available?',
                'a' => 'We aim to meet common accessibility needs including venue access, materials in alternative formats where feasible, and flexible seating. Share your requirements when you register.',
            ],
            [
                'q' => 'Can you help with housing or SIL questions?',
                'a' => 'We can provide general information and prompts for discussions with specialists. Housing and supported independent living are complex—your planner and qualified providers can advise on individual eligibility and options.',
            ],
            [
                'q' => 'How do I request a speaker for my organisation?',
                'a' => 'Use the Contact page with the date, audience, topics, and format you need. We will respond with availability and any requirements.',
            ],
            [
                'q' => 'What is the Business Directory?',
                'a' => 'When available, it highlights organisations and resources that may be useful to the community. Inclusion does not imply endorsement—always conduct your own due diligence.',
            ],
            [
                'q' => 'How quickly will you reply to my message?',
                'a' => 'We aim to respond within a few business days. Urgent health or safety issues should be directed to emergency services or the appropriate statutory body.',
            ],
            [
                'q' => 'Can I suggest a FAQ topic?',
                'a' => 'Yes. Send your suggestion through the Contact page and we may add it to this list to help others with the same question.',
            ],
        ];
    @endphp

    <div class="bg-white">
        <section
            class="relative isolate overflow-hidden bg-gradient-to-br from-[#1a0a2e] via-violet-950 to-indigo-950 pb-16 pt-12 md:pb-20 md:pt-16 lg:pb-24 lg:pt-20"
            aria-labelledby="faq-hero-heading"
        >
            <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
                <div class="absolute -left-24 top-8 h-80 w-80 rounded-full bg-violet-600/15 blur-3xl"></div>
                <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-indigo-600/20 blur-3xl"></div>
                <div
                    class="pointer-events-none absolute right-[4%] top-[10%] h-40 w-52 opacity-50 sm:h-48 sm:w-64 md:right-[6%] md:top-[12%] bg-[radial-gradient(circle_at_center,rgba(147,197,253,0.85)_1.5px,transparent_1.5px)] [background-size:14px_14px]"
                    aria-hidden="true"
                ></div>
                <div
                    class="pointer-events-none absolute right-[5%] top-[11%] h-40 w-52 opacity-35 mix-blend-screen sm:h-48 sm:w-64 md:right-[7%] md:top-[13%] bg-[radial-gradient(circle_at_center,rgba(167,139,250,0.7)_1px,transparent_1px)] [background-size:22px_22px] [background-position:8px_10px]"
                    aria-hidden="true"
                ></div>
            </div>
            <div class="container relative z-10 mx-auto px-4">
                <div class="text-center">
                    <h1
                        id="faq-hero-heading"
                        class="text-3xl font-bold tracking-tight sm:text-4xl md:text-5xl lg:text-[2.75rem] lg:leading-tight"
                        style="color: #7B2FF7;"
                    >
                        Frequently Asked Questions
                    </h1>
                    <p class="mt-4 text-lg font-medium text-white/90 md:text-xl">
                        FAQs
                    </p>
                </div>
                <div class="mt-8 flex justify-end sm:mt-10 md:mt-12">
                    <a
                        href="{{ route('home') }}#faq"
                        class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-black text-white shadow-lg transition hover:bg-neutral-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:h-14 sm:w-14"
                        aria-label="Back to Frequently Asked Questions on home"
                    >
                        <svg class="h-6 w-6 sm:h-7 sm:w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M15 18l-6-6 6-6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>

        <section
            class="relative -mt-6 rounded-t-[1.75rem] bg-gradient-to-b from-sva-lavender/90 via-white to-white px-4 pb-16 pt-10 md:rounded-t-[2rem] md:pb-20 md:pt-12"
            aria-label="FAQ list"
        >
            <div class="container mx-auto max-w-3xl" x-data="{ faqOpen: null }">
                <ul class="flex flex-col gap-3 md:gap-4">
                    @foreach ($faqItems as $index => $item)
                        <li class="list-none">
                            <div class="rounded-2xl bg-[#F3F2FF] px-4 py-4 shadow-sm ring-1 ring-violet-200/60 md:px-5 md:py-5">
                                <button
                                    type="button"
                                    id="faq-trigger-{{ $index }}"
                                    class="flex w-full items-start justify-between gap-4 text-left"
                                    x-on:click="faqOpen = faqOpen === {{ $index }} ? null : {{ $index }}"
                                    x-bind:aria-expanded="faqOpen === {{ $index }} ? 'true' : 'false'"
                                    aria-controls="faq-panel-{{ $index }}"
                                >
                                    <span class="min-w-0 flex-1 pt-0.5 text-base font-bold leading-snug md:text-lg" style="color: #9A7BD6;">
                                        {{ $item['q'] }}
                                    </span>
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-white shadow-md" style="background-color: #6D28D9;" aria-hidden="true">
                                        <svg class="h-5 w-5 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" x-bind:class="faqOpen === {{ $index }} ? 'rotate-180' : ''">
                                            <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </button>
                                <div
                                    id="faq-panel-{{ $index }}"
                                    role="region"
                                    x-show="faqOpen === {{ $index }}"
                                    x-transition:enter="transition ease-out duration-200"
                                    x-transition:enter-start="opacity-0 -translate-y-1"
                                    x-transition:enter-end="opacity-100 translate-y-0"
                                    x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100 translate-y-0"
                                    x-transition:leave-end="opacity-0 -translate-y-1"
                                    x-cloak
                                    class="border-t border-violet-200/50 pt-4 mt-4"
                                >
                                    <p class="pr-14 text-sm leading-relaxed text-sva-body md:text-base">
                                        {{ $item['a'] }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </div>
@endsection
