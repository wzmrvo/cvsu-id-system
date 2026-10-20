<header class="site-header">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-5 py-4 sm:px-8">
        <a class="brand" href="{{ route('home') }}" aria-label="Cavite State University Student ID System home">
            @include('partials.institutional-brand')
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
            <a class="nav-link" href="{{ route('home') }}#process" data-site-link>Application process</a>
            <a class="nav-link" href="{{ route('home') }}#requirements" data-site-link>Requirements</a>
            <a class="nav-link" href="{{ route('student.application.create') }}" data-site-link>Apply for ID</a>
            <a class="nav-link" href="{{ route('tracking.show') }}" data-site-link>Track application</a>
            <a class="nav-cta" href="{{ route('sign-in') }}" data-site-link>Sign in</a>
        </nav>
    </div>
</header>
