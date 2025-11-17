@extends('admin.layouts.app')

@section('title', 'Просмотр заявки')
@section('page-title', 'Просмотр заявки')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="mb-1">
            <i class="fas fa-eye me-2"></i>
            Заявка кандидата: {{ $application->name ?? '' }} {{ $application->surname }}
        </h4>
        <small class="text-muted">ID: #{{ $application->id }} | Создана: {{ $application->created_at->format('d.m.Y H:i') }}</small>
    </div>
    <div>
        <a href="{{ route('admin.applications.index') }}" class="btn btn-outline-secondary me-2">
            <i class="fas fa-arrow-left me-2"></i>
            Назад к списку
        </a>
        @if(Auth::user()->hasPermission('applications.delete'))
        <button type="button" 
                class="btn btn-outline-danger delete-application" 
                data-application-id="{{ $application->id }}"
                data-application-name="{{ $application->name ?? '' }} {{ $application->surname }}">
            <i class="fas fa-trash me-2"></i>
            Удалить
        </button>
        @endif
    </div>
</div>

<div class="row">
    <!-- Основная информация -->
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user me-2"></i>
                    Личная информация
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Имя</label>
                            <p class="mb-0">{{ $application->name ?? 'Не указано' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Фамилия</label>
                            <p class="mb-0">{{ $application->surname }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <p class="mb-0">
                                <a href="mailto:{{ $application->email }}" class="text-decoration-none">
                                    <i class="fas fa-envelope me-1"></i>
                                    {{ $application->email }}
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Телефон</label>
                            <p class="mb-0">
                                <a href="tel:{{ $application->phone }}" class="text-decoration-none">
                                    <i class="fas fa-phone me-1"></i>
                                    {{ $application->phone }}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Дата рождения</label>
                            <p class="mb-0">{{ $application->date_of_birth ? $application->date_of_birth->format('d.m.Y') : 'Не указана' }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ожидаемая зарплата</label>
                            <p class="mb-0">{{ $application->expected_salary ? number_format($application->expected_salary, 0, ',', ' ') : 'Не указана' }}</p>
                        </div>
                    </div>
                </div>

                @if($application->personal_info)
                <div class="mb-3">
                    <label class="form-label fw-bold">Личная информация</label>
                    <p class="mb-0">{{ $application->personal_info }}</p>
                </div>
                @endif

                @if($application->contact_info)
                <div class="mb-3">
                    <label class="form-label fw-bold">Контактная информация</label>
                    <p class="mb-0">{{ $application->contact_info }}</p>
                </div>
                @endif

                <div class="row">
                    @if($application->linkedin_url)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">LinkedIn</label>
                            <p class="mb-0">
                                <a href="{{ $application->linkedin_url }}" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-linkedin me-1"></i>
                                    {{ $application->linkedin_url }}
                                </a>
                            </p>
                        </div>
                    </div>
                    @endif
                    @if($application->github_url)
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">GitHub</label>
                            <p class="mb-0">
                                <a href="{{ $application->github_url }}" target="_blank" class="text-decoration-none">
                                    <i class="fab fa-github me-1"></i>
                                    {{ $application->github_url }}
                                </a>
                            </p>
                        </div>
                    </div>
                    @endif
                </div>

                @if($application->professional_plans)
                <div class="mb-3">
                    <label class="form-label fw-bold">Профессиональные планы</label>
                    <p class="mb-0">{{ $application->professional_plans }}</p>
                </div>
                @endif

                @if($application->other_notes)
                <div class="mb-3">
                    <label class="form-label fw-bold">Другие заметки</label>
                    <p class="mb-0">{{ $application->other_notes }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Опыт работы -->
        @if($application->workExperiences->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-briefcase me-2"></i>
                    Опыт работы
                </h5>
            </div>
            <div class="card-body">
                @foreach($application->workExperiences as $experience)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-1">{{ $experience->position }}</h6>
                            <p class="text-muted mb-1">{{ $experience->company_name }}</p>
                            <small class="text-muted">
                                {{ $experience->start_date->format('m.Y') }} - 
                                {{ $experience->end_date ? $experience->end_date->format('m.Y') : 'настоящее время' }}
                            </small>
                        </div>
                    </div>
                    @if($experience->description)
                    <div class="mt-2">
                        <p class="mb-0">{{ $experience->description }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Образование -->
        @if($application->educationalInstitutions->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-graduation-cap me-2"></i>
                    Образование
                </h5>
            </div>
            <div class="card-body">
                @foreach($application->educationalInstitutions as $education)
                <div class="border rounded p-3 mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h6 class="mb-1">{{ $education->institution_name }}</h6>
                            @if($education->degree)
                            <p class="text-muted mb-1">{{ $education->degree }}</p>
                            @endif
                            @if($education->faculty)
                            <p class="text-muted mb-1">Факультет: {{ $education->faculty }}</p>
                            @endif
                            @if($education->start_date || $education->end_date)
                            <small class="text-muted">
                                @if($education->start_date)
                                    {{ $education->start_date->format('Y') }}
                                @endif
                                @if($education->start_date && $education->end_date) - @endif
                                @if($education->end_date)
                                    {{ $education->end_date->format('Y') }}
                                @endif
                            </small>
                            @endif
                        </div>
                    </div>
                    @if($education->description)
                    <div class="mt-2">
                        <p class="mb-0">{{ $education->description }}</p>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>

    <!-- Дополнительная информация -->
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>
                    Дополнительная информация
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Город</label>
                    <p class="mb-0">{{ $application->city?->name_ru ?? $application->custom_city ?? 'Не указан' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Адрес по прописке</label>
                    <p class="mb-0">{{ $application->registration_address }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Источник информации</label>
                    <p class="mb-0">{{ $application->source?->name_ru ?? $application->custom_source ?? 'Не указан' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Формат работы</label>
                    <p class="mb-0">{{ $application->workFormat?->name_ru ?? $application->custom_work_format ?? 'Не указан' }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Образование</label>
                    <p class="mb-0">{{ $application->education?->name_ru ?? $application->custom_education ?? 'Не указано' }}</p>
                </div>

                @if($application->custom_technical_skill)
                <div class="mb-3">
                    <label class="form-label fw-bold">Дополнительные навыки</label>
                    <p class="mb-0">{{ $application->custom_technical_skill }}</p>
                </div>
                @endif

                @if($application->custom_language)
                <div class="mb-3">
                    <label class="form-label fw-bold">Дополнительный язык</label>
                    <p class="mb-0">{{ $application->custom_language }}</p>
                </div>
                @endif

                <div class="mb-3">
                    <label class="form-label fw-bold">Статус</label>
                    <p class="mb-0">
                        @if($application->status)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </p>
                </div>

                @if($application->cv_file)
                <div class="mb-3">
                    <label class="form-label fw-bold">CV/Резюме</label>
                    <p class="mb-0">
                        <a href="{{ route('admin.applications.download-cv', $application) }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-download me-1"></i>
                            Скачать CV
                        </a>
                    </p>
                </div>
                @endif
            </div>
        </div>

        <!-- Интересующие должности -->
        @if($application->jobPositions->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-user-tie me-2"></i>
                    Интересующие должности
                </h5>
            </div>
            <div class="card-body">
                @foreach($application->jobPositions as $position)
                <span class="badge bg-primary me-1 mb-1">{{ $position->name_ru }}</span>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Технические навыки -->
        @if($application->technicalSkills->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-code me-2"></i>
                    Технические навыки
                </h5>
            </div>
            <div class="card-body">
                @foreach($application->technicalSkills as $skill)
                <span class="badge bg-info me-1 mb-1">{{ $skill->name_ru }}</span>
                @endforeach
            </div>
        </div>
        @endif

        <!-- Языки -->
        @if($application->languages->count() > 0)
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-language me-2"></i>
                    Языки
                </h5>
            </div>
            <div class="card-body">
                @foreach($application->languages as $language)
                <span class="badge bg-warning me-1 mb-1">{{ $language->name_ru }}</span>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Подтверждение удаления
    document.querySelectorAll('.delete-application').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const applicationId = this.getAttribute('data-application-id');
            const applicationName = this.getAttribute('data-application-name');
            
            if (confirm(`Вы уверены, что хотите удалить заявку "${applicationName}"?\n\nЭто действие нельзя отменить.`)) {
                // Создаем форму для отправки DELETE запроса
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `{{ route('admin.applications.destroy', '') }}/${applicationId}`;
                
                // Добавляем CSRF токен
                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                form.appendChild(csrfToken);
                
                // Добавляем метод DELETE
                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';
                form.appendChild(methodField);
                
                // Отправляем форму
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
});
</script>
@endsection
