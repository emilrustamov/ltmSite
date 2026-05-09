let toastContainer = null;

const getToastContainer = () => {
    if (toastContainer) {
        return toastContainer;
    }

    toastContainer = document.createElement('div');
    toastContainer.style.position = 'fixed';
    toastContainer.style.right = '16px';
    toastContainer.style.top = '16px';
    toastContainer.style.display = 'flex';
    toastContainer.style.flexDirection = 'column';
    toastContainer.style.gap = '10px';
    toastContainer.style.zIndex = '999999';
    toastContainer.style.maxWidth = '420px';
    toastContainer.style.width = 'calc(100% - 32px)';
    document.body.appendChild(toastContainer);
    return toastContainer;
};

export const showToast = (text, isError = false) => {
    if (!text) {
        return;
    }

    const container = getToastContainer();
    const toast = document.createElement('div');
    toast.textContent = text;
    toast.style.background = isError ? 'rgba(127, 29, 29, 0.95)' : 'rgba(20, 83, 45, 0.95)';
    toast.style.border = isError ? '1px solid rgba(248,113,113,0.55)' : '1px solid rgba(74,222,128,0.55)';
    toast.style.color = '#fff';
    toast.style.padding = '12px 14px';
    toast.style.borderRadius = '10px';
    toast.style.fontSize = '14px';
    toast.style.fontWeight = '600';
    toast.style.boxShadow = '0 10px 24px rgba(0,0,0,0.3)';
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(-8px)';
    toast.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
    });

    window.setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(-8px)';
        window.setTimeout(() => {
            toast.remove();
        }, 220);
    }, 3600);
};

document.addEventListener('DOMContentLoaded', () => {
    window.showToast = showToast;

    if (!window.__FLASH_TOASTS__) {
        return;
    }

    if (window.__FLASH_TOASTS__.success) {
        showToast(window.__FLASH_TOASTS__.success, false);
    }

    if (window.__FLASH_TOASTS__.error) {
        showToast(window.__FLASH_TOASTS__.error, true);
    }
});
