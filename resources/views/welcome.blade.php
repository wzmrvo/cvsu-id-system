@extends('layouts.app')

@section('title', 'CvSU Student ID Services | Prototype')

@section('content')
    <section class="hero">
        <div class="hero-content mx-auto grid max-w-7xl items-center gap-12 px-5 py-16 sm:px-8 lg:grid-cols-[1.2fr_.8fr] lg:py-24">
            <div>
                <span class="hero-kicker">Student services · Demo prototype</span>
                <h1>A simpler path to your <span>student ID.</span></h1>
                <p class="hero-copy">
                    Apply online, check your application progress, and arrive prepared for your registrar appointment.
                    This prototype demonstrates a possible workflow and does not connect to CvSU systems.
                </p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a class="button min-w-36 border border-[#dfc66e] bg-[#c6a23a] text-[#203425] hover:bg-[#d4b651]" href="{{ route('demo.sign-in') }}">
                        Get started <span aria-hidden="true">→</span>
                    </a>
                    <a class="button button--secondary min-w-36 border-white/30 bg-white/10 text-white hover:bg-white/15" href="{{ route('tracking.show') }}">
                        Track application
                    </a>
                </div>
                <p class="mt-5 text-xs text-white/65">Use fictional demo data only. No real student information is requested.</p>
            </div>

            <div class="hero-visual hidden lg:block" aria-label="Illustration of a student application progress card">
                <div class="hero-visual-card">
                    <div class="flex items-center justify-between gap-3">
                        <div>
                            <p class="m-0 text-xs font-bold text-slate-800">Application progress</p>
                            <p class="mb-0 mt-1 text-[11px] text-slate-500">Demo ID · DEMO-2026-0142</p>
                        </div>
                        <span class="status-badge status-badge--blue">Under review</span>
                    </div>
                    <div class="mt-6 flex items-center justify-between text-[10px] font-semibold text-slate-500">
                        <span>Submitted</span><span>Review</span><span>Appointment</span>
                    </div>
                    <div class="progress-track mt-2"><span></span></div>
                    <div class="mt-6 rounded-xl bg-[#f5f8f5] p-4">
                        <div class="flex items-center gap-3">
                            <div class="grid h-9 w-9 place-items-center rounded-full bg-[#eaf3ed] text-sm font-bold text-[#164b32]">A</div>
                            <div class="flex-1">
                                <div class="mini-line mini-line--medium"></div>
                                <div class="mini-line mini-line--short mt-2"></div>
                            </div>
                            <span class="text-lg text-[#164b32]" aria-hidden="true">✓</span>
                        </div>
                        <p class="mb-0 mt-4 text-[11px] leading-5 text-slate-500">Staff review information before an appointment is confirmed.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
        <div class="section-heading">
            <div>
                <span class="eyebrow">A clear process</span>
                <h2 class="mt-2">Know what happens next</h2>
                <p>Designed to help students and registrar staff stay on the same page.</p>
            </div>
            <a class="button button--secondary" href="{{ route('demo.sign-in') }}">Explore the demo</a>
        </div>
        <div class="mt-8 grid gap-4 md:grid-cols-3">
            @foreach ([
                ['01', 'Submit your details', 'Complete a guided form and review what you entered before the demo submission.'],
                ['02', 'Wait for staff review', 'Registrar staff can review the application and request corrections before scheduling.'],
                ['03', 'Attend and claim', 'Attend in person for identity and photo checks; follow staff guidance for production and release.'],
            ] as [$number, $title, $description])
                <article class="surface-card p-6">
                    <span class="process-number">{{ $number }}</span>
                    <h3 class="mb-2 mt-5 text-base font-bold text-slate-800">{{ $title }}</h3>
                    <p class="m-0 text-sm leading-6 text-slate-600">{{ $description }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section id="requirements" class="bg-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_.8fr] lg:items-center lg:py-16">
            <div>
                <span class="eyebrow">Before you apply</span>
                <h2 class="mt-2 text-2xl font-bold tracking-tight text-slate-800">Prepare the basics</h2>
                <p class="mt-3 max-w-xl text-sm leading-7 text-slate-600">
                    The final requirements and photo specifications must be confirmed by the Registrar. These reminders are for prototype illustration only.
                </p>
                <ul class="mt-5 grid gap-3 text-sm text-slate-700 sm:grid-cols-2">
                    <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Student number and program details</li>
                    <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Contact details for follow-up</li>
                    <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> A recent ID photo, if requested</li>
                    <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Time to attend an in-person check</li>
                </ul>
            </div>
            <aside class="rounded-2xl border border-[#eadba7] bg-[#fffaf0] p-6">
                <p class="m-0 text-sm font-bold text-[#594719]">A prototype, not a student record system</p>
                <p class="mb-0 mt-2 text-sm leading-6 text-[#74612d]">
                    Automated form checks are not identity verification. Staff review and in-person checks remain important.
                    Existing CvSU production software, signature devices, and printers are not replaced by this concept.
                </p>
            </aside>
        </div>
    </section>
@endsection
