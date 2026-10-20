@extends('layouts.app')

@section('title', 'Sign-in information | CvSU Student ID System')

@section('content')
    <div class="mx-auto max-w-6xl px-5 py-10 sm:px-8 lg:py-16">
        <div class="mx-auto grid max-w-4xl overflow-hidden rounded-2xl border border-[#e1e8e2] bg-white shadow-[0_12px_35px_rgb(24_52_36_/_6%)] md:grid-cols-[.85fr_1.15fr]">
            <aside class="flex flex-col justify-between bg-[#164b32] p-7 text-white sm:p-9">
                <div>
                    @include('partials.institutional-brand', ['brandClass' => 'institutional-brand--inverse'])
                    <h1 class="mt-10 text-3xl font-bold tracking-tight">Student ID services</h1>
                    <p class="mt-4 text-sm leading-7 text-white/80">A student-centered interface concept for application updates and registrar coordination.</p>
                </div>
                <p class="mb-0 mt-10 text-xs leading-6 text-white/75">This development build is not connected to university authentication or student records.</p>
            </aside>

            <section class="p-6 sm:p-9" aria-labelledby="signin-heading">
                <a class="text-xs font-semibold text-[#164b32] no-underline hover:underline" href="{{ route('home') }}">← Return to information page</a>
                <h2 class="mb-1 mt-6 text-2xl font-bold tracking-tight text-slate-800" id="signin-heading">Sign in</h2>
                <p class="mt-0 text-sm leading-6 text-slate-500">Account access will be available after authentication is implemented.</p>

                <form class="mt-6" data-unavailable-signin>
                    <div class="grid gap-4">
                        <div>
                            <label class="form-label" for="signin-email">Email address</label>
                            <input class="form-control" id="signin-email" type="email" autocomplete="username" placeholder="name@example.com" disabled>
                        </div>
                        <div>
                            <label class="form-label" for="signin-password">Password</label>
                            <input class="form-control" id="signin-password" type="password" autocomplete="current-password" placeholder="Authentication not configured" disabled>
                        </div>
                    </div>
                    <p class="mt-4 rounded-lg border border-[#e1e8e2] bg-[#f7f9f7] p-3 text-xs leading-5 text-slate-600" role="status">
                        Sign-in is currently unavailable. No credentials are requested or checked.
                    </p>
                    <button class="button mt-2 w-full cursor-not-allowed opacity-60" type="button" disabled>Sign-in unavailable</button>
                </form>

                <p class="mb-0 mt-5 text-xs leading-5 text-slate-500">Public information pages can be viewed without an account. Workspace pages do not provide access control.</p>
                <a class="button button--secondary mt-5 w-full" href="{{ route('tracking.show') }}">Check tracking availability</a>
            </section>
        </div>
    </div>
@endsection
