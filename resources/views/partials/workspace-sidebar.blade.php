@php
    $workspace = match (true) {
        request()->routeIs('student.*') => [
            'title' => 'Student services',
            'links' => [
                ['Student overview', 'student.dashboard', 'student.dashboard'],
                ['ID application', 'student.application.create', 'student.application.*'],
                ['Track application', 'tracking.show', 'tracking.show'],
            ],
        ],
        request()->routeIs('registrar.*') => [
            'title' => 'Registrar workspace',
            'links' => [
                ['Application queue', 'registrar.dashboard', 'registrar.dashboard'],
                ['Appointments', 'registrar.dashboard', 'registrar.dashboard'],
                ['Production and release', 'registrar.dashboard', 'registrar.dashboard'],
            ],
        ],
        default => [
            'title' => 'Administration',
            'links' => [
                ['Overview', 'admin.dashboard', 'admin.dashboard'],
                ['Users and roles', 'admin.dashboard', 'admin.dashboard'],
                ['System settings', 'admin.dashboard', 'admin.dashboard'],
                ['Activity log', 'admin.dashboard', 'admin.dashboard'],
            ],
        ],
    };
@endphp

<aside class="workspace-sidebar" aria-label="{{ $workspace['title'] }} navigation">
    <p class="workspace-sidebar__eyebrow">Student ID system</p>
    <h2>{{ $workspace['title'] }}</h2>
    <nav aria-label="Workspace">
        @foreach ($workspace['links'] as [$label, $routeName, $activeRoute])
            <a
                @class(['workspace-link', 'is-active' => request()->routeIs($activeRoute)])
                href="{{ route($routeName) }}{{ $label === 'Appointments' ? '#appointments' : '' }}{{ $label === 'Production and release' ? '#production' : '' }}{{ $label === 'Users and roles' ? '#users' : '' }}{{ $label === 'System settings' ? '#settings' : '' }}{{ $label === 'Activity log' ? '#activity-log' : '' }}"
                data-workspace-link
                @if (request()->routeIs($activeRoute)) aria-current="page" @endif
            >
                <span aria-hidden="true">{{ ['Student overview' => '01', 'ID application' => '02', 'Track application' => '03', 'Application queue' => '01', 'Appointments' => '02', 'Production and release' => '03', 'Overview' => '01', 'Users and roles' => '02', 'System settings' => '03', 'Activity log' => '04'][$label] }}</span>
                {{ $label }}
            </a>
        @endforeach
    </nav>
    <p class="workspace-sidebar__note">Workspace preview. Sign-in, access permissions, and saved records are not enabled.</p>
</aside>
