@extends('layouts.app')

@section('title', 'Track an application | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-5xl px-5 py-8 sm:px-8">
        <section class="mx-auto mt-8 max-w-3xl text-center">
            <span class="eyebrow">Application tracking</span>
            <h1 class="page-title mb-0 mt-2">Track an application</h1>
            <p class="page-subtitle mx-auto mb-0 mt-3">Online application status tracking is currently unavailable. Contact the Registrar for an update.</p>
        </section>

        <aside class="surface-card mx-auto mt-6 max-w-3xl rounded-xl border-l-4 border-[#c6a23a] p-5 sm:p-6" role="status">
            <h2 class="m-0 text-base font-bold text-slate-800">Need an application update?</h2>
            <p class="mb-0 mt-2 text-sm leading-6 text-slate-600">Please contact the Registrar. Online tracking is not available at this time.</p>
        </aside>

        <section class="surface-card mx-auto mt-6 max-w-3xl p-5 sm:p-7" aria-labelledby="process-overview-heading">
            <div class="border-b border-[#edf0ed] pb-5">
                <p class="m-0 text-[10px] font-bold uppercase tracking-[.1em] text-slate-500">Application process</p>
                <h2 class="mb-0 mt-1 text-xl font-bold text-slate-800" id="process-overview-heading">What to expect</h2>
                <p class="mb-0 mt-2 text-xs leading-5 text-slate-500">For an update on your application, contact the Registrar.</p>
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
                ID production and signature capture remain separate Registrar processes using the university’s existing tools.
            </p>
        </section>
    </div>
@endsection
