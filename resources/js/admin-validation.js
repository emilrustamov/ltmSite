// Админская валидация форм
document.addEventListener('DOMContentLoaded', function() {
    
    // Валидация форм портфолио
    const portfolioForms = document.querySelectorAll('form[action*="portfolios"]');
    portfolioForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validatePortfolioForm(this)) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    // Валидация форм пользователей
    const userForms = document.querySelectorAll('form[action*="users"]');
    userForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateUserForm(this)) {
                e.preventDefault();
                return false;
            }
        });
    });
    
    // Валидация форм категорий
    const categoryForms = document.querySelectorAll('form[action*="categories"]');
    categoryForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!validateCategoryForm(this)) {
                e.preventDefault();
                return false;
            }
        });
    });
});

function validatePortfolioForm(form) {
    let isValid = true;
    
    // Проверяем обязательное поле title_ru
    const titleRu = form.querySelector('input[name="title_ru"]');
    if (titleRu && !titleRu.value.trim()) {
        showFieldError(titleRu, 'Название на русском языке обязательно');
        isValid = false;
    } else {
        clearFieldError(titleRu);
    }
    
    // Проверяем URL если указан
    const urlButton = form.querySelector('input[name="url_button"]');
    if (urlButton && urlButton.value.trim()) {
        if (!isValidUrl(urlButton.value)) {
            showFieldError(urlButton, 'Введите корректный URL');
            isValid = false;
        } else {
            clearFieldError(urlButton);
        }
    }
    
    // Проверяем изображение
    const imageInput = form.querySelector('input[name="image"]');
    if (imageInput && imageInput.files.length > 0) {
        const file = imageInput.files[0];
        if (file.size > 10 * 1024 * 1024) { // 10MB
            showFieldError(imageInput, 'Размер файла не должен превышать 10MB');
            isValid = false;
        } else if (!file.type.startsWith('image/')) {
            showFieldError(imageInput, 'Выберите изображение');
            isValid = false;
        } else {
            clearFieldError(imageInput);
        }
    }
    
    return isValid;
}

function validateUserForm(form) {
    let isValid = true;
    
    // Проверяем имя
    const name = form.querySelector('input[name="name"]');
    if (name && !name.value.trim()) {
        showFieldError(name, 'Имя обязательно');
        isValid = false;
    } else {
        clearFieldError(name);
    }
    
    // Проверяем email
    const email = form.querySelector('input[name="email"]');
    if (email && !email.value.trim()) {
        showFieldError(email, 'Email обязателен');
        isValid = false;
    } else if (email && !isValidEmail(email.value)) {
        showFieldError(email, 'Введите корректный email');
        isValid = false;
    } else {
        clearFieldError(email);
    }
    
    // Проверяем пароль при создании
    const password = form.querySelector('input[name="password"]');
    const passwordConfirmation = form.querySelector('input[name="password_confirmation"]');
    
    if (password && password.value) {
        if (password.value.length < 8) {
            showFieldError(password, 'Пароль должен содержать минимум 8 символов');
            isValid = false;
        } else if (passwordConfirmation && password.value !== passwordConfirmation.value) {
            showFieldError(passwordConfirmation, 'Пароли не совпадают');
            isValid = false;
        } else {
            clearFieldError(password);
            clearFieldError(passwordConfirmation);
        }
    }
    
    return isValid;
}

function validateCategoryForm(form) {
    let isValid = true;
    
    // Проверяем название категории
    const nameRu = form.querySelector('input[name="name_ru"]');
    if (nameRu && !nameRu.value.trim()) {
        showFieldError(nameRu, 'Название категории обязательно');
        isValid = false;
    } else {
        clearFieldError(nameRu);
    }
    
    return isValid;
}

function showFieldError(field, message) {
    if (!field) return;
    
    clearFieldError(field);
    
    field.classList.add('is-invalid');
    
    const errorDiv = document.createElement('div');
    errorDiv.className = 'invalid-feedback';
    errorDiv.textContent = message;
    
    field.parentNode.appendChild(errorDiv);
}

function clearFieldError(field) {
    if (!field) return;
    
    field.classList.remove('is-invalid');
    
    const existingError = field.parentNode.querySelector('.invalid-feedback');
    if (existingError) {
        existingError.remove();
    }
}

function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidUrl(string) {
    try {
        new URL(string);
        return true;
    } catch (_) {
        return false;
    }
}

// Автоматическая очистка ошибок при вводе
document.addEventListener('input', function(e) {
    if (e.target.classList.contains('is-invalid')) {
        clearFieldError(e.target);
    }
});
