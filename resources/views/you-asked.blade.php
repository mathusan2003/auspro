@extends('layouts.support-voice')

@section('title', 'You Asked')

@section('content')
    @php
        $youAskedItems = [
            [
                'q' => 'How do I prepare for my first NDIS planning conversation?',
                'a' => 'Many community members find it helpful to write down daily routines, goals, and any supports you already use. Bring questions you want answered and, if you like, a trusted person to take notes. This answer reflects common peer tips—your planner or LAC can confirm what applies to you.',
            ],
            [
                'q' => 'What is the difference between a support coordinator and a plan manager?',
                'a' => 'Support coordination helps you implement your plan and connect with providers. Plan management handles provider payments and NDIS invoices on your behalf. Some people use one, both, or neither, depending on their plan and preferences.',
            ],
            [
                'q' => 'Can I change providers if something is not working?',
                'a' => 'Yes, in many cases you can change providers. Check notice periods in your service agreement, communicate clearly, and keep copies of letters or emails. If you are unsure, ask your coordinator or contact us for general guidance on next steps.',
            ],
            [
                'q' => 'How do I request a plan review if my needs change?',
                'a' => 'Start by gathering evidence such as reports or letters from health professionals. You can contact the NDIS to discuss a review. We can help you think through what to include and questions to ask—this is general information, not legal advice.',
            ],
            [
                'q' => 'What should I do if I feel unsafe with a support worker?',
                'a' => 'Your safety comes first. Remove yourself from immediate risk, contact emergency services if needed, and report concerns through the NDIS Commission’s pathways. We can help you locate official reporting information.',
            ],
            [
                'q' => 'Are there peer groups for families, not just participants?',
                'a' => 'Many communities run family and carer spaces alongside participant forums. Ask us what is currently scheduled, or tell us your region and we will point you to options when available.',
            ],
            [
                'q' => 'How can I give feedback about a workshop I attended?',
                'a' => 'We welcome feedback—it helps us improve. Use the Contact page, mention the session name and date, and tell us what worked well and what could be better.',
            ],
            [
                'q' => 'Where can I read plain-language NDIS updates?',
                'a' => 'Official NDIS news is published on the NDIS website. We also summarise key changes in our Latest News and webinars when we run them—subscribe or check back for new posts.',
            ],
            [
                'q' => 'Can you help me understand a letter from the NDIS?',
                'a' => 'We can help you break down common terms and suggest questions to ask the NDIS or your advocate. For decisions that affect your rights, consider seeking formal advice if needed.',
            ],
            [
                'q' => 'How do I submit a question to appear in “You Asked”?',
                'a' => 'Send your question via the Contact page with the subject “You Asked”. We review submissions regularly; not every question can be published, and we may edit for clarity while protecting privacy.',
            ],
        ];
    @endphp

    <div class="bg-white">
        <section
            class="relative isolate overflow-hidden bg-gradient-to-br from-[#1a0a2e] via-violet-950 to-indigo-950 pb-16 pt-12 md:pb-20 md:pt-16 lg:pb-24 lg:pt-20"
            aria-labelledby="you-asked-hero-heading"
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
                    <h1 id="you-asked-hero-heading" class="text-3xl font-bold tracking-tight text-[#9784B0] sm:text-4xl md:text-5xl lg:text-[2.75rem] lg:leading-tight">
                        You Asked
                    </h1>
                    <p class="mt-4 text-lg font-medium text-white/90 md:text-xl">
                        Commonly Asked Questions
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
            aria-label="Community questions and answers"
        >
            <div class="container mx-auto max-w-3xl" x-data="{ yaOpen: null }">
                <ul class="flex flex-col gap-3 md:gap-4">
                    @foreach ($youAskedItems as $index => $item)
                        <li class="list-none">
                            <div class="rounded-2xl bg-[#F3F2FF] px-4 py-4 shadow-sm ring-1 ring-violet-200/60 md:px-5 md:py-5">
                                <button
                                    type="button"
                                    id="ya-trigger-{{ $index }}"
                                    class="flex w-full items-start justify-between gap-4 text-left"
                                    x-on:click="yaOpen = yaOpen === {{ $index }} ? null : {{ $index }}"
                                    x-bind:aria-expanded="yaOpen === {{ $index }} ? 'true' : 'false'"
                                    aria-controls="ya-panel-{{ $index }}"
                                >
                                    <span class="min-w-0 flex-1 pt-0.5 text-base font-bold leading-snug text-[#9A7BD6] md:text-lg">
                                        {{ $item['q'] }}
                                    </span>
                                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-950 text-white shadow-md" aria-hidden="true">
                                        <svg class="h-5 w-5 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" x-bind:class="yaOpen === {{ $index }} ? 'rotate-180' : ''">
                                            <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                </button>
                                <div
                                    id="ya-panel-{{ $index }}"
                                    role="region"
                                    x-show="yaOpen === {{ $index }}"
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
