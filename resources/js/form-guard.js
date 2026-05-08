const recaptchaSiteKeyMeta = document.querySelector('meta[name="recaptcha-site-key"]');
const recaptchaSiteKey = recaptchaSiteKeyMeta ? recaptchaSiteKeyMeta.getAttribute('content') : '';

const setupProtectedForm = (form) => {
    const recaptchaAction = form.dataset.recaptchaAction || '';
    const recaptchaTokenInput = form.querySelector('[data-recaptcha-token]');
    const formStartedAtInput = form.querySelector('[data-form-started-at]');
    const submitButton = form.querySelector('[data-form-submit]');
    const submittingText = submitButton ? (submitButton.dataset.submittingText || '') : '';

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
            return;
        }

        event.preventDefault();
        recaptchaExecuting = true;

        window.grecaptcha.ready(() => {
            window.grecaptcha.execute(recaptchaSiteKey, { action: recaptchaAction })
                .then((token) => {
                    recaptchaExecuting = false;
                    recaptchaTokenInput.value = token;
                    form.submit();
                })
                .catch(() => {
                    recaptchaExecuting = false;
                    isSubmitting = false;
                    if (submitButton) {
                        submitButton.disabled = false;
                        submitButton.classList.remove('opacity-70', 'cursor-not-allowed');
                        if (submittingText && originalText) {
                            submitButton.textContent = originalText;
                        }
                    }
                    alert('Ошибка проверки безопасности. Пожалуйста, попробуйте еще раз.');
                });
        });
    });
};

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-protected-form]').forEach((form) => setupProtectedForm(form));
});
