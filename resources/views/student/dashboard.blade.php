@extends('layouts.app')

@section('title', 'Student dashboard | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        <section class="mt-8 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">Student workspace</span>
                <h1 class="page-title mb-0 mt-2">Student ID overview</h1>
                <p class="page-subtitle mb-0 mt-2">Information and application history will appear here when account access and records are connected.</p>
            </div>
            <a class="button" href="{{ route('student.application.create') }}">View application form</a>
        </section>

        <section class="surface-card mt-6 p-5 sm:p-6" aria-labelledby="student-profile-heading">
            <div class="section-heading">
                <div>
                    <span class="eyebrow">Profile</span>
                    <h2 id="student-profile-heading" class="mt-2">Student profile</h2>
                    <p>Profile details are not available because this page is not connected to an authenticated student account.</p>
                </div>
            </div>
            <div class="empty-state mt-5 rounded-xl bg-[#f7f9f7] p-5 text-sm leading-6 text-slate-600" role="status">
                No profile lookup is performed. Sign-in and authorized student-record access must be implemented before profile details can be shown.
            </div>
        </section>

        <section class="mt-7 grid gap-5 lg:grid-cols-[1.45fr_.75fr]">
            <article class="surface-card p-5 sm:p-7" aria-labelledby="application-progress-heading">
                <div class="flex flex-wrap items-start justify-between gap-3">
                    <div>
                        <p class="m-0 text-xs font-bold uppercase tracking-[.1em] text-slate-500">Application progress</p>
                        <h2 class="mb-0 mt-2 text-xl font-bold text-slate-800" id="application-progress-heading">Progress is unavailable</h2>
                        <p class="mb-0 mt-1 text-xs text-slate-500">No application record is loaded.</p>
                    </div>
                    <span class="rounded-full bg-[#f2f4f2] px-3 py-1.5 text-[10px] font-bold text-slate-600">No record connected</span>
                </div>

                <ol class="mt-7 grid grid-cols-2 gap-3 sm:grid-cols-5" aria-label="General application workflow, not an individual status">
                    @foreach (['Submitted', 'Staff review', 'Appointment', 'ID production', 'Release'] as $step)
                        <li class="min-w-0 rounded-xl border border-[#e1e8e2] bg-white p-3 text-center">
                            <span class="mx-auto grid h-8 w-8 place-items-center rounded-full bg-[#f2f4f2] text-xs font-bold text-slate-600" aria-hidden="true">{{ $loop->iteration }}</span>
                            <span class="mt-2 block text-[10px] leading-4 text-slate-600 sm:text-xs">{{ $step }}</span>
                        </li>
                    @endforeach
                </ol>

                <p class="mb-0 mt-5 rounded-xl bg-[#f7f9f7] p-4 text-xs leading-6 text-slate-600" role="status">
                    This is a general workflow guide only. It does not indicate that an application was submitted, reviewed, verified, scheduled, produced, or released.
                </p>
                <div class="mt-5 flex flex-wrap gap-3">
                    <a class="button button--secondary" href="{{ route('tracking.show') }}">Check tracking availability</a>
                    <a class="button button--quiet" href="{{ route('student.application.create') }}">View application form</a>
                </div>
            </article>

            <aside class="grid gap-5">
                <article class="surface-card p-5" aria-labelledby="appointment-heading">
                    <div class="flex items-center justify-between gap-3">
                        <h2 class="m-0 text-base font-bold text-slate-800" id="appointment-heading">Appointment</h2>
                        <span class="rounded-full bg-[#f2f4f2] px-2.5 py-1 text-[10px] font-bold text-slate-600">Unavailable</span>
                    </div>
                    <p class="mb-0 mt-3 text-sm leading-6 text-slate-600">Appointment information cannot be shown until scheduling and student records are connected.</p>
                    <p class="mb-0 mt-4 border-t border-[#edf0ed] pt-3 text-xs text-slate-500">Please follow instructions from registrar staff for any actual visit.</p>
                </article>
                <article class="surface-card p-5">
                    <h2 class="m-0 text-base font-bold text-slate-800">Before an in-person visit</h2>
                    <ul class="mb-0 mt-4 grid gap-3 p-0 text-xs leading-5 text-slate-600 [list-style:none]">
                        <li>Confirm appointment details directly with registrar staff.</li>
                        <li>Follow the Registrar’s approved photo and document requirements.</li>
                        <li>Identity verification must be completed in person by authorized staff.</li>
                    </ul>
                </article>
            </aside>
        </section>

        <section class="mt-8 grid gap-5 md:grid-cols-2">
            <article class="surface-card p-5 sm:p-6" aria-labelledby="application-history-heading">
                <div class="section-heading">
                    <div><h2 id="application-history-heading">Application history</h2><p>History cannot be checked without account access and connected records.</p></div>
                </div>
                <p class="empty-state mt-5 rounded-xl bg-[#f7f9f7] p-5 text-sm leading-6 text-slate-600" role="status">
                    Application history is unavailable. This does not mean that no application exists.
                </p>
            </article>
            <article class="surface-card p-5 sm:p-6" aria-labelledby="claiming-heading">
                <div class="section-heading">
                    <div><h2 id="claiming-heading">Claiming instructions</h2><p>Instructions can only be provided after authorized staff record a release status.</p></div>
                    <span class="rounded-full bg-[#f2f4f2] px-3 py-1.5 text-[10px] font-bold text-slate-600">Unavailable</span>
                </div>
                <p class="mb-0 mt-4 text-xs leading-6 text-slate-600">No claiming location, date, or release confirmation is available here. Please follow official instructions from the Registrar.</p>
            </article>
        </section>
    </div>
@endsection
