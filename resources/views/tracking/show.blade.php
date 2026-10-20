@extends('layouts.app')

@section('title', 'Track an application | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-5xl px-5 py-8 sm:px-8">
        <section class="mx-auto mt-8 max-w-3xl text-center">
            <span class="eyebrow">Application tracking</span>
            <h1 class="page-title mb-0 mt-2">Track an application</h1>
            <p class="page-subtitle mx-auto mb-0 mt-3">Application records are not connected to this interface, so a status cannot be retrieved here.</p>
        </section>

        <form class="surface-card mx-auto mt-6 flex max-w-3xl flex-col gap-3 p-4 sm:flex-row sm:p-5" data-tracking-form novalidate>
            <div class="flex-1">
                <label class="sr-only" for="tracking-number">Application reference</label>
                <input
                    class="form-control"
                    id="tracking-number"
                    type="text"
                    maxlength="40"
                    pattern="[A-Za-z0-9]+(-[A-Za-z0-9]+)*"
                    placeholder="Enter an application reference"
                    autocomplete="off"
                    aria-describedby="tracking-help tracking-message"
                    required
                >
                <p class="field-hint mb-0" id="tracking-help">Do not enter a real student number. No search is performed or sent from this page.</p>
            </div>
            <button class="button shrink-0 self-start sm:self-auto" type="submit">Check availability</button>
        </form>
        <p class="mx-auto mt-3 max-w-3xl text-sm font-semibold text-slate-600" id="tracking-message" data-tracking-message role="status" aria-live="polite" hidden></p>

        <section class="surface-card mx-auto mt-6 max-w-3xl p-5 sm:p-7" aria-labelledby="process-overview-heading">
            <div class="border-b border-[#edf0ed] pb-5">
                <p class="m-0 text-[10px] font-bold uppercase tracking-[.1em] text-slate-500">Process overview</p>
                <h2 class="mb-0 mt-1 text-xl font-bold text-slate-800" id="process-overview-heading">Typical application stages</h2>
                <p class="mb-0 mt-2 text-xs leading-5 text-slate-500">These are general workflow stages, not the progress of an individual application.</p>
            </div>

            <ol class="mt-6 grid gap-4 sm:grid-cols-2">
                @foreach ([
                    'Application submitted',
                    'Registrar review and any requested corrections',
                    'In-person verification and appointment',
                    'Production using the university’s existing tools',
                    'Release instructions provided by registrar staff',
                ] as $stage)
                    <li class="flex items-start gap-3 rounded-xl bg-[#f7f9f7] p-4">
                        <span class="grid h-7 w-7 shrink-0 place-items-center rounded-full border border-[#cbd8cd] bg-white text-xs font-bold text-[#164b32]" aria-hidden="true">{{ $loop->iteration }}</span>
                        <span class="pt-1 text-xs font-semibold leading-5 text-slate-700">{{ $stage }}</span>
                    </li>
                @endforeach
            </ol>

            <p class="mb-0 mt-5 rounded-lg border border-[#eadba7] bg-[#fffaf0] p-3 text-xs leading-5 text-[#66531c]">
                This system is not connected to student records, appointment scheduling, or the university’s separate ID production software, signature-capture device, and printer.
            </p>
        </section>
        <div class="mx-auto mt-5 max-w-3xl text-center">
            <a class="text-xs font-semibold text-[#164b32] no-underline hover:underline" href="{{ route('demo.sign-in') }}">Sign-in availability and account access →</a>
        </div>
    </div>
@endsection
