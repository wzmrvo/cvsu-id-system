@extends('layouts.app')

@section('title', 'Administration overview | CvSU Student ID System')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        <section class="mt-3 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">System administration</span>
                <h1 class="page-title mb-0 mt-2">Administration overview</h1>
                <p class="page-subtitle mb-0 mt-2">Account access, roles, system settings, and operational audit information.</p>
            </div>
            <span class="rounded-full border border-[#e1e8e2] bg-white px-3 py-2 text-xs font-semibold text-slate-600">Administration unavailable</span>
        </section>
        <p class="mt-3 text-xs leading-5 text-slate-600">Authentication, permissions, account storage, settings, and activity logging are not implemented. This page provides no administrative access.</p>

        <section class="mt-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-4" aria-label="Administrative record availability">
            @foreach (['User accounts', 'Role assignments', 'System settings', 'Activity records'] as $label)
                <article class="surface-card p-4">
                    <p class="m-0 text-xs font-semibold text-slate-500">{{ $label }}</p>
                    <p class="mb-0 mt-2 text-lg font-bold text-slate-600">Unavailable</p>
                    <span class="text-[10px] text-slate-500">No connected records</span>
                </article>
            @endforeach
        </section>

        <section class="surface-card mt-6 p-4 sm:p-6" id="users" aria-labelledby="users-heading">
            <div class="section-heading">
                <div><h2 id="users-heading">Users and roles</h2><p>Only authorized administrators should manage accounts after authentication and permissions are implemented.</p></div>
                <button class="button cursor-not-allowed opacity-60" type="button" disabled aria-disabled="true">Account management unavailable</button>
            </div>
            <div class="empty-state mt-5 rounded-xl border border-dashed border-[#cbd8cd] bg-[#f7f9f7] p-6 text-center" role="status">
                <h3 class="m-0 text-base font-bold text-slate-800">No account directory is connected</h3>
                <p class="mb-0 mt-2 text-sm leading-6 text-slate-600">No user names, email addresses, roles, or account states are available to display.</p>
            </div>
        </section>

        <section class="mt-6 grid gap-5 lg:grid-cols-2" id="settings">
            <article class="surface-card p-5 sm:p-6">
                <span class="eyebrow">System settings</span>
                <h2 class="mb-2 mt-2 text-lg font-bold text-slate-800">Configuration</h2>
                <p class="mb-0 text-sm leading-6 text-slate-600">Future settings may include Registrar-approved application requirements, appointment capacity, status labels, and record-retention policy.</p>
                <p class="mt-4 rounded-lg bg-[#f7f9f7] p-3 text-xs leading-5 text-slate-600" role="status">No settings are currently available or stored.</p>
                <button class="button button--secondary mt-2 cursor-not-allowed opacity-60" type="button" disabled>Settings unavailable</button>
            </article>
            <article class="surface-card p-5 sm:p-6" id="activity-log" aria-labelledby="activity-log-heading">
                <div class="section-heading"><div><h2 id="activity-log-heading">Activity log</h2><p>Administrative events cannot be retrieved.</p></div></div>
                <p class="empty-state mt-5 rounded-xl bg-[#f7f9f7] p-5 text-sm leading-6 text-slate-600" role="status">
                    Activity logging has not been implemented. This does not indicate that no administrative activity has occurred elsewhere.
                </p>
            </article>
        </section>
    </div>
@endsection
