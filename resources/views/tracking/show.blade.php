@extends('layouts.app')

@section('title', 'Track an application | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-5xl px-5 py-8 sm:px-8">
        @include('partials.demo-notice')
        <section class="mx-auto mt-8 max-w-3xl text-center">
            <span class="eyebrow">Application tracking</span>
            <h1 class="page-title mb-0 mt-2">Check your demo status</h1>
            <p class="page-subtitle mx-auto mb-0 mt-3">Search the fictional examples included on this page. This is not connected to a student database.</p>
        </section>

        <form class="surface-card mx-auto mt-6 flex max-w-3xl flex-col gap-3 p-4 sm:flex-row sm:p-5" data-tracking-form>
            <label class="sr-only" for="tracking-number">Application number</label>
            <input class="form-control flex-1" id="tracking-number" type="search" value="DEMO-2026-0142" placeholder="Example: DEMO-2026-0142" autocomplete="off">
            <button class="button shrink-0" type="submit">Search demo records</button>
        </form>
        <p class="mx-auto mt-2 max-w-3xl text-xs text-slate-500">Try DEMO-2026-0142, DEMO-2026-0138, or DEMO-2026-0131.</p>
        <p class="mx-auto mt-3 max-w-3xl text-sm font-semibold text-[#9a4136]" data-tracking-error role="status" hidden></p>

        <section class="surface-card mx-auto mt-6 max-w-3xl p-5 sm:p-7" data-tracking-result aria-labelledby="tracking-result-title">
            <div class="flex flex-wrap items-start justify-between gap-3 border-b border-[#edf0ed] pb-5">
                <div>
                    <p class="m-0 text-[10px] font-bold uppercase tracking-[.1em] text-slate-500">Demo application</p>
                    <h2 class="mb-0 mt-1 text-xl font-bold text-slate-800" id="tracking-result-title">DEMO-2026-0142</h2>
                    <p class="mb-0 mt-1 text-xs text-slate-500" data-tracking-name>Andrea Demo Student · Fictional record</p>
                </div>
                <span data-tracking-status>@include('partials.status-badge', ['status' => 'Under review'])</span>
            </div>

            <div class="mt-6 grid gap-7 md:grid-cols-[1.2fr_.8fr]">
                <div>
                    <h3 class="mb-4 mt-0 text-sm font-bold text-slate-800">Progress timeline</h3>
                    <div class="timeline" data-tracking-timeline aria-live="polite">
                        <div class="timeline-item"><span class="timeline-dot is-done"></span><div><p class="m-0 text-xs font-bold text-slate-800">Application submitted</p><p class="mb-0 mt-1 text-xs text-slate-500" data-timeline-date>October 16, 2026</p></div></div>
                        <div class="timeline-item"><span class="timeline-dot is-current"></span><div><p class="m-0 text-xs font-bold text-slate-800">Information under review</p><p class="mb-0 mt-1 text-xs text-slate-500">Automated checks are not identity verification.</p></div></div>
                        <div class="timeline-item"><span class="timeline-dot"></span><div><p class="m-0 text-xs font-bold text-slate-800">Appointment scheduled</p><p class="mb-0 mt-1 text-xs text-slate-500" data-appointment-note>Waiting for staff review.</p></div></div>
                        <div class="timeline-item"><span class="timeline-dot"></span><div><p class="m-0 text-xs font-bold text-slate-800">ID processing</p><p class="mb-0 mt-1 text-xs text-slate-500">Uses existing university production tools.</p></div></div>
                        <div class="timeline-item !pb-0"><span class="timeline-dot"></span><div><p class="m-0 text-xs font-bold text-slate-800">Ready for claiming</p><p class="mb-0 mt-1 text-xs text-slate-500">Follow the instructions from registrar staff.</p></div></div>
                    </div>
                </div>
                <aside class="h-fit rounded-xl bg-[#f7f9f7] p-4">
                    <h3 class="m-0 text-sm font-bold text-slate-800">Next step</h3>
                    <p class="mt-2 text-xs leading-6 text-slate-600" data-next-step>Wait for the registrar staff review. An appointment is not confirmed yet.</p>
                    <div class="mt-4 border-t border-[#e4ebe5] pt-4">
                        <p class="m-0 text-xs font-bold text-slate-800">Appointment</p>
                        <p class="mb-0 mt-1 text-xs leading-5 text-slate-500" data-appointment-detail>Not scheduled in this demo record.</p>
                    </div>
                </aside>
            </div>
        </section>
        <div class="mx-auto mt-5 max-w-3xl text-center">
            <a class="text-xs font-semibold text-[#164b32] no-underline hover:underline" href="{{ route('demo.sign-in') }}">Explore a role dashboard →</a>
        </div>
    </div>
@endsection
