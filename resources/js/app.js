const toast = document.querySelector('[data-toast]');
let toastTimer;

function showToast(message) {
    if (!toast) {
        return;
    }

    toast.textContent = message;
    toast.classList.add('is-visible');
    window.clearTimeout(toastTimer);
    toastTimer = window.setTimeout(() => {
        toast.classList.remove('is-visible');
    }, 3200);
}

const menuToggle = document.querySelector('[data-menu-toggle]');
const menuPanel = document.querySelector('[data-menu-panel]');

menuToggle?.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Open navigation menu' : 'Close navigation menu');
    menuPanel?.classList.toggle('is-open', !isOpen);
});

menuPanel?.addEventListener('click', (event) => {
    if (event.target.closest('a') && menuToggle) {
        menuPanel.classList.remove('is-open');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Open navigation menu');
    }
});

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && menuToggle?.getAttribute('aria-expanded') === 'true') {
        menuPanel?.classList.remove('is-open');
        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.setAttribute('aria-label', 'Open navigation menu');
        menuToggle.focus();
    }
});

document.querySelectorAll('[data-toggle-password]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.getAttribute('aria-controls'));

        if (!(input instanceof HTMLInputElement)) {
            return;
        }

        const shouldShow = input.type === 'password';
        input.type = shouldShow ? 'text' : 'password';
        button.textContent = shouldShow ? 'Hide' : 'Show';
        button.setAttribute('aria-pressed', String(shouldShow));
    });
});

document.querySelector('[data-demo-signin]')?.addEventListener('submit', (event) => {
    event.preventDefault();

    const selectedRole = event.currentTarget.querySelector('input[name="demo-role"]:checked');

    if (selectedRole instanceof HTMLInputElement && selectedRole.dataset.url) {
        window.location.assign(selectedRole.dataset.url);
    }
});

const applicationForm = document.querySelector('[data-demo-application]');

if (applicationForm instanceof HTMLFormElement) {
    const fieldsPanel = applicationForm.querySelector('[data-application-fields]');
    const reviewPanel = applicationForm.querySelector('[data-application-review]');
    const confirmationPanel = applicationForm.querySelector('[data-application-confirmation]');
    const errorSummary = applicationForm.querySelector('[data-form-error]');
    const photoInput = applicationForm.querySelector('#student-photo');
    const photoPreview = applicationForm.querySelector('[data-photo-preview]');
    const requiredFields = [...applicationForm.querySelectorAll('[required]')];

    function getFieldError(field) {
        if (field.validity.valueMissing) {
            return field.type === 'checkbox'
                ? 'Please confirm this item to continue.'
                : 'This field is required.';
        }

        if (field.validity.typeMismatch && field.type === 'email') {
            return 'Enter a valid email address.';
        }

        if (field.validity.patternMismatch && field.id === 'contact-number') {
            return 'Enter 7–20 digits or spaces, optionally starting with +.';
        }

        if (field.validity.tooLong) {
            return 'This value is longer than allowed.';
        }

        return '';
    }

    function validateField(field) {
        const message = getFieldError(field);
        const error = applicationForm.querySelector(`[data-error-for="${field.id}"]`);

        field.setAttribute('aria-invalid', String(Boolean(message)));

        if (error) {
            error.textContent = message;
        }

        return message === '';
    }

    function validateApplication() {
        const invalidFields = requiredFields.filter((field) => !validateField(field));

        errorSummary.hidden = invalidFields.length === 0;
        invalidFields[0]?.focus();

        return invalidFields.length === 0;
    }

    requiredFields.forEach((field) => {
        field.addEventListener('input', () => {
            validateField(field);

            if (requiredFields.every((requiredField) => requiredField.validity.valid)) {
                errorSummary.hidden = true;
            }
        });
        field.addEventListener('change', () => {
            validateField(field);

            if (requiredFields.every((requiredField) => requiredField.validity.valid)) {
                errorSummary.hidden = true;
            }
        });
    });

    applicationForm.querySelector('[data-review-application]')?.addEventListener('click', () => {
        if (!validateApplication()) {
            return;
        }

        applicationForm.querySelectorAll('[data-review-value]').forEach((value) => {
            const field = applicationForm.querySelector(`#${value.dataset.reviewValue}`);

            if (field instanceof HTMLInputElement || field instanceof HTMLSelectElement) {
                value.textContent = field.value;
            }
        });

        reviewPanel.hidden = false;
        fieldsPanel.hidden = true;
        reviewPanel.querySelector('[data-edit-application]')?.focus();
    });

    applicationForm.querySelector('[data-edit-application]')?.addEventListener('click', () => {
        reviewPanel.hidden = true;
        fieldsPanel.hidden = false;
        applicationForm.querySelector('#student-number')?.focus();
    });

    applicationForm.querySelector('[data-submit-demo-application]')?.addEventListener('click', () => {
        fieldsPanel.hidden = true;
        reviewPanel.hidden = true;
        confirmationPanel.hidden = false;
        confirmationPanel.querySelector('h2')?.focus();
    });

    applicationForm.addEventListener('submit', (event) => {
        event.preventDefault();
        showToast('The demo form does not send or save application data.');
    });

    photoInput?.addEventListener('change', () => {
        const file = photoInput.files?.[0];

        if (!file || !(photoPreview instanceof HTMLElement)) {
            return;
        }

        if (!['image/jpeg', 'image/png'].includes(file.type) || file.size > 4 * 1024 * 1024) {
            photoInput.value = '';
            photoPreview.replaceChildren(document.createTextNode('Photo preview'));
            photoPreview.setAttribute('aria-label', 'No photo selected');
            showToast('Choose a PNG or JPEG image up to 4 MB for this local preview.');
            return;
        }

        const reader = new FileReader();

        reader.addEventListener('load', () => {
            if (typeof reader.result !== 'string') {
                showToast('The selected image could not be previewed in this browser.');
                return;
            }

            const image = document.createElement('img');
            image.src = reader.result;
            image.alt = 'Selected fictional demo photo preview';
            photoPreview.replaceChildren(image);
            photoPreview.setAttribute('aria-label', 'Selected photo preview');
        });

        reader.addEventListener('error', () => {
            showToast('The selected image could not be previewed in this browser.');
        });

        reader.readAsDataURL(file);
    });
}

const trackingForm = document.querySelector('[data-tracking-form]');

if (trackingForm instanceof HTMLFormElement) {
    const trackingInput = trackingForm.querySelector('#tracking-number');
    const trackingResult = document.querySelector('[data-tracking-result]');
    const trackingError = document.querySelector('[data-tracking-error]');
    const trackingStatus = document.querySelector('[data-tracking-status]');
    const trackingTimeline = document.querySelector('[data-tracking-timeline]');
    const nextStep = document.querySelector('[data-next-step]');
    const appointmentDetail = document.querySelector('[data-appointment-detail]');
    const trackingName = document.querySelector('[data-tracking-name]');
    const trackingTitle = document.querySelector('#tracking-result-title');
    const timelineSteps = ['Application submitted', 'Information under review', 'Appointment scheduled', 'ID processing', 'Ready for claiming'];
    const records = new Map([
        ['DEMO-2026-0142', {
            name: 'Andrea Demo Student · Fictional record',
            status: 'Under review',
            step: 1,
            date: 'October 16, 2026',
            appointmentNote: 'Waiting for staff review.',
            next: 'Wait for the registrar staff review. An appointment is not confirmed yet.',
            appointment: 'Not scheduled in this demo record.',
        }],
        ['DEMO-2026-0138', {
            name: 'Jordan Sample Learner · Fictional record',
            status: 'Appointment scheduled',
            step: 2,
            date: 'October 17, 2026',
            appointmentNote: 'Example time only; confirm any real appointment with registrar staff.',
            next: 'Attend the example appointment and bring the information requested by staff. Identity checks happen in person.',
            appointment: 'Demo only: November 5, 2026 at 9:30 AM. This does not reserve an actual appointment.',
        }],
        ['DEMO-2026-0131', {
            name: 'Casey Fictional Student · Fictional record',
            status: 'Correction requested',
            step: 1,
            date: 'October 12, 2026',
            appointmentNote: 'An appointment is not scheduled while corrections are pending.',
            next: 'Review the correction request with registrar staff and update the application when that workflow is available. This prototype cannot submit corrections.',
            appointment: 'Not scheduled while corrections are pending.',
        }],
    ]);

    function makeStatusBadge(status) {
        const badge = document.createElement('span');
        const style = {
            'Submitted': 'status-badge--blue',
            'Under review': 'status-badge--blue',
            'Correction requested': 'status-badge--amber',
            'Appointment scheduled': 'status-badge--green',
            'Appointment approved': 'status-badge--green',
            'ID processing': 'status-badge--green',
            'Ready for claiming': 'status-badge--gold',
        }[status] ?? 'status-badge--muted';

        badge.className = `status-badge ${style}`;
        badge.textContent = status;

        return badge;
    }

    function renderTrackingResult(applicationNumber) {
        const record = records.get(applicationNumber);

        if (!record) {
            trackingError.hidden = false;
            trackingError.textContent = 'No matching local demo record. Try DEMO-2026-0142 or DEMO-2026-0138.';
            trackingResult.hidden = true;
            return;
        }

        trackingError.hidden = true;
        trackingResult.hidden = false;
        trackingTitle.textContent = applicationNumber;
        trackingName.textContent = record.name;
        trackingStatus.replaceChildren(makeStatusBadge(record.status));
        nextStep.textContent = record.next;
        appointmentDetail.textContent = record.appointment;
        trackingTimeline.querySelector('[data-timeline-date]').textContent = record.date;
        trackingTimeline.querySelector('[data-appointment-note]').textContent = record.appointmentNote;

        trackingTimeline.querySelectorAll('.timeline-item').forEach((item, index) => {
            const dot = item.querySelector('.timeline-dot');
            const title = item.querySelector('p');

            dot.classList.toggle('is-done', index < record.step);
            dot.classList.toggle('is-current', index === record.step);

            if (title && index === 1 && record.status === 'Correction requested') {
                title.textContent = 'Correction requested';
            } else {
                title.textContent = timelineSteps[index];
            }
        });

        trackingTimeline.querySelector('[data-appointment-note]').textContent = record.appointmentNote;
    }

    trackingForm.addEventListener('submit', (event) => {
        event.preventDefault();
        renderTrackingResult(trackingInput.value.trim().toUpperCase());
    });
}

const applicationTable = document.querySelector('[data-application-table]');

if (applicationTable instanceof HTMLTableElement) {
    const applicationRows = [...applicationTable.querySelectorAll('[data-application-row]')];
    const searchInput = document.querySelector('[data-application-search]');
    const statusFilter = document.querySelector('[data-application-filter]');
    const emptyState = document.querySelector('[data-application-empty]');
    const detailName = document.querySelector('[data-detail-name]');
    const detailNumber = document.querySelector('[data-detail-number]');
    const detailProgram = document.querySelector('[data-detail-program]');
    const detailSubmitted = document.querySelector('[data-detail-submitted]');
    const detailStatus = document.querySelector('[data-detail-status]');
    let selectedRow = applicationRows[0];

    function makeStatusBadge(status) {
        const badge = document.createElement('span');
        const style = {
            'Submitted': 'status-badge--blue',
            'Under review': 'status-badge--blue',
            'Correction requested': 'status-badge--amber',
            'Appointment scheduled': 'status-badge--green',
            'Appointment approved': 'status-badge--green',
            'ID processing': 'status-badge--green',
            'Ready for claiming': 'status-badge--gold',
        }[status] ?? 'status-badge--muted';

        badge.className = `status-badge ${style}`;
        badge.textContent = status;

        return badge;
    }

    function selectApplication(row) {
        selectedRow = row;
        detailName.textContent = row.dataset.name;
        detailNumber.textContent = `${row.dataset.number} · Fictional record`;
        detailProgram.textContent = row.dataset.program;
        detailSubmitted.textContent = row.dataset.submitted;
        detailStatus.replaceChildren(makeStatusBadge(row.dataset.status));
    }

    function filterApplications() {
        const searchTerm = searchInput.value.trim().toLowerCase();
        const selectedStatus = statusFilter.value;
        let visibleRows = 0;

        applicationRows.forEach((row) => {
            const text = `${row.dataset.name} ${row.dataset.number} ${row.dataset.program}`.toLowerCase();
            const matchesSearch = text.includes(searchTerm);
            const matchesStatus = selectedStatus === '' || row.dataset.status === selectedStatus;
            const isVisible = matchesSearch && matchesStatus;

            row.hidden = !isVisible;
            visibleRows += Number(isVisible);
        });

        emptyState.hidden = visibleRows > 0;

        if (selectedRow.hidden && visibleRows > 0) {
            selectApplication(applicationRows.find((row) => !row.hidden));
        }
    }

    applicationTable.addEventListener('click', (event) => {
        const button = event.target.closest('[data-select-application]');

        if (button) {
            selectApplication(button.closest('[data-application-row]'));
        }
    });

    searchInput?.addEventListener('input', filterApplications);
    statusFilter?.addEventListener('change', filterApplications);

    document.querySelectorAll('[data-status-action]').forEach((button) => {
        button.addEventListener('click', () => {
            if (!selectedRow) {
                return;
            }

            const nextStatus = button.dataset.statusAction;
            selectedRow.dataset.status = nextStatus;
            selectedRow.querySelector('[data-row-status]').replaceChildren(makeStatusBadge(nextStatus));
            selectApplication(selectedRow);
            filterApplications();

            const message = nextStatus === 'Appointment scheduled'
                ? 'Demo appointment shown: November 5, 2026 at 9:30 AM. Nothing was booked.'
                : `Demo status changed to “${nextStatus}” on this page only.`;

            showToast(message);
        });
    });
}

const userTable = document.querySelector('[data-user-table]');

if (userTable instanceof HTMLTableElement) {
    const userFilter = document.querySelector('[data-user-filter]');
    const emptyState = document.querySelector('[data-users-empty]');

    function makeStatusBadge(status) {
        const badge = document.createElement('span');
        badge.className = `status-badge ${status === 'Active' ? 'status-badge--gold' : 'status-badge--muted'}`;
        badge.textContent = status;

        return badge;
    }

    function filterUsers() {
        const role = userFilter.value;
        const users = [...userTable.querySelectorAll('[data-user-row]')];
        let visibleUsers = 0;

        users.forEach((row) => {
            const isVisible = role === '' || row.dataset.role === role;
            row.hidden = !isVisible;
            visibleUsers += Number(isVisible);
        });

        emptyState.hidden = visibleUsers > 0;
    }

    userFilter?.addEventListener('change', filterUsers);

    userTable.addEventListener('change', (event) => {
        const roleSelect = event.target.closest('[data-user-role]');

        if (roleSelect) {
            const row = roleSelect.closest('[data-user-row]');
            row.dataset.role = roleSelect.value;
            filterUsers();
            showToast(`Demo role changed to ${roleSelect.value} on this page only.`);
        }
    });

    userTable.addEventListener('click', (event) => {
        const toggleButton = event.target.closest('[data-toggle-user]');

        if (!toggleButton) {
            return;
        }

        const row = toggleButton.closest('[data-user-row]');
        const statusHolder = row.querySelector('[data-user-status]');
        const isActive = toggleButton.dataset.active !== 'false';
        const nextStatus = isActive ? 'Inactive' : 'Active';

        toggleButton.dataset.active = String(!isActive);
        toggleButton.textContent = isActive ? 'Reactivate demo' : 'Deactivate demo';
        statusHolder.replaceChildren(makeStatusBadge(nextStatus));
        showToast(`Demo user marked ${nextStatus.toLowerCase()} on this page only.`);
    });

    document.querySelector('[data-add-demo-user]')?.addEventListener('click', () => {
        const row = document.createElement('tr');
        row.dataset.userRow = '';
        row.dataset.role = 'Student';

        const userCell = document.createElement('td');
        const userName = document.createElement('strong');
        userName.className = 'block text-xs text-slate-800';
        userName.textContent = 'New Fictional Demo User';
        const userEmail = document.createElement('span');
        userEmail.className = 'mt-1 block text-[10px] text-slate-500';
        userEmail.textContent = 'new.demo@example.test';
        userCell.append(userName, userEmail);

        const roleCell = document.createElement('td');
        const roleSelect = document.createElement('select');
        roleSelect.className = 'form-control !min-h-9 !max-w-44 !py-1.5';
        roleSelect.dataset.userRole = '';
        roleSelect.setAttribute('aria-label', 'Demo role for New Fictional Demo User');
        ['Student', 'Registrar Staff', 'Administrator'].forEach((role) => {
            const option = document.createElement('option');
            option.textContent = role;
            option.value = role;
            roleSelect.append(option);
        });
        roleCell.append(roleSelect);

        const statusCell = document.createElement('td');
        const statusHolder = document.createElement('span');
        statusHolder.dataset.userStatus = '';
        statusHolder.append(makeStatusBadge('Active'));
        statusCell.append(statusHolder);

        const actionCell = document.createElement('td');
        const toggleButton = document.createElement('button');
        toggleButton.type = 'button';
        toggleButton.className = 'button button--small button--secondary';
        toggleButton.dataset.toggleUser = '';
        toggleButton.textContent = 'Deactivate demo';
        actionCell.append(toggleButton);

        row.append(userCell, roleCell, statusCell, actionCell);
        userTable.querySelector('tbody').prepend(row);
        filterUsers();
        showToast('A fictional demo row was added locally. No account was created.');
    });
}

document.querySelector('[data-preview-settings]')?.addEventListener('click', () => {
    showToast('Settings are a visual preview only and are not saved.');
});
