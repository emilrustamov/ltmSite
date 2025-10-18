/**
 * Унифицированная логика для админ-панели LTM Studio
 * Обеспечивает одинаковое поведение на всех страницах
 */

document.addEventListener('DOMContentLoaded', function() {
    // ========================================
    // УНИВЕРСАЛЬНАЯ СИСТЕМА УДАЛЕНИЯ
    // ========================================
    
    // Инициализация кнопок удаления
    initializeDeleteButtons();
    
    // ========================================
    // УНИВЕРСАЛЬНАЯ СИСТЕМА МОДАЛЬНЫХ ОКОН
    // ========================================
    
    // Инициализация модальных окон
    initializeModals();
    
    // ========================================
    // УНИВЕРСАЛЬНАЯ СИСТЕМА ВКЛАДОК
    // ========================================
    
    // Инициализация вкладок
    initializeTabs();
    
    // ========================================
    // УНИВЕРСАЛЬНАЯ СИСТЕМА НАВИГАЦИИ ПО СТРОКАМ
    // ========================================
    
    // Инициализация кликабельных строк
    initializeClickableRows();
    
    // ========================================
    // УНИВЕРСАЛЬНАЯ СИСТЕМА ПАГИНАЦИИ
    // ========================================
    
    // Инициализация красивой пагинации
    initializePagination();
});

/**
 * Инициализация кнопок удаления
 */
function initializeDeleteButtons() {
    // Обработка кнопок удаления с классом .delete-btn
    document.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn') || e.target.closest('[onclick*="confirmDelete"]')) {
            e.preventDefault();
            e.stopPropagation();
            
            const button = e.target.closest('.delete-btn') || e.target;
            const id = button.getAttribute('data-id') || 
                      button.getAttribute('data-application-id') || 
                      button.getAttribute('data-portfolio-id') ||
                      extractIdFromOnclick(button.getAttribute('onclick'));
            
            const name = button.getAttribute('data-name') || 
                        button.getAttribute('data-application-name') ||
                        'элемент';
            
            const type = getEntityType(button);
            
            showDeleteConfirmation(id, name, type);
        }
    });
}

/**
 * Инициализация модальных окон
 */
function initializeModals() {
    // Обработка открытия модальных окон
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-modal-target]')) {
            e.preventDefault();
            const target = e.target.closest('[data-modal-target]');
            const modalId = target.getAttribute('data-modal-target');
            openModal(modalId);
        }
    });
    
    // Обработка закрытия модальных окон
    document.addEventListener('click', function(e) {
        if (e.target.closest('.modal-close') || e.target.closest('[data-dismiss="modal"]')) {
            e.preventDefault();
            closeModal(e.target.closest('.modal, [data-dismiss="modal"]'));
        }
    });
    
    // Закрытие по клику вне модального окна
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-backdrop') || e.target.classList.contains('modal')) {
            closeModal(e.target);
        }
    });
    
    // Закрытие по клавише Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllModals();
        }
    });
}

/**
 * Инициализация вкладок
 */
function initializeTabs() {
    document.addEventListener('click', function(e) {
        if (e.target.closest('[data-tab-target]')) {
            e.preventDefault();
            const tabButton = e.target.closest('[data-tab-target]');
            const tabId = tabButton.getAttribute('data-tab-target');
            switchTab(tabId);
        }
    });
}

/**
 * Инициализация кликабельных строк
 */
function initializeClickableRows() {
    const clickableClasses = '.clickable-row, .application-row, .portfolio-row, .city-row, .user-row, .language-row, .skill-row, .work-format-row, .position-row';
    
    document.addEventListener('dblclick', function(e) {
        const row = e.target.closest(clickableClasses);
        if (row) {
            const id = row.getAttribute('data-id') || 
                      row.getAttribute('data-application-id') || 
                      row.getAttribute('data-portfolio-slug');
            
            if (id) {
                const editUrl = getEditUrl(row, id);
                if (editUrl) {
                    window.location.href = editUrl;
                }
            }
        }
    });
    
    // Добавляем визуальную обратную связь
    document.addEventListener('mouseenter', function(e) {
        const row = e.target.closest(clickableClasses);
        if (row) {
            row.style.backgroundColor = '#f8f9fa';
            row.style.cursor = 'pointer';
        }
    }, true);
    
    document.addEventListener('mouseleave', function(e) {
        const row = e.target.closest(clickableClasses);
        if (row) {
            row.style.backgroundColor = '';
        }
    }, true);
}

/**
 * Инициализация красивой пагинации
 */
function initializePagination() {
    // Добавляем анимацию при клике на страницы
    document.addEventListener('click', function(e) {
        const pageLink = e.target.closest('.pagination-modern .page-link');
        if (pageLink && !pageLink.parentElement.classList.contains('disabled') && !pageLink.parentElement.classList.contains('active')) {
            // Добавляем эффект загрузки
            pageLink.style.opacity = '0.7';
            pageLink.style.transform = 'scale(0.95)';
            
            // Показываем индикатор загрузки
            showLoadingIndicator();
        }
    });
    
    // Обработка быстрого перехода
    document.addEventListener('submit', function(e) {
        const quickJumpForm = e.target.closest('.pagination-quick-jump form');
        if (quickJumpForm) {
            e.preventDefault();
            const pageInput = quickJumpForm.querySelector('input[name="page"]');
            const page = parseInt(pageInput.value);
            const maxPage = parseInt(pageInput.getAttribute('max'));
            
            if (page >= 1 && page <= maxPage) {
                // Добавляем параметр page к текущему URL
                const url = new URL(window.location.href);
                url.searchParams.set('page', page);
                window.location.href = url.toString();
            } else {
                showToast('Введите корректный номер страницы', 'error');
            }
        }
    });
    
    // Добавляем клавиатурную навигацию
    document.addEventListener('keydown', function(e) {
        const quickJumpInput = document.querySelector('.pagination-quick-jump input[name="page"]');
        if (quickJumpInput && document.activeElement === quickJumpInput) {
            if (e.key === 'Enter') {
                e.preventDefault();
                quickJumpInput.closest('form').dispatchEvent(new Event('submit'));
            }
        }
    });
}

// ========================================
// ФУНКЦИИ УДАЛЕНИЯ
// ========================================

function showDeleteConfirmation(id, name, type) {
    const entityNames = {
        'application': 'заявку',
        'portfolio': 'проект',
        'city': 'город',
        'user': 'пользователя',
        'category': 'категорию',
        'news': 'новость',
        'position': 'должность',
        'skill': 'навык',
        'language': 'язык',
        'work_format': 'формат работы',
        'contact': 'контакт'
    };
    
    const entityName = entityNames[type] || 'элемент';
    
    if (confirm(`Вы уверены, что хотите удалить ${entityName} "${name}"? Это действие нельзя отменить.`)) {
        deleteEntity(id, type);
    }
}

function deleteEntity(id, type) {
    const formId = `delete-form-${id}`;
    const form = document.getElementById(formId);
    
    if (form) {
        form.submit();
    } else {
        // Если формы нет, создаем её динамически
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        if (csrfToken) {
            const actionUrl = getDeleteUrl(type, id);
            if (actionUrl) {
                const tempForm = document.createElement('form');
                tempForm.method = 'POST';
                tempForm.action = actionUrl;
                tempForm.style.display = 'none';
                
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                
                const methodInput = document.createElement('input');
                methodInput.type = 'hidden';
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                
                tempForm.appendChild(csrfInput);
                tempForm.appendChild(methodInput);
                document.body.appendChild(tempForm);
                tempForm.submit();
            }
        }
    }
}

// ========================================
// ФУНКЦИИ МОДАЛЬНЫХ ОКОН
// ========================================

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'block';
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Создаем backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'modal-backdrop fade show';
        backdrop.id = 'modal-backdrop-' + modalId;
        document.body.appendChild(backdrop);
    }
}

function closeModal(modalElement) {
    let modal;
    if (modalElement.classList.contains('modal')) {
        modal = modalElement;
    } else {
        modal = modalElement.closest('.modal');
    }
    
    if (modal) {
        modal.style.display = 'none';
        modal.classList.remove('show');
        document.body.style.overflow = 'auto';
        
        // Удаляем backdrop
        const backdrop = document.getElementById('modal-backdrop-' + modal.id);
        if (backdrop) {
            backdrop.remove();
        }
    }
}

function closeAllModals() {
    const modals = document.querySelectorAll('.modal.show');
    modals.forEach(modal => {
        closeModal(modal);
    });
}

// ========================================
// ФУНКЦИИ ВКЛАДОК
// ========================================

function switchTab(tabId) {
    // Скрываем все вкладки
    const allTabs = document.querySelectorAll('.tab-content');
    allTabs.forEach(tab => {
        tab.style.display = 'none';
        tab.classList.remove('active');
    });
    
    // Убираем активный класс со всех кнопок
    const allButtons = document.querySelectorAll('.tab-button');
    allButtons.forEach(button => {
        button.classList.remove('active');
    });
    
    // Показываем выбранную вкладку
    const targetTab = document.getElementById(tabId);
    const targetButton = document.querySelector(`[data-tab-target="${tabId}"]`);
    
    if (targetTab) {
        targetTab.style.display = 'block';
        targetTab.classList.add('active');
    }
    
    if (targetButton) {
        targetButton.classList.add('active');
    }
}

// ========================================
// ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ
// ========================================

function extractIdFromOnclick(onclick) {
    if (!onclick) return null;
    const match = onclick.match(/confirmDelete\((\d+)\)/);
    return match ? match[1] : null;
}

function getEntityType(button) {
    const classes = button.className;
    if (classes.includes('delete-application')) return 'application';
    if (classes.includes('delete-portfolio')) return 'portfolio';
    if (classes.includes('delete-city')) return 'city';
    if (classes.includes('delete-user')) return 'user';
    if (classes.includes('delete-category')) return 'category';
    if (classes.includes('delete-news')) return 'news';
    if (classes.includes('delete-position')) return 'position';
    if (classes.includes('delete-skill')) return 'skill';
    if (classes.includes('delete-language')) return 'language';
    if (classes.includes('delete-work-format')) return 'work_format';
    if (classes.includes('delete-contact')) return 'contact';
    return 'default';
}

function getEditUrl(row, id) {
    const classes = row.className;
    if (classes.includes('application-row')) {
        return `/admin/applications/${id}`;
    }
    if (classes.includes('portfolio-row')) {
        return `/admin/portfolios/${id}/edit`;
    }
    if (classes.includes('city-row')) {
        return `/admin/cities/${id}/edit`;
    }
    if (classes.includes('user-row')) {
        return `/admin/users/${id}/edit`;
    }
    if (classes.includes('language-row')) {
        return `/admin/languages/${id}/edit`;
    }
    if (classes.includes('skill-row')) {
        return `/admin/technical-skills/${id}/edit`;
    }
    if (classes.includes('work-format-row')) {
        return `/admin/work-formats/${id}/edit`;
    }
    if (classes.includes('position-row')) {
        return `/admin/job-positions/${id}/edit`;
    }
    return null;
}

function getDeleteUrl(type, id) {
    const urls = {
        'application': `/admin/applications/${id}`,
        'portfolio': `/admin/portfolios/${id}`,
        'city': `/admin/cities/${id}`,
        'user': `/admin/users/${id}`,
        'category': `/admin/categories/${id}`,
        'news': `/admin/news/${id}`,
        'position': `/admin/job-positions/${id}`,
        'skill': `/admin/technical-skills/${id}`,
        'language': `/admin/languages/${id}`,
        'work_format': `/admin/work-formats/${id}`,
        'contact': `/admin/contacts/${id}`
    };
    
    return urls[type] || null;
}

// ========================================
// ФУНКЦИИ УВЕДОМЛЕНИЙ
// ========================================

function showToast(message, type = 'success') {
    const toastContainer = document.getElementById('toast-container');
    if (!toastContainer) return;
    
    const toast = document.createElement('div');
    toast.className = `alert alert-${type} alert-dismissible fade show`;
    toast.style.marginBottom = '10px';
    toast.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    toastContainer.appendChild(toast);
    
    // Автоматическое удаление через 5 секунд
    setTimeout(() => {
        if (toast.parentNode) {
            toast.remove();
        }
    }, 5000);
}

/**
 * Показать индикатор загрузки
 */
function showLoadingIndicator() {
    const paginationWrapper = document.querySelector('.pagination-wrapper');
    if (paginationWrapper) {
        const loadingOverlay = document.createElement('div');
        loadingOverlay.className = 'pagination-loading-overlay';
        loadingOverlay.innerHTML = `
            <div class="loading-spinner">
                <i class="fas fa-spinner fa-spin"></i>
                <span>Загрузка...</span>
            </div>
        `;
        loadingOverlay.style.cssText = `
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            z-index: 10;
        `;
        
        paginationWrapper.style.position = 'relative';
        paginationWrapper.appendChild(loadingOverlay);
        
        // Убираем индикатор через 2 секунды
        setTimeout(() => {
            if (loadingOverlay.parentNode) {
                loadingOverlay.remove();
            }
        }, 2000);
    }
}

// ========================================
// ЭКСПОРТ ДЛЯ ГЛОБАЛЬНОГО ИСПОЛЬЗОВАНИЯ
// ========================================

window.AdminCommon = {
    showDeleteConfirmation,
    deleteEntity,
    openModal,
    closeModal,
    closeAllModals,
    switchTab,
    showToast,
    showLoadingIndicator,
    initializePagination
};