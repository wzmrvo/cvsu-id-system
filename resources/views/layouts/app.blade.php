<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#164B32">
        <title>@yield('title', 'CvSU Student ID System')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('head')
    </head>
    <body class="min-h-screen bg-[var(--page-bg)] text-slate-800 antialiased">
        <a class="skip-link" href="#main-content">Skip to content</a>
        @include('partials.site-header')

        @php
            $isWorkspace = request()->routeIs('student.*', 'registrar.*', 'admin.*');
        @endphp

        <main id="main-content" @class(['workspace-layout' => $isWorkspace])>
            @if ($isWorkspace)
                @include('partials.workspace-sidebar')
                <div class="workspace-content">
                    @yield('content')
                </div>
            @else
                @yield('content')
            @endif
        </main>

        @include('partials.site-footer')

        <div class="toast" data-toast role="status" aria-live="polite" aria-atomic="true"></div>
    </body>
</html>
