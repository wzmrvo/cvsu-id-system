@extends('layouts.app')

@section('title', 'Apply for an ID | CvSU Student ID Services')

@section('content')
    <div class="mx-auto max-w-5xl px-5 py-8 sm:px-8">
        <div class="mt-8">
            <a class="text-xs font-semibold text-[#164b32] no-underline hover:underline" href="{{ route('student.dashboard') }}">← Student overview</a>
            <div class="mt-5">
                <span class="eyebrow">Student ID application</span>
                <h1 class="page-title mb-0 mt-2">Share your details</h1>
                <p class="page-subtitle mb-0 mt-2">Online application submission is currently unavailable. Please contact the Registrar for application requirements.</p>
            </div>
        </div>

        <form class="surface-card mt-6 p-5 sm:p-8" data-application-form novalidate>
            <p class="mb-5 rounded-lg border border-[#e1e8e2] bg-[#f7f9f7] p-3 text-xs leading-5 text-slate-600" data-form-error role="alert" hidden>
                Please review the highlighted fields before continuing.
            </p>
            <div data-application-fields>
                <div class="flex items-center justify-between gap-4 border-b border-[#edf0ed] pb-5">
                    <div><h2 class="m-0 text-lg font-bold text-slate-800">Student information</h2><p class="mb-0 mt-1 text-xs text-slate-500">Fields marked with * are required.</p></div>
                    <span class="rounded-full bg-[#eaf3ed] px-3 py-1.5 text-[10px] font-bold text-[#164b32]">Step 1 of 2</span>
                </div>

                <div class="mt-6 grid gap-x-5 gap-y-4 sm:grid-cols-2">
                    <div>
                        <label class="form-label" for="student-number">Student number *</label>
                        <input class="form-control" id="student-number" type="text" required maxlength="30" autocomplete="off" aria-describedby="student-number-error">
                        <p class="field-error" id="student-number-error" data-error-for="student-number"></p>
                    </div>
                    <div>
                        <label class="form-label" for="full-name">Full name *</label>
                        <input class="form-control" id="full-name" type="text" required maxlength="120" autocomplete="off" aria-describedby="full-name-error">
                        <p class="field-error" id="full-name-error" data-error-for="full-name"></p>
                    </div>
                    <div>
                        <label class="form-label" for="college">College or department *</label>
                        <input class="form-control" id="college" type="text" required maxlength="120" autocomplete="off" aria-describedby="college-error">
                        <p class="field-error" id="college-error" data-error-for="college"></p>
                    </div>
                    <div>
                        <label class="form-label" for="program">Course or program *</label>
                        <input class="form-control" id="program" type="text" required maxlength="120" autocomplete="off" aria-describedby="program-error">
                        <p class="field-error" id="program-error" data-error-for="program"></p>
                    </div>
                    <div>
                        <label class="form-label" for="year-level">Year level *</label>
                        <select class="form-control" id="year-level" required aria-describedby="year-level-error">
                            <option value="">Select year</option>
                            <option>1st year</option><option>2nd year</option><option>3rd year</option><option>4th year</option><option>Other</option>
                        </select>
                        <p class="field-error" id="year-level-error" data-error-for="year-level"></p>
                    </div>
                    <div>
                        <label class="form-label" for="student-email">Email address *</label>
                        <input class="form-control" id="student-email" type="email" required maxlength="120" autocomplete="off" aria-describedby="student-email-error">
                        <p class="field-error" id="student-email-error" data-error-for="student-email"></p>
                    </div>
                    <div>
                        <label class="form-label" for="contact-number">Contact number *</label>
                        <input class="form-control" id="contact-number" type="tel" required pattern="[0-9+][0-9 ]{6,19}" maxlength="20" autocomplete="off" aria-describedby="contact-number-error">
                        <p class="field-error" id="contact-number-error" data-error-for="contact-number"></p>
                    </div>
                    <div class="sm:col-span-2">
                        <label class="form-label" for="student-photo">Photo for preview (optional)</label>
                        <div class="flex flex-wrap items-center gap-4 rounded-xl border border-dashed border-[#cbd8cd] bg-[#fafcfa] p-4">
                            <div class="photo-preview" data-photo-preview aria-label="No photo selected">Photo preview</div>
                            <div class="min-w-0 flex-1">
                                <input class="form-control max-w-md" id="student-photo" type="file" accept="image/png,image/jpeg">
                                <p class="field-hint">The selected photo stays on this device and is not uploaded. Confirm photo requirements with the Registrar.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <fieldset class="mt-6 rounded-xl border border-[#e1e8e2] bg-[#f8faf8] p-4">
                    <legend class="px-1 text-xs font-bold text-slate-800">Review reminders</legend>
                    <label class="flex cursor-pointer items-start gap-2 text-xs leading-5 text-slate-600">
                        <input class="mt-1 accent-[#164b32]" id="local-review-confirmation" type="checkbox" required aria-describedby="local-review-error">
                        <span>I understand that application submission is currently unavailable.</span>
                    </label>
                    <p class="field-error" id="local-review-error" data-error-for="local-review-confirmation"></p>
                    <label class="mt-3 flex cursor-pointer items-start gap-2 text-xs leading-5 text-slate-600">
                        <input class="mt-1 accent-[#164b32]" id="requirements-confirmation" type="checkbox" required aria-describedby="requirements-confirmation-error">
                        <span>I understand the final requirements and photo specifications must be confirmed by the Registrar.</span>
                    </label>
                    <p class="field-error" id="requirements-confirmation-error" data-error-for="requirements-confirmation"></p>
                </fieldset>

                <div class="mt-6 flex flex-wrap justify-end gap-3">
                    <a class="button button--secondary" href="{{ route('student.dashboard') }}">Cancel</a>
                    <button class="button" type="button" data-review-application>Review details <span aria-hidden="true">→</span></button>
                </div>
            </div>

            <section class="pt-1" data-application-review hidden aria-labelledby="review-heading">
                <span class="rounded-full bg-[#eaf3ed] px-3 py-1.5 text-[10px] font-bold text-[#164b32]">Step 2 of 2</span>
                <h2 class="mb-1 mt-5 text-xl font-bold text-slate-800" id="review-heading">Review entered details</h2>
                <p class="mt-0 text-sm leading-6 text-slate-500">Check the information entered on this device. You can return to the form to make changes.</p>
                <dl class="mt-5 grid gap-3 rounded-xl bg-[#f7f9f7] p-5 sm:grid-cols-2">
                    <div><dt class="text-xs text-slate-500">Student number</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800" data-review-value="student-number"></dd></div>
                    <div><dt class="text-xs text-slate-500">Full name</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800" data-review-value="full-name"></dd></div>
                    <div><dt class="text-xs text-slate-500">College / department</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800" data-review-value="college"></dd></div>
                    <div><dt class="text-xs text-slate-500">Program and year</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800"><span data-review-value="program"></span> · <span data-review-value="year-level"></span></dd></div>
                    <div><dt class="text-xs text-slate-500">Email</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800" data-review-value="student-email"></dd></div>
                    <div><dt class="text-xs text-slate-500">Contact number</dt><dd class="mb-0 mt-1 text-sm font-bold text-slate-800" data-review-value="contact-number"></dd></div>
                </dl>
                <p class="mt-4 rounded-lg border border-[#eadba7] bg-[#fffaf0] p-3 text-xs leading-5 text-[#66531c]">Application submission is not available yet. No information or photo will be uploaded or saved.</p>
                <div class="mt-6 flex flex-wrap justify-end gap-3">
                    <button class="button button--secondary" type="button" data-edit-application>← Return to form</button>
                    <button class="button cursor-not-allowed opacity-60" type="button" disabled>Online submission unavailable</button>
                </div>
            </section>
        </form>
    </div>
@endsection
