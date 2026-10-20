@extends('layouts.app')

@section('title', 'Demo sign in | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-6xl px-5 py-10 sm:px-8 lg:py-16">
        @include('partials.demo-notice')
        <div class="mx-auto mt-8 grid max-w-4xl overflow-hidden rounded-2xl border border-[#e1e8e2] bg-white shadow-[0_12px_35px_rgb(24_52_36_/_6%)] md:grid-cols-[.85fr_1.15fr]">
            <aside class="hidden flex-col justify-between bg-[#164b32] p-8 text-white md:flex">
                <div>
                    <span class="eyebrow text-[#e7cf80]">Explore the prototype</span>
                    <h1 class="mt-3 text-3xl font-bold tracking-tight">Choose a demo experience.</h1>
                    <p class="mt-4 text-sm leading-7 text-white/75">Preview the student, registrar, and administrator screens using fictional records.</p>
                </div>
                <p class="mb-0 mt-12 text-xs leading-6 text-white/65">This is not a real login. No account is created and no credentials are checked.</p>
            </aside>

            <section class="p-6 sm:p-9">
                <a class="text-xs font-semibold text-[#164b32] no-underline hover:underline" href="{{ route('home') }}">← Back to home</a>
                <h2 class="mb-1 mt-6 text-2xl font-bold tracking-tight text-slate-800">Demo sign in</h2>
                <p class="mt-0 text-sm text-slate-500">Select a role to explore the matching screens.</p>

                <form class="mt-6" data-demo-signin>
                    <fieldset class="m-0 border-0 p-0">
                        <legend class="form-label mb-3">Choose a demo role</legend>
                        <div class="grid gap-2">
                            <label class="role-option">
                                <input type="radio" name="demo-role" value="student" data-url="{{ route('student.dashboard') }}" checked>
                                <span class="role-icon" aria-hidden="true">ST</span>
                                <span><strong class="block text-sm text-slate-800">Student</strong><span class="mt-1 block text-xs text-slate-500">Apply and check status</span></span>
                            </label>
                            <label class="role-option">
                                <input type="radio" name="demo-role" value="registrar" data-url="{{ route('registrar.dashboard') }}">
                                <span class="role-icon" aria-hidden="true">RS</span>
                                <span><strong class="block text-sm text-slate-800">Registrar staff</strong><span class="mt-1 block text-xs text-slate-500">Review applications</span></span>
                            </label>
                            <label class="role-option">
                                <input type="radio" name="demo-role" value="administrator" data-url="{{ route('admin.dashboard') }}">
                                <span class="role-icon" aria-hidden="true">AD</span>
                                <span><strong class="block text-sm text-slate-800">Administrator</strong><span class="mt-1 block text-xs text-slate-500">View admin concepts</span></span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="demo-divider my-5">visual-only fields</div>
                    <div class="grid gap-4">
                        <div>
                            <label class="form-label" for="demo-email">Email address</label>
                            <input class="form-control" id="demo-email" type="email" placeholder="demo@example.test" autocomplete="off" aria-describedby="credentials-note">
                        </div>
                        <div>
                            <label class="form-label" for="demo-password">Password</label>
                            <div class="relative">
                                <input class="form-control pr-16" id="demo-password" type="password" placeholder="Not required for demo" autocomplete="new-password" aria-describedby="credentials-note">
                                <button class="absolute inset-y-0 right-2 my-auto h-8 rounded px-2 text-xs font-bold text-[#164b32]" type="button" data-toggle-password aria-controls="demo-password" aria-pressed="false">Show</button>
                            </div>
                        </div>
                    </div>
                    <p class="field-hint mt-3" id="credentials-note">Do not enter a real password. These fields are never read, submitted, or sent anywhere.</p>
                    <button class="button mt-5 w-full" type="submit">Continue in demo mode <span aria-hidden="true">→</span></button>
                </form>
                <p class="mb-0 mt-5 text-center text-xs text-slate-500">No authentication or access control is implemented in this prototype.</p>
            </section>
        </div>
    </div>
@endsection
