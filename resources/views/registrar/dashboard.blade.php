@extends('layouts.app')

@section('title', 'Registrar workspace | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        <section class="mt-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">Registrar workspace</span>
                <h1 class="page-title mb-0 mt-2">Application review queue</h1>
                <p class="page-subtitle mb-0 mt-2">Review, verification, appointments, attendance, production, and release tracking.</p>
            </div>
            <span class="rounded-full border border-[#e1e8e2] bg-white px-3 py-2 text-xs font-semibold text-slate-600">Records unavailable</span>
        </section>

        <p class="mt-3 text-xs leading-5 text-slate-600">This workspace has no authentication, authorized reference source, or connected application records. It must not be used to make operational decisions.</p>

        <section class="mt-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-4" aria-label="Record availability">
            @foreach (['Applications', 'Appointments', 'Attendance', 'Production and release'] as $label)
                <article class="surface-card p-4">
                    <p class="m-0 text-xs font-semibold text-slate-500">{{ $label }}</p>
                    <p class="mb-0 mt-2 text-lg font-bold text-slate-600">Unavailable</p>
                    <span class="text-[10px] text-slate-500">No connected records</span>
                </article>
            @endforeach
        </section>

        <section class="surface-card mt-6 p-5 sm:p-6" aria-labelledby="queue-heading">
            <div class="section-heading">
                <div><h2 id="queue-heading">Application queue</h2><p>Search and review will be enabled after authorized records and staff access are implemented.</p></div>
            </div>
            <div class="empty-state mt-5 rounded-xl border border-dashed border-[#cbd8cd] bg-[#f7f9f7] p-6 text-center" role="status">
                <h3 class="m-0 text-base font-bold text-slate-800">Application records are not connected</h3>
                <p class="mb-0 mt-2 text-sm leading-6 text-slate-600">The queue cannot show whether applications are pending or complete. No student data is available in this workspace.</p>
            </div>
        </section>

        <section class="mt-6 grid gap-5 lg:grid-cols-2 xl:grid-cols-3">
            <article class="surface-card p-5 sm:p-6" aria-labelledby="application-detail-heading">
                <span class="eyebrow">Application review</span>
                <h2 class="mb-0 mt-2 text-lg font-bold text-slate-800" id="application-detail-heading">No application selected</h2>
                <p class="mb-0 mt-2 text-xs leading-5 text-slate-600">Application details and authorized reference information are unavailable until records and staff authentication are connected.</p>
                <div class="mt-5 rounded-xl bg-[#f7f9f7] p-4">
                    <h3 class="m-0 text-sm font-bold text-slate-800">Review and verification</h3>
                    <ul class="mb-0 mt-3 grid gap-2 p-0 text-xs leading-5 text-slate-600 [list-style:none]">
                        <li>Compare submitted details with an authorized reference source.</li>
                        <li>Request corrections through an approved student workflow.</li>
                        <li>Confirm identity and inspect the photo in person.</li>
                    </ul>
                </div>
                <label class="form-label mt-4" for="correction-note">Correction request note</label>
                <textarea class="form-control" id="correction-note" rows="3" placeholder="Available after staff access and application records are implemented." disabled></textarea>
                <div class="mt-4 flex flex-wrap gap-2">
                    <button class="button button--small cursor-not-allowed opacity-60" type="button" disabled>Verification unavailable</button>
                    <button class="button button--small button--secondary cursor-not-allowed opacity-60" type="button" disabled>Correction requests unavailable</button>
                </div>
            </article>

            <article class="surface-card p-5 sm:p-6" id="appointments" aria-labelledby="appointment-management-heading">
                <span class="eyebrow">Appointment management</span>
                <h2 class="mb-1 mt-2 text-lg font-bold text-slate-800" id="appointment-management-heading">Appointment and attendance</h2>
                <p class="mt-0 text-xs leading-5 text-slate-600">Scheduling and attendance cannot be recorded until connected records, staff access, and approved capacity rules are in place.</p>
                <div class="mt-5 grid gap-4 sm:grid-cols-2">
                    <div><label class="form-label" for="appointment-date">Appointment date</label><input class="form-control" id="appointment-date" type="date" disabled></div>
                    <div><label class="form-label" for="appointment-time">Appointment time</label><input class="form-control" id="appointment-time" type="time" disabled></div>
                </div>
                <button class="button button--secondary button--small mt-4 cursor-not-allowed opacity-60" type="button" disabled>Scheduling unavailable</button>
                <div class="mt-5 border-t border-[#edf0ed] pt-4">
                    <h3 class="m-0 text-sm font-bold text-slate-800">Attendance recording</h3>
                    <label class="mt-3 flex items-start gap-2 text-xs leading-5 text-slate-600">
                        <input type="checkbox" disabled>
                        <span>Student attendance confirmed in person</span>
                    </label>
                    <p class="mb-0 mt-3 text-xs leading-5 text-slate-500">Identity and attendance must be confirmed in person by authorized staff before any permitted production step.</p>
                </div>
            </article>

            <article class="surface-card p-5 sm:p-6" id="production" aria-labelledby="production-heading">
                <div class="section-heading"><div><h2 id="production-heading">Production and release</h2><p>Progress tracking is unavailable.</p></div></div>
                <div class="mt-5 rounded-xl border border-[#e1e8e2] p-4">
                    <p class="m-0 text-xs font-bold text-slate-800">Existing production tools remain in use</p>
                    <p class="mb-0 mt-2 text-xs leading-6 text-slate-600">After attendance is confirmed and policy permits, staff continue using the university’s separate ID production software, signature-capture equipment, and printer.</p>
                </div>
                <div class="mt-4 flex flex-wrap gap-2">
                    <button class="button button--small button--secondary cursor-not-allowed opacity-60" type="button" disabled>Production tracking unavailable</button>
                    <button class="button button--small cursor-not-allowed opacity-60" type="button" disabled>Release tracking unavailable</button>
                </div>
            </article>
        </section>
    </div>
@endsection
