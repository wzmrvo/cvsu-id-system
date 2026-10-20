@extends('layouts.app')

@section('title', 'Administrator overview | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        @include('partials.demo-notice')
        <section class="mt-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <span class="eyebrow">System administration · Demo</span>
                <h1 class="page-title mb-0 mt-2">Administration overview</h1>
                <p class="page-subtitle mb-0 mt-2">Explore a possible user-management interface. No accounts or permissions are changed.</p>
            </div>
            <button class="button" type="button" data-add-demo-user>＋ Add demo user</button>
        </section>

        <section class="mt-6 grid gap-3 sm:grid-cols-2 xl:grid-cols-4" aria-label="Administrator demo summary">
            @foreach ([
                ['24', 'Demo accounts', 'Example count'],
                ['18', 'Active', 'Local display only'],
                ['3', 'Role types', 'Student, staff, admin'],
                ['0', 'Pending invites', 'No invites are sent'],
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

        <section class="surface-card mt-6 p-4 sm:p-6" id="demo-users" aria-labelledby="users-heading">
            <div class="section-heading">
                <div><h2 id="users-heading">Demo users and roles</h2><p>Changing a role or account state only changes this page until it is reloaded.</p></div>
                <label class="flex items-center gap-2 text-xs font-semibold text-slate-600">
                    Filter
                    <select class="form-control !min-h-9 !w-auto !py-1.5" data-user-filter aria-label="Filter demo users by role">
                        <option value="">All roles</option><option>Student</option><option>Registrar Staff</option><option>Administrator</option>
                    </select>
                </label>
            </div>
            <div class="table-wrap mt-5">
                <table class="data-table" data-user-table>
                    <thead><tr><th scope="col">Demo user</th><th scope="col">Role</th><th scope="col">Status</th><th scope="col">Local action</th></tr></thead>
                    <tbody>
                        <tr data-user-row data-role="Student">
                            <td><strong class="block text-xs text-slate-800">Andrea Demo Student</strong><span class="mt-1 block text-[10px] text-slate-500">andrea.demo@example.test</span></td>
                            <td><select class="form-control !min-h-9 !max-w-44 !py-1.5" data-user-role aria-label="Demo role for Andrea Demo Student"><option selected>Student</option><option>Registrar Staff</option><option>Administrator</option></select></td>
                            <td><span data-user-status>@include('partials.status-badge', ['status' => 'Active'])</span></td>
                            <td><button class="button button--small button--secondary" type="button" data-toggle-user>Deactivate demo</button></td>
                        </tr>
                        <tr data-user-row data-role="Registrar Staff">
                            <td><strong class="block text-xs text-slate-800">Morgan Sample Staff</strong><span class="mt-1 block text-[10px] text-slate-500">morgan.staff@example.test</span></td>
                            <td><select class="form-control !min-h-9 !max-w-44 !py-1.5" data-user-role aria-label="Demo role for Morgan Sample Staff"><option>Student</option><option selected>Registrar Staff</option><option>Administrator</option></select></td>
                            <td><span data-user-status>@include('partials.status-badge', ['status' => 'Active'])</span></td>
                            <td><button class="button button--small button--secondary" type="button" data-toggle-user>Deactivate demo</button></td>
                        </tr>
                        <tr data-user-row data-role="Administrator">
                            <td><strong class="block text-xs text-slate-800">Alex Example Admin</strong><span class="mt-1 block text-[10px] text-slate-500">alex.admin@example.test</span></td>
                            <td><select class="form-control !min-h-9 !max-w-44 !py-1.5" data-user-role aria-label="Demo role for Alex Example Admin"><option>Student</option><option>Registrar Staff</option><option selected>Administrator</option></select></td>
                            <td><span data-user-status>@include('partials.status-badge', ['status' => 'Active'])</span></td>
                            <td><button class="button button--small button--secondary" type="button" data-toggle-user>Deactivate demo</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p class="empty-state mt-4 rounded-lg bg-[#f7f9f7] p-4 text-center text-xs text-slate-600" data-users-empty hidden>No demo users match this role.</p>
        </section>

        <section class="mt-6 grid gap-5 md:grid-cols-2" id="settings">
            <article class="surface-card p-5 sm:p-6">
                <span class="eyebrow">Settings preview</span>
                <h2 class="mb-2 mt-2 text-lg font-bold text-slate-800">Prototype configuration</h2>
                <p class="mb-0 text-sm leading-6 text-slate-600">Future settings may include verified application requirements, appointment capacity, status labels, and retention rules. No settings are stored here.</p>
                <button class="button button--secondary mt-4" type="button" data-preview-settings>Preview settings message</button>
            </article>
            <aside class="rounded-2xl border border-[#eadba7] bg-[#fffaf0] p-5 sm:p-6">
                <h2 class="m-0 text-sm font-bold text-[#594719]">Important boundary</h2>
                <p class="mb-0 mt-2 text-xs leading-6 text-[#74612d]">Real account creation, role assignment, authentication, audit trails, and university system integrations are intentionally not implemented in this visual prototype.</p>
            </aside>
        </section>
    </div>
@endsection
