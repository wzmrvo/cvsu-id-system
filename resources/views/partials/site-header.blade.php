@php
    $isStudentArea = request()->routeIs('student.*');
    $isRegistrarArea = request()->routeIs('registrar.*');
    $isAdminArea = request()->routeIs('admin.*');
@endphp

<header class="site-header">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4 sm:px-8">
        <a class="brand" href="{{ route('home') }}" aria-label="CvSU Student ID System home">
            <span class="brand-mark" aria-hidden="true">ID</span>
            <span class="brand-copy">
                <strong>CvSU</strong>
                <span>Student ID Services</span>
            </span>
        </a>

        <button
            class="menu-toggle"
            type="button"
            data-menu-toggle
            aria-expanded="false"
            aria-controls="primary-navigation"
            aria-label="Open navigation menu"
        >
            <span></span><span></span><span></span>
        </button>

        <nav id="primary-navigation" class="site-nav" data-menu-panel aria-label="Main navigation">
            @if ($isStudentArea)
                <a @class(['nav-link', 'is-active' => request()->routeIs('student.dashboard')]) href="{{ route('student.dashboard') }}">Overview</a>
                <a @class(['nav-link', 'is-active' => request()->routeIs('student.application.*')]) href="{{ route('student.application.create') }}">ID application</a>
                <a class="nav-link" href="{{ route('tracking.show') }}">Track status</a>
                <a class="nav-cta" href="{{ route('demo.sign-in') }}">Switch demo role</a>
            @elseif ($isRegistrarArea)
                <a @class(['nav-link', 'is-active' => request()->routeIs('registrar.dashboard')]) href="{{ route('registrar.dashboard') }}">Applications</a>
                <a class="nav-link" href="#appointments">Appointments</a>
                <a class="nav-link" href="#production">Production</a>
                <a class="nav-cta" href="{{ route('demo.sign-in') }}">Switch demo role</a>
            @elseif ($isAdminArea)
                <a @class(['nav-link', 'is-active' => request()->routeIs('admin.dashboard')]) href="{{ route('admin.dashboard') }}">Overview</a>
                <a class="nav-link" href="#demo-users">Demo users</a>
                <a class="nav-link" href="#settings">Settings preview</a>
                <a class="nav-cta" href="{{ route('demo.sign-in') }}">Switch demo role</a>
            @else
                <a class="nav-link" href="{{ route('home') }}#process">How it works</a>
                <a class="nav-link" href="{{ route('home') }}#requirements">Requirements</a>
                <a class="nav-link" href="{{ route('tracking.show') }}">Track application</a>
                <a class="nav-cta" href="{{ route('demo.sign-in') }}">Demo sign in</a>
            @endif
        </nav>
    </div>
</header>
