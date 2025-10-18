<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Подать заявку на работу - LTM</title>
    <meta name="description" content="Подайте заявку на работу в LTM. Заполните форму и станьте частью нашей команды!">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .application-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        .header-gradient {
            background: linear-gradient(135deg, #e31e24 0%, #c41e3a 100%);
            color: white;
            border-radius: 20px 20px 0 0;
        }
        
        .form-section {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 4px solid #e31e24;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #e31e24 0%, #c41e3a 100%);
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: bold;
            font-size: 18px;
            box-shadow: 0 8px 20px rgba(30, 63, 227, 0.3);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(227, 30, 36, 0.4);
        }
        
        .btn-outline-secondary {
            border: 2px solid #6c757d;
            color: #6c757d;
            border-radius: 10px;
            padding: 15px 30px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-outline-secondary:hover {
            background-color: #6c757d;
            color: white;
            transform: translateY(-2px);
        }
        
        .form-control, .form-select {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #e31e24;
            box-shadow: 0 0 0 0.2rem rgba(227, 30, 36, 0.25);
        }
        
        .section-title {
            color: #e31e24;
            font-weight: bold;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            font-size: 1.2em;
        }
        
        .required {
            color: #e31e24;
        }
        
        .custom-field {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-top: 10px;
            border: 2px dashed #dee2e6;
        }
        
        .multiple-select {
            height: 120px;
            padding: 8px;
        }
        
        .alert {
            border-radius: 10px;
            border: none;
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            color: white;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #51cf66 0%, #40c057 100%);
            color: white;
        }
        
        .checkbox-group {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
        }
        
        .checkbox-group:hover {
            border-color: #e31e24 !important;
        }
        
        .form-check {
            margin-bottom: 8px;
            padding-left: 0;
        }
        
        .form-check-input {
            margin-right: 10px;
            margin-top: 0.25em;
        }
        
        .form-check-input:checked {
            background-color: #e31e24;
            border-color: #e31e24;
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 0.2rem rgba(227, 30, 36, 0.25);
        }
        
        .form-check-label {
            cursor: pointer;
            font-weight: 500;
            color: #495057;
        }
        
        .form-check-label:hover {
            color: #e31e24;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="application-card">
                <div class="header-gradient p-4">
                    <h2 class="mb-2">
                        <i class="fas fa-user-plus me-3"></i>
                        Подача заявки на работу
                    </h2>
                    <p class="mb-0 opacity-75">Заполните форму ниже, чтобы подать заявку на работу в нашей компании</p>
                </div>
                <div class="p-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <h6><i class="fas fa-exclamation-triangle me-2"></i>Пожалуйста, исправьте следующие ошибки:</h6>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Личная информация -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-user"></i>
                                Личная информация
                            </h5>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Имя <span class="text-muted">(необязательно)</span></label>
                                    <input type="text" 
                                           class="form-control @error('name') is-invalid @enderror" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}" 
                                           placeholder="Введите ваше имя">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Фамилия <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('surname') is-invalid @enderror" 
                                           id="surname" 
                                           name="surname" 
                                           value="{{ old('surname') }}" 
                                           placeholder="Введите вашу фамилию"
                                           required>
                                    @error('surname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}" 
                                           placeholder="example@email.com"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Телефон <span class="text-danger">*</span></label>
                                    <input type="tel" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}" 
                                           placeholder="+7 (999) 123-45-67"
                                           required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="date_of_birth" class="form-label">Дата рождения <span class="text-danger">*</span></label>
                                    <input type="date" 
                                           class="form-control @error('date_of_birth') is-invalid @enderror" 
                                           id="date_of_birth" 
                                           name="date_of_birth" 
                                           value="{{ old('date_of_birth') }}"
                                           required>
                                    @error('date_of_birth')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="expected_salary" class="form-label">Ожидаемая зарплата <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('expected_salary') is-invalid @enderror" 
                                           id="expected_salary" 
                                           name="expected_salary" 
                                           value="{{ old('expected_salary') }}" 
                                           placeholder="Например: 100000 руб/мес"
                                           required>
                                    @error('expected_salary')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Дополнительная информация -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Дополнительная информация
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="linkedin_url" class="form-label">LinkedIn профиль</label>
                                    <input type="url" 
                                           class="form-control @error('linkedin_url') is-invalid @enderror" 
                                           id="linkedin_url" 
                                           name="linkedin_url" 
                                           value="{{ old('linkedin_url') }}" 
                                           placeholder="https://linkedin.com/in/yourname">
                                    @error('linkedin_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="github_url" class="form-label">GitHub профиль</label>
                                    <input type="url" 
                                           class="form-control @error('github_url') is-invalid @enderror" 
                                           id="github_url" 
                                           name="github_url" 
                                           value="{{ old('github_url') }}" 
                                           placeholder="https://github.com/yourname">
                                    @error('github_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- CV файл -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-file-pdf me-2"></i>
                                    Резюме
                                </h5>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="cv_file" class="form-label">Загрузите ваше резюме <span class="text-danger">*</span></label>
                                    <input type="file" 
                                           class="form-control @error('cv_file') is-invalid @enderror" 
                                           id="cv_file" 
                                           name="cv_file" 
                                           accept=".pdf,.doc,.docx"
                                           required>
                                    <div class="form-text">Поддерживаемые форматы: PDF, DOC, DOCX. Максимальный размер: 10MB</div>
                                    @error('cv_file')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Дополнительная информация -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Дополнительная информация
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="personal_info" class="form-label">Личная информация</label>
                                    <textarea class="form-control @error('personal_info') is-invalid @enderror" 
                                              id="personal_info" 
                                              name="personal_info" 
                                              rows="3" 
                                              placeholder="Расскажите о себе...">{{ old('personal_info') }}</textarea>
                                    @error('personal_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="contact_info" class="form-label">Контактная информация</label>
                                    <textarea class="form-control @error('contact_info') is-invalid @enderror" 
                                              id="contact_info" 
                                              name="contact_info" 
                                              rows="3" 
                                              placeholder="Дополнительные контакты...">{{ old('contact_info') }}</textarea>
                                    @error('contact_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="general_info" class="form-label">Общая информация</label>
                                    <textarea class="form-control @error('general_info') is-invalid @enderror" 
                                              id="general_info" 
                                              name="general_info" 
                                              rows="3" 
                                              placeholder="Любая дополнительная информация...">{{ old('general_info') }}</textarea>
                                    @error('general_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Адрес и город -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-map-marker-alt me-2"></i>
                                    Местоположение
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="city_id" class="form-label">Город <span class="text-danger">*</span></label>
                                    <select class="form-control @error('city_id') is-invalid @enderror" 
                                            id="city_id" 
                                            name="city_id" 
                                            required>
                                        <option value="">Выберите город</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                {{ $city->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('city_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="custom_city_check" name="custom_city_check" {{ old('custom_city_check') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="custom_city_check">Моего города нет в списке</label>
                                    </div>
                                    <input type="text" 
                                           class="form-control mt-2 @error('custom_city') is-invalid @enderror" 
                                           id="custom_city" 
                                           name="custom_city" 
                                           value="{{ old('custom_city') }}" 
                                           placeholder="Введите свой город" 
                                           style="{{ old('custom_city_check') ? '' : 'display:none;' }}">
                                    @error('custom_city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="registration_address" class="form-label">Адрес по прописке <span class="text-danger">*</span></label>
                                    <input type="text" 
                                           class="form-control @error('registration_address') is-invalid @enderror" 
                                           id="registration_address" 
                                           name="registration_address" 
                                           value="{{ old('registration_address') }}" 
                                           placeholder="Полный адрес по прописке"
                                           required>
                                    @error('registration_address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Источник информации -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-question-circle me-2"></i>
                                    Как вы узнали о нас?
                                </h5>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="source_id" class="form-label">Источник информации <span class="text-danger">*</span></label>
                                    <select class="form-control @error('source_id') is-invalid @enderror" 
                                            id="source_id" 
                                            name="source_id" 
                                            required>
                                        <option value="">Выберите источник</option>
                                        @foreach($sources as $source)
                                            <option value="{{ $source->id }}" {{ old('source_id') == $source->id ? 'selected' : '' }}>
                                                {{ $source->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('source_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="custom_source_check" name="custom_source_check" {{ old('custom_source_check') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="custom_source_check">Другой источник</label>
                                    </div>
                                    <input type="text" 
                                           class="form-control mt-2 @error('custom_source') is-invalid @enderror" 
                                           id="custom_source" 
                                           name="custom_source" 
                                           value="{{ old('custom_source') }}" 
                                           placeholder="Укажите источник" 
                                           style="{{ old('custom_source_check') ? '' : 'display:none;' }}">
                                    @error('custom_source')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Формат работы и образование -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-briefcase me-2"></i>
                                    Работа и образование
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="work_format_id" class="form-label">Формат работы <span class="text-danger">*</span></label>
                                    <select class="form-control @error('work_format_id') is-invalid @enderror" 
                                            id="work_format_id" 
                                            name="work_format_id" 
                                            required>
                                        <option value="">Выберите формат</option>
                                        @foreach($workFormats as $format)
                                            <option value="{{ $format->id }}" {{ old('work_format_id') == $format->id ? 'selected' : '' }}>
                                                {{ $format->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('work_format_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="custom_work_format_check" name="custom_work_format_check" {{ old('custom_work_format_check') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="custom_work_format_check">Другой формат работы</label>
                                    </div>
                                    <input type="text" 
                                           class="form-control mt-2 @error('custom_work_format') is-invalid @enderror" 
                                           id="custom_work_format" 
                                           name="custom_work_format" 
                                           value="{{ old('custom_work_format') }}" 
                                           placeholder="Укажите формат работы" 
                                           style="{{ old('custom_work_format_check') ? '' : 'display:none;' }}">
                                    @error('custom_work_format')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="education_id" class="form-label">Образование <span class="text-danger">*</span></label>
                                    <select class="form-control @error('education_id') is-invalid @enderror" 
                                            id="education_id" 
                                            name="education_id" 
                                            required>
                                        <option value="">Выберите образование</option>
                                        @foreach($educations as $education)
                                            <option value="{{ $education->id }}" {{ old('education_id') == $education->id ? 'selected' : '' }}>
                                                {{ $education->name_ru }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('education_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" id="custom_education_check" name="custom_education_check" {{ old('custom_education_check') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="custom_education_check">Другое образование</label>
                                    </div>
                                    <input type="text" 
                                           class="form-control mt-2 @error('custom_education') is-invalid @enderror" 
                                           id="custom_education" 
                                           name="custom_education" 
                                           value="{{ old('custom_education') }}" 
                                           placeholder="Укажите образование" 
                                           style="{{ old('custom_education_check') ? '' : 'display:none;' }}">
                                    @error('custom_education')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Профессиональные планы -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-briefcase me-2"></i>
                                    Профессиональные планы
                                </h5>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="professional_plans" class="form-label">Расскажите о ваших профессиональных планах <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('professional_plans') is-invalid @enderror" 
                                              id="professional_plans" 
                                              name="professional_plans" 
                                              rows="4" 
                                              placeholder="Опишите ваши цели и планы на ближайшие годы..."
                                              required>{{ old('professional_plans') }}</textarea>
                                    @error('professional_plans')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Профессиональные данные -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="text-primary mb-3">
                                    <i class="fas fa-cogs me-2"></i>
                                    Профессиональные данные
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Интересующие должности</label>
                                    <div class="checkbox-group">
                                        @foreach($jobPositions as $position)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="job_position_{{ $position->id }}" 
                                                       name="job_positions[]" 
                                                       value="{{ $position->id }}"
                                                       {{ in_array($position->id, old('job_positions', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="job_position_{{ $position->id }}">
                                                    {{ $position->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('job_positions')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Технические навыки</label>
                                    <div class="checkbox-group">
                                        <div id="skills-placeholder" class="text-muted" style="display: none;">
                                            <i class="fas fa-info-circle me-2"></i>
                                            Выберите интересующие должности, чтобы увидеть релевантные навыки
                                        </div>
                                        @foreach($technicalSkills as $skill)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="technical_skill_{{ $skill->id }}" 
                                                       name="technical_skills[]" 
                                                       value="{{ $skill->id }}"
                                                       {{ in_array($skill->id, old('technical_skills', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="technical_skill_{{ $skill->id }}">
                                                    {{ $skill->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('technical_skills')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Языки</label>
                                    <div class="checkbox-group">
                                        @foreach($languages as $language)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="language_{{ $language->id }}" 
                                                       name="languages[]" 
                                                       value="{{ $language->id }}"
                                                       {{ in_array($language->id, old('languages', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="language_{{ $language->id }}">
                                                    {{ $language->name_ru }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    @error('languages')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <input type="text" 
                                           class="form-control mt-3 @error('custom_language') is-invalid @enderror" 
                                           id="custom_language" 
                                           name="custom_language" 
                                           value="{{ old('custom_language') }}" 
                                           placeholder="Другие языки (через запятую)">
                                    @error('custom_language')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Опыт работы -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-briefcase"></i>
                                Опыт работы
                            </h5>
                            <div id="work_experiences_container">
                                @if(old('work_experiences'))
                                    @foreach(old('work_experiences') as $index => $experience)
                                        <div class="work-experience-item border rounded p-3 mb-3 position-relative">
                                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-item" aria-label="Close"></button>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="work_experiences_{{ $index }}_company_name" class="form-label">Название компании <span class="required">*</span></label>
                                                    <input type="text" class="form-control @error('work_experiences.'.$index.'.company_name') is-invalid @enderror" id="work_experiences_{{ $index }}_company_name" name="work_experiences[{{ $index }}][company_name]" value="{{ $experience['company_name'] ?? '' }}" required>
                                                    @error('work_experiences.'.$index.'.company_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="work_experiences_{{ $index }}_position" class="form-label">Должность <span class="required">*</span></label>
                                                    <input type="text" class="form-control @error('work_experiences.'.$index.'.position') is-invalid @enderror" id="work_experiences_{{ $index }}_position" name="work_experiences[{{ $index }}][position]" value="{{ $experience['position'] ?? '' }}" required>
                                                    @error('work_experiences.'.$index.'.position')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="work_experiences_{{ $index }}_start_date" class="form-label">Дата начала <span class="required">*</span></label>
                                                    <input type="date" class="form-control @error('work_experiences.'.$index.'.start_date') is-invalid @enderror" id="work_experiences_{{ $index }}_start_date" name="work_experiences[{{ $index }}][start_date]" value="{{ $experience['start_date'] ?? '' }}" required>
                                                    @error('work_experiences.'.$index.'.start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="work_experiences_{{ $index }}_end_date" class="form-label">Дата окончания</label>
                                                    <input type="date" class="form-control @error('work_experiences.'.$index.'.end_date') is-invalid @enderror" id="work_experiences_{{ $index }}_end_date" name="work_experiences[{{ $index }}][end_date]" value="{{ $experience['end_date'] ?? '' }}">
                                                    @error('work_experiences.'.$index.'.end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="work_experiences_{{ $index }}_description" class="form-label">Описание обязанностей</label>
                                                <textarea class="form-control @error('work_experiences.'.$index.'.description') is-invalid @enderror" id="work_experiences_{{ $index }}_description" name="work_experiences[{{ $index }}][description]" rows="3">{{ $experience['description'] ?? '' }}</textarea>
                                                @error('work_experiences.'.$index.'.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-outline-primary" id="add_work_experience">
                                <i class="fas fa-plus me-2"></i>Добавить опыт работы
                            </button>
                        </div>

                        <!-- Образование -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-graduation-cap"></i>
                                Образование
                            </h5>
                            <div id="educational_institutions_container">
                                @if(old('educational_institutions'))
                                    @foreach(old('educational_institutions') as $index => $institution)
                                        <div class="educational-institution-item border rounded p-3 mb-3 position-relative">
                                            <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-item" aria-label="Close"></button>
                                            <div class="mb-3">
                                                <label for="educational_institutions_{{ $index }}_institution_name" class="form-label">Название учебного заведения <span class="required">*</span></label>
                                                <input type="text" class="form-control @error('educational_institutions.'.$index.'.institution_name') is-invalid @enderror" id="educational_institutions_{{ $index }}_institution_name" name="educational_institutions[{{ $index }}][institution_name]" value="{{ $institution['institution_name'] ?? '' }}" required>
                                                @error('educational_institutions.'.$index.'.institution_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="educational_institutions_{{ $index }}_degree" class="form-label">Степень/Специальность</label>
                                                    <input type="text" class="form-control @error('educational_institutions.'.$index.'.degree') is-invalid @enderror" id="educational_institutions_{{ $index }}_degree" name="educational_institutions[{{ $index }}][degree]" value="{{ $institution['degree'] ?? '' }}">
                                                    @error('educational_institutions.'.$index.'.degree')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="educational_institutions_{{ $index }}_faculty" class="form-label">Факультет</label>
                                                    <input type="text" class="form-control @error('educational_institutions.'.$index.'.faculty') is-invalid @enderror" id="educational_institutions_{{ $index }}_faculty" name="educational_institutions[{{ $index }}][faculty]" value="{{ $institution['faculty'] ?? '' }}">
                                                    @error('educational_institutions.'.$index.'.faculty')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="educational_institutions_{{ $index }}_start_date" class="form-label">Дата начала обучения</label>
                                                    <input type="date" class="form-control @error('educational_institutions.'.$index.'.start_date') is-invalid @enderror" id="educational_institutions_{{ $index }}_start_date" name="educational_institutions[{{ $index }}][start_date]" value="{{ $institution['start_date'] ?? '' }}">
                                                    @error('educational_institutions.'.$index.'.start_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="educational_institutions_{{ $index }}_end_date" class="form-label">Дата окончания обучения</label>
                                                    <input type="date" class="form-control @error('educational_institutions.'.$index.'.end_date') is-invalid @enderror" id="educational_institutions_{{ $index }}_end_date" name="educational_institutions[{{ $index }}][end_date]" value="{{ $institution['end_date'] ?? '' }}">
                                                    @error('educational_institutions.'.$index.'.end_date')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="educational_institutions_{{ $index }}_description" class="form-label">Дополнительная информация</label>
                                                <textarea class="form-control @error('educational_institutions.'.$index.'.description') is-invalid @enderror" id="educational_institutions_{{ $index }}_description" name="educational_institutions[{{ $index }}][description]" rows="3">{{ $institution['description'] ?? '' }}</textarea>
                                                @error('educational_institutions.'.$index.'.description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-outline-primary" id="add_educational_institution">
                                <i class="fas fa-plus me-2"></i>Добавить образование
                            </button>
                        </div>

                        <!-- Дополнительные заметки -->
                        <div class="form-section">
                            <h5 class="section-title">
                                <i class="fas fa-sticky-note"></i>
                                Дополнительные заметки
                            </h5>
                            <div class="mb-3">
                                <label for="other_notes" class="form-label">Дополнительные заметки</label>
                                <textarea class="form-control @error('other_notes') is-invalid @enderror" 
                                          id="other_notes" 
                                          name="other_notes" 
                                          rows="3" 
                                          placeholder="Любая дополнительная информация...">{{ old('other_notes') }}</textarea>
                                @error('other_notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Кнопки -->
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <a href="/" class="btn btn-outline-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        Назад на главную
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #e31e24; border-color: #e31e24; color: white; font-weight: bold; padding: 15px 30px; font-size: 18px; border-radius: 8px; box-shadow: 0 4px 8px rgba(227, 30, 36, 0.3);">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        Отправить заявку
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Toast notification system
    function showToast(message, type = 'success') {
        // Create toast container if it doesn't exist
        let container = document.getElementById('toast-container');
        if (!container) {
            container = document.createElement('div');
            container.id = 'toast-container';
            container.className = 'toast-container position-fixed top-0 end-0 p-3';
            container.style.zIndex = '9999';
            document.body.appendChild(container);
        }
        
        const toastId = 'toast-' + Date.now();
        const iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
        const bgClass = type === 'success' ? 'bg-success' : 'bg-danger';
        
        const toastHTML = `
            <div id="${toastId}" class="toast align-items-center text-white ${bgClass} border-0" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        <i class="fas ${iconClass} me-2"></i>
                        ${message}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;
        
        container.insertAdjacentHTML('beforeend', toastHTML);
        
        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement, {
            autohide: true,
            delay: 5000
        });
        
        toast.show();
        
        // Remove toast element after it's hidden
        toastElement.addEventListener('hidden.bs.toast', function() {
            toastElement.remove();
        });
    }

    // Check for flash messages and show toasts
    @if(session('success'))
        showToast('{{ session('success') }}', 'success');
    @endif
    
    @if(session('error'))
        showToast('{{ session('error') }}', 'error');
    @endif

    // Form submission with loading indicator
    const form = document.querySelector('form[action="{{ route('applications.store') }}"]');
    if (form) {
        form.addEventListener('submit', function() {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Отправка заявки...';
                submitBtn.disabled = true;
                
                // Restore button after 15 seconds in case of error
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 15000);
            }
        });
    }

    // Управление кастомными полями
    function setupCustomFieldToggle(checkboxId, inputId, selectId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        const select = document.getElementById(selectId);

        if (checkbox && input && select) {
            const toggleVisibility = () => {
                if (checkbox.checked) {
                    input.style.display = 'block';
                    select.removeAttribute('required');
                    input.setAttribute('required', 'required');
                } else {
                    input.style.display = 'none';
                    input.value = '';
                    select.setAttribute('required', 'required');
                    input.removeAttribute('required');
                }
            };
            checkbox.addEventListener('change', toggleVisibility);
            toggleVisibility(); // Set initial state
        }
    }

    // Настройка всех кастомных полей
    setupCustomFieldToggle('custom_city_check', 'custom_city', 'city_id');
    setupCustomFieldToggle('custom_source_check', 'custom_source', 'source_id');
    setupCustomFieldToggle('custom_work_format_check', 'custom_work_format', 'work_format_id');
    setupCustomFieldToggle('custom_education_check', 'custom_education', 'education_id');

    // Дополнительная логика для обнуления выбранных значений
    function setupCustomFieldWithReset(checkboxId, inputId, selectId) {
        const checkbox = document.getElementById(checkboxId);
        const input = document.getElementById(inputId);
        const select = document.getElementById(selectId);

        if (checkbox && input && select) {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Если выбрано "Другое", обнуляем выбранное значение в списке
                    select.value = '';
                    input.style.display = 'block';
                    select.removeAttribute('required');
                    input.setAttribute('required', 'required');
                } else {
                    // Если убрали "Другое", обнуляем кастомное поле
                    input.value = '';
                    input.style.display = 'none';
                    select.setAttribute('required', 'required');
                    input.removeAttribute('required');
                }
            });

            // Если пользователь выбрал что-то из списка, убираем чекбокс "Другое"
            select.addEventListener('change', function() {
                if (this.value !== '') {
                    checkbox.checked = false;
                    input.value = '';
                    input.style.display = 'none';
                    input.removeAttribute('required');
                    select.setAttribute('required', 'required');
                }
            });
        }
    }

    // Применяем логику обнуления ко всем кастомным полям
    setupCustomFieldWithReset('custom_city_check', 'custom_city', 'city_id');
    setupCustomFieldWithReset('custom_source_check', 'custom_source', 'source_id');
    setupCustomFieldWithReset('custom_work_format_check', 'custom_work_format', 'work_format_id');
    setupCustomFieldWithReset('custom_education_check', 'custom_education', 'education_id');

    // Улучшение множественных выборов
    const multipleSelects = document.querySelectorAll('select[multiple]');
    multipleSelects.forEach(select => {
        select.style.height = '120px';
        select.style.padding = '8px';
    });

    // Динамические поля для опыта работы
    let workExperienceIndex = {{ old('work_experiences') ? count(old('work_experiences')) : 0 }};
    let educationalInstitutionIndex = {{ old('educational_institutions') ? count(old('educational_institutions')) : 0 }};

    // Добавление опыта работы
    document.getElementById('add_work_experience').addEventListener('click', function() {
        const container = document.getElementById('work_experiences_container');
        const newFieldHtml = `
            <div class="work-experience-item border rounded p-3 mb-3 position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-item" aria-label="Close"></button>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="work_experiences_${workExperienceIndex}_company_name" class="form-label">Название компании <span class="required">*</span></label>
                        <input type="text" class="form-control" id="work_experiences_${workExperienceIndex}_company_name" name="work_experiences[${workExperienceIndex}][company_name]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="work_experiences_${workExperienceIndex}_position" class="form-label">Должность <span class="required">*</span></label>
                        <input type="text" class="form-control" id="work_experiences_${workExperienceIndex}_position" name="work_experiences[${workExperienceIndex}][position]" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="work_experiences_${workExperienceIndex}_start_date" class="form-label">Дата начала <span class="required">*</span></label>
                        <input type="date" class="form-control" id="work_experiences_${workExperienceIndex}_start_date" name="work_experiences[${workExperienceIndex}][start_date]" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="work_experiences_${workExperienceIndex}_end_date" class="form-label">Дата окончания</label>
                        <input type="date" class="form-control" id="work_experiences_${workExperienceIndex}_end_date" name="work_experiences[${workExperienceIndex}][end_date]">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="work_experiences_${workExperienceIndex}_description" class="form-label">Описание обязанностей</label>
                    <textarea class="form-control" id="work_experiences_${workExperienceIndex}_description" name="work_experiences[${workExperienceIndex}][description]" rows="3"></textarea>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newFieldHtml);
        workExperienceIndex++;
    });

    // Добавление образования
    document.getElementById('add_educational_institution').addEventListener('click', function() {
        const container = document.getElementById('educational_institutions_container');
        const newFieldHtml = `
            <div class="educational-institution-item border rounded p-3 mb-3 position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-2 remove-item" aria-label="Close"></button>
                <div class="mb-3">
                    <label for="educational_institutions_${educationalInstitutionIndex}_institution_name" class="form-label">Название учебного заведения <span class="required">*</span></label>
                    <input type="text" class="form-control" id="educational_institutions_${educationalInstitutionIndex}_institution_name" name="educational_institutions[${educationalInstitutionIndex}][institution_name]" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="educational_institutions_${educationalInstitutionIndex}_degree" class="form-label">Степень/Специальность</label>
                        <input type="text" class="form-control" id="educational_institutions_${educationalInstitutionIndex}_degree" name="educational_institutions[${educationalInstitutionIndex}][degree]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="educational_institutions_${educationalInstitutionIndex}_faculty" class="form-label">Факультет</label>
                        <input type="text" class="form-control" id="educational_institutions_${educationalInstitutionIndex}_faculty" name="educational_institutions[${educationalInstitutionIndex}][faculty]">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="educational_institutions_${educationalInstitutionIndex}_start_date" class="form-label">Дата начала обучения</label>
                        <input type="date" class="form-control" id="educational_institutions_${educationalInstitutionIndex}_start_date" name="educational_institutions[${educationalInstitutionIndex}][start_date]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="educational_institutions_${educationalInstitutionIndex}_end_date" class="form-label">Дата окончания обучения</label>
                        <input type="date" class="form-control" id="educational_institutions_${educationalInstitutionIndex}_end_date" name="educational_institutions[${educationalInstitutionIndex}][end_date]">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="educational_institutions_${educationalInstitutionIndex}_description" class="form-label">Дополнительная информация</label>
                    <textarea class="form-control" id="educational_institutions_${educationalInstitutionIndex}_description" name="educational_institutions[${educationalInstitutionIndex}][description]" rows="3"></textarea>
                </div>
            </div>
        `;
        container.insertAdjacentHTML('beforeend', newFieldHtml);
        educationalInstitutionIndex++;
    });

    // Удаление динамических полей
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-item')) {
            event.target.closest('.work-experience-item, .educational-institution-item').remove();
        }
    });

    // Фильтрация навыков по выбранным должностям
    function filterSkillsByPositions() {
        const selectedPositions = Array.from(document.querySelectorAll('input[name="job_positions[]"]:checked')).map(cb => cb.value);
        const skillCheckboxes = document.querySelectorAll('input[name="technical_skills[]"]');
        const skillsPlaceholder = document.getElementById('skills-placeholder');
        
        if (selectedPositions.length === 0) {
            // Если должности не выбраны, скрываем все навыки и показываем сообщение
            skillCheckboxes.forEach(checkbox => {
                const skillItem = checkbox.closest('.form-check');
                skillItem.style.display = 'none';
                checkbox.checked = false; // Снимаем выбор
            });
            if (skillsPlaceholder) {
                skillsPlaceholder.style.display = 'block';
            }
            return;
        }

        // Получаем навыки для выбранных должностей через AJAX
        fetch('/api/positions/skills', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ positions: selectedPositions })
        })
        .then(response => response.json())
        .then(data => {
            const relevantSkillIds = data.skills || [];
            let hasVisibleSkills = false;
            
            skillCheckboxes.forEach(checkbox => {
                const skillItem = checkbox.closest('.form-check');
                const skillId = parseInt(checkbox.value);
                
                if (relevantSkillIds.includes(skillId)) {
                    // Показываем только релевантные навыки
                    skillItem.style.display = 'block';
                    skillItem.style.opacity = '1';
                    hasVisibleSkills = true;
                } else {
                    // Скрываем нерелевантные навыки и снимаем выбор
                    skillItem.style.display = 'none';
                    checkbox.checked = false;
                }
            });
            
            // Показываем/скрываем сообщение в зависимости от наличия навыков
            if (skillsPlaceholder) {
                skillsPlaceholder.style.display = hasVisibleSkills ? 'none' : 'block';
                if (!hasVisibleSkills) {
                    skillsPlaceholder.innerHTML = '<i class="fas fa-info-circle me-2"></i>У выбранных должностей нет назначенных технических навыков';
                }
            }
        })
        .catch(error => {
            console.log('Ошибка при получении навыков:', error);
            // В случае ошибки скрываем все навыки и показываем сообщение
            skillCheckboxes.forEach(checkbox => {
                const skillItem = checkbox.closest('.form-check');
                skillItem.style.display = 'none';
                checkbox.checked = false;
            });
            if (skillsPlaceholder) {
                skillsPlaceholder.style.display = 'block';
                skillsPlaceholder.innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Ошибка загрузки навыков. Попробуйте еще раз.';
            }
        });
    }

    // Добавляем обработчики событий для должностей
    document.querySelectorAll('input[name="job_positions[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', filterSkillsByPositions);
    });

    // Инициализируем фильтрацию при загрузке страницы
    // Сначала скрываем все навыки и показываем сообщение
    const skillCheckboxes = document.querySelectorAll('input[name="technical_skills[]"]');
    const skillsPlaceholder = document.getElementById('skills-placeholder');
    
    skillCheckboxes.forEach(checkbox => {
        const skillItem = checkbox.closest('.form-check');
        skillItem.style.display = 'none';
        checkbox.checked = false;
    });
    
    if (skillsPlaceholder) {
        skillsPlaceholder.style.display = 'block';
    }
    
    // Затем применяем фильтрацию если есть выбранные должности
    filterSkillsByPositions();
});
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
