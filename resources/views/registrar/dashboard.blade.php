@extends('layouts.app')

@section('title', 'Registrar workspace | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        @include('partials.demo-notice')
        <section class="mt-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">Registrar workspace</span>
                <h1 class="page-title mb-0 mt-2">Application review queue</h1>
                <p class="page-subtitle mb-0 mt-2">Review submitted information and demonstrate status updates using fictional records.</p>
            </div>
            <span class="rounded-full border border-[#e1e8e2] bg-white px-3 py-2 text-xs font-semibold text-slate-600">Staff demo · No live records</span>
        </section>

        <section class="mt-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-4" aria-label="Demo application summary">
            @foreach ([
                ['12', 'Pending applications', 'Needs initial review'],
                ['4', 'Under review', 'Information being checked'],
                ['3', 'Appointments', 'Demo schedule only'],
                ['7', 'Ready for claiming', 'Example status count'],
            ] as [$value, $label, $hint])
                <article class="surface-card p-4">
                    <p class="m-0 text-xs font-semibold text-slate-500">{{ $label }}</p>
                    <div class="mt-2 flex items-end justify-between gap-2">
                        <strong class="text-2xl font-bold tracking-tight text-[#164b32]">{{ $value }}</strong>
                        <span class="text-[10px] text-slate-500">{{ $hint }}</span>
                    </div>
                </article>
            @endforeach
        </section>

        <section class="surface-card mt-6 p-4 sm:p-6" aria-labelledby="queue-heading">
            <div class="section-heading">
                <div><h2 id="queue-heading">Recent applications</h2><p>Search and filter this local demonstration list.</p></div>
                <span class="text-xs text-slate-500">4 fictional records</span>
            </div>
            <div class="mt-5 flex flex-col gap-3 sm:flex-row">
                <label class="sr-only" for="application-search">Search applications</label>
                <input class="form-control sm:max-w-sm" id="application-search" type="search" placeholder="Search name or demo number" autocomplete="off" data-application-search>
                <label class="sr-only" for="application-status-filter">Filter by status</label>
                <select class="form-control sm:max-w-56" id="application-status-filter" data-application-filter>
                    <option value="">All statuses</option>
                    <option>Submitted</option>
                    <option>Under review</option>
                    <option>Correction requested</option>
                    <option>Appointment approved</option>
                    <option>Appointment scheduled</option>
                    <option>ID processing</option>
                    <option>Ready for claiming</option>
                </select>
            </div>

            <div class="table-wrap mt-4">
                <table class="data-table" data-application-table>
                    <thead><tr><th scope="col">Student / application</th><th scope="col">Program</th><th scope="col">Submitted</th><th scope="col">Status</th><th scope="col"><span class="sr-only">Actions</span></th></tr></thead>
                    <tbody>
                        <tr data-application-row data-name="Andrea Demo Student" data-number="DEMO-2026-0142" data-program="BS Information Technology" data-status="Under review" data-submitted="Oct 16, 2026">
                            <td><strong class="block text-xs text-slate-800">Andrea Demo Student</strong><span class="mt-1 block text-[10px] text-slate-500">DEMO-2026-0142</span></td>
                            <td>BS Information Technology</td><td>Oct 16, 2026</td>
                            <td><span data-row-status>@include('partials.status-badge', ['status' => 'Under review'])</span></td>
                            <td><button class="table-action" type="button" data-select-application>Review</button></td>
                        </tr>
                        <tr data-application-row data-name="Jordan Sample Learner" data-number="DEMO-2026-0138" data-program="BS Psychology" data-status="Submitted" data-submitted="Oct 17, 2026">
                            <td><strong class="block text-xs text-slate-800">Jordan Sample Learner</strong><span class="mt-1 block text-[10px] text-slate-500">DEMO-2026-0138</span></td>
                            <td>BS Psychology</td><td>Oct 17, 2026</td>
                            <td><span data-row-status>@include('partials.status-badge', ['status' => 'Submitted'])</span></td>
                            <td><button class="table-action" type="button" data-select-application>Review</button></td>
                        </tr>
                        <tr data-application-row data-name="Casey Fictional Student" data-number="DEMO-2026-0131" data-program="BS Biology" data-status="Correction requested" data-submitted="Oct 12, 2026">
                            <td><strong class="block text-xs text-slate-800">Casey Fictional Student</strong><span class="mt-1 block text-[10px] text-slate-500">DEMO-2026-0131</span></td>
                            <td>BS Biology</td><td>Oct 12, 2026</td>
                            <td><span data-row-status>@include('partials.status-badge', ['status' => 'Correction requested'])</span></td>
                            <td><button class="table-action" type="button" data-select-application>Review</button></td>
                        </tr>
                        <tr data-application-row data-name="Taylor Example Student" data-number="DEMO-2026-0124" data-program="BS Agriculture" data-status="Ready for claiming" data-submitted="Oct 08, 2026">
                            <td><strong class="block text-xs text-slate-800">Taylor Example Student</strong><span class="mt-1 block text-[10px] text-slate-500">DEMO-2026-0124</span></td>
                            <td>BS Agriculture</td><td>Oct 08, 2026</td>
                            <td><span data-row-status>@include('partials.status-badge', ['status' => 'Ready for claiming'])</span></td>
                            <td><button class="table-action" type="button" data-select-application>Review</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="empty-state mt-4 rounded-lg bg-[#f7f9f7] p-4 text-center text-xs text-slate-600" data-application-empty hidden>No demo applications match these filters.</p>
        </section>

        <section class="mt-6 grid gap-5 lg:grid-cols-[1.1fr_.9fr]">
            <article class="surface-card p-5 sm:p-6" aria-labelledby="application-detail-heading">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <span class="eyebrow">Selected demo record</span>
                        <h2 class="mb-0 mt-2 text-lg font-bold text-slate-800" id="application-detail-heading" data-detail-name>Andrea Demo Student</h2>
                        <p class="mb-0 mt-1 text-xs text-slate-500" data-detail-number>DEMO-2026-0142 · Fictional record</p>
                    </div>
                    <span data-detail-status>@include('partials.status-badge', ['status' => 'Under review'])</span>
                </div>
                <dl class="mt-5 grid grid-cols-2 gap-x-4 gap-y-4 rounded-xl bg-[#f7f9f7] p-4 text-xs">
                    <div><dt class="text-slate-500">Program</dt><dd class="mb-0 mt-1 font-bold text-slate-800" data-detail-program>BS Information Technology</dd></div>
                    <div><dt class="text-slate-500">Submitted</dt><dd class="mb-0 mt-1 font-bold text-slate-800" data-detail-submitted>Oct 16, 2026</dd></div>
                    <div class="col-span-2"><dt class="text-slate-500">Staff reminder</dt><dd class="mb-0 mt-1 leading-5 text-slate-700">Check submitted details against authorized reference information when available. Identity must be verified in person.</dd></div>
                </dl>
                <p class="mt-4 rounded-lg border border-[#eadba7] bg-[#fffaf0] p-3 text-xs leading-5 text-[#66531c]">These controls update only the visible demo state. No appointment, approval, notification, or production job is created.</p>
                <div class="mt-4 flex flex-wrap gap-2" id="appointments">
                    <button class="button button--small" type="button" data-status-action="Appointment approved">Approve for appointment</button>
                    <button class="button button--small button--secondary" type="button" data-status-action="Correction requested">Request correction</button>
                    <button class="button button--small button--secondary" type="button" data-status-action="Appointment scheduled">Schedule demo appointment</button>
                </div>
            </article>
            <article class="surface-card p-5 sm:p-6" id="production">
                <div class="section-heading"><div><h2>Production & release</h2><p>Tracking example only; existing tools stay in use.</p></div></div>
                <div class="mt-5 rounded-xl border border-[#e1e8e2] p-4">
                    <p class="m-0 text-xs font-bold text-slate-800">Registrar-controlled progress</p>
                    <p class="mb-0 mt-2 text-xs leading-6 text-slate-600">After attendance is confirmed and policy permits, staff may continue work in the university's separate ID production software and signature-capture workflow.</p>
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                    <button class="button button--small button--secondary" type="button" data-status-action="ID processing">Mark ID processing</button>
                    <button class="button button--small" type="button" data-status-action="Ready for claiming">Mark ready for claiming</button>
                </div>
                <div class="mt-5 border-t border-[#edf0ed] pt-4">
                    <h3 class="m-0 text-xs font-bold text-slate-800">Appointment examples</h3>
                    <p class="mb-0 mt-2 text-xs leading-5 text-slate-500">A simulated schedule does not reserve staff time or notify a student. Confirm real appointments through the approved process.</p>
                </div>
            </article>
        </section>
    </div>
@endsection
