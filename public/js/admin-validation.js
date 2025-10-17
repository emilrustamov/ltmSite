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

// Счетчики для динамических полей
let workExperienceCount = 0;
let educationalInstitutionCount = 0;

// Добавление записи опыта работы
function addWorkExperience() {
    const container = document.getElementById('work-experiences-container');
    const index = workExperienceCount++;
    
    const workExperienceHtml = `
        <div class="work-experience-item border rounded p-3 mb-3" data-index="${index}">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Место работы #${index + 1}</h6>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeWorkExperience(${index})">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Название компании</label>
                        <input type="text" class="form-control" name="work_experiences[${index}][company_name]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Должность</label>
                        <input type="text" class="form-control" name="work_experiences[${index}][position]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Дата начала</label>
                        <input type="date" class="form-control" name="work_experiences[${index}][start_date]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Дата окончания</label>
                        <input type="date" class="form-control" name="work_experiences[${index}][end_date]">
                        <div class="form-text">Оставьте пустым, если это текущая работа</div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Описание обязанностей</label>
                        <textarea class="form-control" name="work_experiences[${index}][description]" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', workExperienceHtml);
}

// Удаление записи опыта работы
function removeWorkExperience(index) {
    const item = document.querySelector(`.work-experience-item[data-index="${index}"]`);
    if (item) {
        item.remove();
    }
}

// Добавление записи образовательного учреждения
function addEducationalInstitution() {
    const container = document.getElementById('educational-institutions-container');
    const index = educationalInstitutionCount++;
    
    const educationHtml = `
        <div class="educational-institution-item border rounded p-3 mb-3" data-index="${index}">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6 class="mb-0">Учебное заведение #${index + 1}</h6>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeEducationalInstitution(${index})">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Название учебного заведения</label>
                        <input type="text" class="form-control" name="educational_institutions[${index}][institution_name]" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Степень/специальность</label>
                        <input type="text" class="form-control" name="educational_institutions[${index}][degree]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Факультет</label>
                        <input type="text" class="form-control" name="educational_institutions[${index}][faculty]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Дата начала обучения</label>
                        <input type="date" class="form-control" name="educational_institutions[${index}][start_date]">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Дата окончания обучения</label>
                        <input type="date" class="form-control" name="educational_institutions[${index}][end_date]">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label class="form-label">Дополнительная информация</label>
                        <textarea class="form-control" name="educational_institutions[${index}][description]" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', educationHtml);
}

// Удаление записи образовательного учреждения
function removeEducationalInstitution(index) {
    const item = document.querySelector(`.educational-institution-item[data-index="${index}"]`);
    if (item) {
        item.remove();
    }
}

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
