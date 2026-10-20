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
const siteLinks = [...document.querySelectorAll('[data-site-link]')];

menuToggle?.addEventListener('click', () => {
    const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

    menuToggle.setAttribute('aria-expanded', String(!isOpen));
    menuToggle.setAttribute('aria-label', isOpen ? 'Open navigation menu' : 'Close navigation menu');
    menuPanel?.classList.toggle('is-open', !isOpen);
});

function updateSiteNavigation() {
    siteLinks.forEach((link) => {
        const target = new URL(link.href);
        const isCurrentPage = target.pathname === window.location.pathname
            && (!target.hash || target.hash === window.location.hash);

        link.classList.toggle('is-active', isCurrentPage);

        if (isCurrentPage) {
            link.setAttribute('aria-current', target.hash ? 'location' : 'page');
        } else {
            link.removeAttribute('aria-current');
        }
    });
}

updateSiteNavigation();
window.addEventListener('hashchange', updateSiteNavigation);

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

const applicationForm = document.querySelector('[data-application-form]');

if (applicationForm instanceof HTMLFormElement) {
    const fieldsPanel = applicationForm.querySelector('[data-application-fields]');
    const reviewPanel = applicationForm.querySelector('[data-application-review]');
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

    applicationForm.addEventListener('submit', (event) => {
        event.preventDefault();
        showToast('Application submission is unavailable. Nothing was sent or saved.');
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
            image.alt = 'Selected photo preview';
            photoPreview.replaceChildren(image);
            photoPreview.setAttribute('aria-label', 'Selected photo preview');
        });

        reader.addEventListener('error', () => {
            showToast('The selected image could not be previewed in this browser.');
        });

        reader.readAsDataURL(file);
    });
}

const workspaceLinks = [...document.querySelectorAll('[data-workspace-link]')];

function updateWorkspaceNavigation() {
    const currentHash = window.location.hash;

    if (!currentHash || workspaceLinks.length === 0) {
        return;
    }

    const matchingLink = workspaceLinks.find((link) => new URL(link.href).hash === currentHash);

    if (!matchingLink) {
        return;
    }

    workspaceLinks.forEach((link) => {
        const isCurrent = link === matchingLink;
        link.classList.toggle('is-active', isCurrent);

        if (isCurrent) {
            link.setAttribute('aria-current', 'location');
        } else {
            link.removeAttribute('aria-current');
        }
    });
}

updateWorkspaceNavigation();
window.addEventListener('hashchange', updateWorkspaceNavigation);
