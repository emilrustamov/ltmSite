import { showToast } from "./toast.js";

const recaptchaSiteKeyMeta = document.querySelector('meta[name="recaptcha-site-key"]');
const recaptchaSiteKey = recaptchaSiteKeyMeta ? recaptchaSiteKeyMeta.getAttribute('content') : '';

const getCsrfToken = () => {
    const tokenMeta = document.querySelector('meta[name="csrf_token"]');
    return tokenMeta ? tokenMeta.getAttribute('content') : '';
};

const clearFormErrors = (form) => {
    form.querySelectorAll('[data-form-error]').forEach((node) => node.remove());
    form.querySelectorAll('.border-red-500').forEach((field) => field.classList.remove('border-red-500'));
};

const setFormMessage = (form, text, isError) => {
    if (text) {
        showToast(text, isError);
    }
};

const clearFormMessage = (form) => {
    form.querySelectorAll('[data-form-feedback]').forEach((node) => node.remove());
};

const renderFieldErrors = (form, errors) => {
    const toBracketNotation = (fieldName) => {
        if (!fieldName.includes('.')) {
            return fieldName;
        }

        const parts = fieldName.split('.');
        return `${parts[0]}${parts.slice(1).map((part) => `[${part}]`).join('')}`;
    };

    const resolveField = (fieldName) => {
        const candidates = [fieldName, `${fieldName}[]`, toBracketNotation(fieldName)];
        for (const candidate of candidates) {
            const field = form.querySelector(`[name="${candidate}"]`);
            if (field) {
                return field;
            }
        }

        return null;
    };

    Object.entries(errors).forEach(([fieldName, messages]) => {
        const field = resolveField(fieldName);
        if (!field) {
            return;
        }

        field.classList.add('border-red-500');
        const errorNode = document.createElement('div');
        errorNode.setAttribute('data-form-error', 'true');
        errorNode.className = 'text-red-400 text-sm mt-2';
        errorNode.textContent = Array.isArray(messages) ? messages[0] : String(messages);
        field.insertAdjacentElement('afterend', errorNode);
    });
};

const submitAjaxForm = async (form) => {
    const formData = new FormData(form);
    const parsedUrl = new URL(form.action, window.location.href);
    const submitUrl = parsedUrl.origin === window.location.origin
        ? parsedUrl.toString()
        : `${window.location.origin}${parsedUrl.pathname}${parsedUrl.search}`;

    if (submitUrl !== parsedUrl.toString()) {
        console.warn('[form-guard] Cross-origin form action detected, using same-origin fallback URL', {
            id: form.id || null,
            originalAction: parsedUrl.toString(),
            fallbackAction: submitUrl,
        });
    }

    console.info('[form-guard] AJAX submit started', { id: form.id || null, action: submitUrl });

    const controller = new AbortController();
    const timeoutId = window.setTimeout(() => controller.abort(), 15000);
    let response;
    try {
        response = await fetch(submitUrl, {
        method: form.method || 'POST',
        body: formData,
        credentials: 'same-origin',
        signal: controller.signal,
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': getCsrfToken(),
        },
    });
    } catch (error) {
        window.clearTimeout(timeoutId);
        if (error.name === 'AbortError') {
            throw new Error('Сервер не ответил вовремя. Попробуйте еще раз.');
        }
        throw new Error('Не удалось отправить форму. Проверьте интернет или домен сайта.');
    }
    window.clearTimeout(timeoutId);

    let payload = {};
    try {
        payload = await response.json();
    } catch (error) {
        payload = {};
    }

    if (!response.ok) {
        console.warn('[form-guard] AJAX submit failed', { id: form.id || null, status: response.status, payload });
        const requestError = new Error(payload.message || 'Ошибка при отправке формы. Попробуйте еще раз.');
        requestError.status = response.status;
        requestError.payload = payload;
        throw requestError;
    }

    console.info('[form-guard] AJAX submit success', { id: form.id || null, status: response.status, payload });
    return payload;
};

const setupProtectedForm = (form) => {
    const recaptchaAction = form.dataset.recaptchaAction || '';
    const recaptchaTokenInput = form.querySelector('[data-recaptcha-token]');
    const formStartedAtInput = form.querySelector('[data-form-started-at]');
    const submitButton = form.querySelector('[data-form-submit]');
    const submittingText = submitButton ? (submitButton.dataset.submittingText || '') : '';
    const ajaxSubmitEnabled = form.dataset.ajaxSubmit === 'true';
    const preferredCheckboxes = form.querySelectorAll('[data-preferred-contact]');
    const preferredSections = form.querySelectorAll('[data-contact-field]');
    let updatePreferredSections = null;

    if (preferredCheckboxes.length > 0 && preferredSections.length > 0) {
        updatePreferredSections = () => {
            const selected = Array.from(preferredCheckboxes)
                .filter((item) => item.checked)
                .map((item) => item.value);

            preferredSections.forEach((section) => {
                const sectionType = section.getAttribute('data-contact-field');
                const shouldShow = selected.includes(sectionType);
                section.classList.toggle('hidden', !shouldShow);
                const input = section.querySelector('input');
                if (input) {
                    input.required = shouldShow;
                }
            });

            preferredCheckboxes.forEach((checkbox) => {
                const parentItem = checkbox.closest('[data-preferred-item]');
                if (parentItem) {
                    parentItem.classList.toggle('is-active', checkbox.checked);
                }
            });
        };

        preferredCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', updatePreferredSections);
        });
        updatePreferredSections();
    }

    if (formStartedAtInput && !formStartedAtInput.value) {
        formStartedAtInput.value = String(Math.floor(Date.now() / 1000));
    }

    let isSubmitting = false;
    let recaptchaExecuting = false;
    let originalText = '';

    form.addEventListener('submit', (event) => {
        if (isSubmitting || recaptchaExecuting) {
            event.preventDefault();
            return;
        }

        clearFormErrors(form);
        clearFormMessage(form);
        isSubmitting = true;

        if (submitButton) {
            originalText = originalText || submitButton.textContent;
            submitButton.disabled = true;
            submitButton.classList.add('opacity-70', 'cursor-not-allowed');
            if (submittingText) {
                submitButton.textContent = submittingText;
            }
        }

        if (typeof window.grecaptcha === 'undefined' || !recaptchaSiteKey || !recaptchaAction || !recaptchaTokenInput) {
            if (ajaxSubmitEnabled) {
                event.preventDefault();
                submitAjaxForm(form)
                    .then((payload) => {
                        setFormMessage(form, payload.message || 'Форма отправлена успешно.', false);
                        form.reset();
                        if (formStartedAtInput) {
                            formStartedAtInput.value = String(Math.floor(Date.now() / 1000));
                        }
                        if (updatePreferredSections) {
                            updatePreferredSections();
                        }
                        restoreSubmitState();
                    })
                    .catch((error) => {
                        console.error('[form-guard] submit error (no recaptcha)', { id: form.id || null, error });
                        if (error.status === 422 && error.payload && error.payload.errors) {
                            renderFieldErrors(form, error.payload.errors);
                            setFormMessage(form, error.payload.message || 'Проверьте корректность заполнения формы.', true);
                        } else {
                            setFormMessage(form, error.message || 'Ошибка при отправке формы. Попробуйте еще раз.', true);
                        }
                        restoreSubmitState();
                    });
            }
            return;
        }

        event.preventDefault();
        recaptchaExecuting = true;

        function restoreSubmitState() {
            isSubmitting = false;
            if (submitButton) {
                submitButton.disabled = false;
                submitButton.classList.remove('opacity-70', 'cursor-not-allowed');
                if (submittingText && originalText) {
                    submitButton.textContent = originalText;
                }
            }
        }

        window.grecaptcha.ready(async () => {
            try {
                const token = await window.grecaptcha.execute(recaptchaSiteKey, { action: recaptchaAction });
                recaptchaExecuting = false;
                recaptchaTokenInput.value = token;

                if (!ajaxSubmitEnabled) {
                    form.submit();
                    return;
                }

                const payload = await submitAjaxForm(form);
                setFormMessage(form, payload.message || 'Форма отправлена успешно.', false);
                form.reset();
                if (formStartedAtInput) {
                    formStartedAtInput.value = String(Math.floor(Date.now() / 1000));
                }
                if (recaptchaTokenInput) {
                    recaptchaTokenInput.value = '';
                }
                if (updatePreferredSections) {
                    updatePreferredSections();
                }
                restoreSubmitState();
            } catch (error) {
                recaptchaExecuting = false;
                restoreSubmitState();
                console.error('[form-guard] submit error (with recaptcha)', { id: form.id || null, error });

                if (error.status === 422 && error.payload && error.payload.errors) {
                    renderFieldErrors(form, error.payload.errors);
                    setFormMessage(form, error.payload.message || 'Проверьте корректность заполнения формы.', true);
                    return;
                }

                setFormMessage(form, error.message || 'Ошибка при отправке формы. Попробуйте еще раз.', true);
            }
        });
    });
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-protected-form]').forEach((form) => setupProtectedForm(form));
});
