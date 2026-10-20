@extends('layouts.app')

@section('title', 'Student dashboard | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        @include('partials.demo-notice')
        <section class="mt-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">Student workspace</span>
                <h1 class="page-title mb-0 mt-2">Good morning, Andrea</h1>
                <p class="page-subtitle mb-0 mt-2">Here is the latest on your student ID application.</p>
            </div>
            <a class="button" href="{{ route('student.application.create') }}">＋ Apply for student ID</a>
        </section>

        <section class="mt-7 grid gap-5 lg:grid-cols-[1.45fr_.75fr]">
            <article class="surface-card p-5 sm:p-7">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <p class="m-0 text-xs font-bold uppercase tracking-[.1em] text-slate-500">Current application</p>
                        <h2 class="mb-0 mt-2 text-xl font-bold text-slate-800">Student ID application</h2>
                        <p class="mb-0 mt-1 text-xs text-slate-500">Demo application · DEMO-2026-0142</p>
                    </div>
                    @include('partials.status-badge', ['status' => 'Under review'])
                </div>

                <div class="mt-7 grid grid-cols-5 gap-2" aria-label="Application progress, step 2 of 5">
                    @foreach (['Submitted', 'Staff review', 'Appointment', 'ID processing', 'Claiming'] as $index => $step)
                        <div class="min-w-0 text-center">
                            <span @class([
                                'mx-auto grid h-8 w-8 place-items-center rounded-full text-xs font-bold',
                                'bg-[#164b32] text-white' => $index < 2,
                                'border-2 border-[#c6a23a] bg-white text-[#164b32]' => $index === 2,
                                'border border-[#dce5dd] bg-[#f7f9f7] text-slate-400' => $index > 2,
                            ])>
                                {{ $index < 2 ? '✓' : $index + 1 }}
                            </span>
                            <span class="mt-2 block text-[10px] leading-4 text-slate-500 sm:text-xs">{{ $step }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 rounded-xl bg-[#f7f9f7] p-4">
                    <p class="mb-1 text-sm font-bold text-slate-800">What happens next?</p>
                    <p class="m-0 text-xs leading-6 text-slate-600">Registrar staff will review the information. An appointment is not confirmed yet. If a correction is needed, it will be returned for you to update.</p>
                </div>
                <div class="mt-5 flex flex-wrap gap-3">
                    <a class="button button--secondary" href="{{ route('tracking.show') }}">View application status</a>
                    <a class="button button--quiet" href="{{ route('student.application.create') }}">Start a new demo form</a>
                </div>
            </article>

            <aside class="grid gap-5">
                <article class="surface-card p-5">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="m-0 text-base font-bold text-slate-800">Appointment</h2>
                        <span class="rounded-full bg-[#f2f4f2] px-2.5 py-1 text-[10px] font-bold text-slate-500">Not scheduled</span>
                    </div>
                    <p class="mb-0 mt-3 text-sm leading-6 text-slate-600">Wait for staff review before planning an in-person verification visit.</p>
                    <p class="mb-0 mt-4 border-t border-[#edf0ed] pt-3 text-xs text-slate-500">Appointments shown in the prototype are examples only.</p>
                </article>
                <article class="surface-card p-5">
                    <h2 class="m-0 text-base font-bold text-slate-800">Before your visit</h2>
                    <ul class="mb-0 mt-4 grid gap-3 p-0 text-xs text-slate-600 [list-style:none]">
                        <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Bring your student identification reference</li>
                        <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Follow the Registrar's confirmed photo guidance</li>
                        <li class="flex gap-2"><span class="text-[#164b32]" aria-hidden="true">✓</span> Wait for an appointment confirmation</li>
                    </ul>
                </article>
            </aside>
        </section>

        <section class="mt-8 grid gap-5 md:grid-cols-2">
            <article class="surface-card p-5 sm:p-6">
                <div class="section-heading">
                    <div><h2>Application details</h2><p>Fictional sample information</p></div>
                    <a class="table-action" href="{{ route('tracking.show') }}">View status</a>
                </div>
                <dl class="mt-5 grid grid-cols-2 gap-x-4 gap-y-4 text-xs">
                    <div><dt class="text-slate-500">Student number</dt><dd class="mb-0 mt-1 font-bold text-slate-800">DEMO-2026-0142</dd></div>
                    <div><dt class="text-slate-500">Program</dt><dd class="mb-0 mt-1 font-bold text-slate-800">BS Information Technology</dd></div>
                    <div><dt class="text-slate-500">Submitted</dt><dd class="mb-0 mt-1 font-bold text-slate-800">October 16, 2026</dd></div>
                    <div><dt class="text-slate-500">Last update</dt><dd class="mb-0 mt-1 font-bold text-slate-800">October 18, 2026</dd></div>
                </dl>
            </article>
            <article class="surface-card p-5 sm:p-6">
                <h2 class="m-0 text-base font-bold text-slate-800">Recent activity</h2>
                <div class="timeline mt-5">
                    <div class="timeline-item">
                        <span class="timeline-dot is-done" aria-hidden="true"></span>
                        <div><p class="m-0 text-xs font-bold text-slate-800">Application received</p><p class="mb-0 mt-1 text-xs text-slate-500">October 16, 2026 · Demo record</p></div>
                    </div>
                    <div class="timeline-item !pb-0">
                        <span class="timeline-dot is-current" aria-hidden="true"></span>
                        <div><p class="m-0 text-xs font-bold text-slate-800">Staff review in progress</p><p class="mb-0 mt-1 text-xs text-slate-500">No identity verification has happened yet.</p></div>
                    </div>
                </div>
            </article>
        </section>
    </div>
@endsection
