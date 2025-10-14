@extends('admin.layouts.app')

@section('title', 'Просмотр портфолио')
@section('page-title', 'Просмотр портфолио')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-eye me-2"></i>
                    Просмотр портфолио
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Основная информация -->
                    <div class="col-lg-8">
                        <!-- Изображение -->
                        @if($portfolio->getFirstMediaUrl('portfolio-images'))
                            <div class="mb-4">
                                <img src="{{ $portfolio->getFirstMediaUrl('portfolio-images') }}" 
                                     alt="{{ $portfolio->translation('ru')->title ?? '' }}" 
                                     class="img-fluid rounded shadow-sm">
                            </div>
                        @endif

                        <!-- Названия на разных языках -->
                        <div class="mb-4">
                            <h3 class="border-bottom pb-2 mb-3">Название</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <strong>Русский</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $portfolio->translation('ru')->title ?? 'Не указано' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <strong>English</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $portfolio->translation('en')->title ?? 'Не указано' }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card bg-light">
                                        <div class="card-header">
                                            <strong>Türkmen</strong>
                                        </div>
                                        <div class="card-body">
                                            <h5>{{ $portfolio->translation('tm')->title ?? 'Не указано' }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Описания -->
                        @if($portfolio->translation('ru')->description || $portfolio->translation('en')->description || $portfolio->translation('tm')->description)
                            <div class="mb-4">
                                <h4 class="border-bottom pb-2 mb-3">Описание</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Русский</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('ru')->description ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>English</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('en')->description ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Türkmen</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('tm')->description ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Заказчик -->
                        @if($portfolio->translation('ru')->who || $portfolio->translation('en')->who || $portfolio->translation('tm')->who)
                            <div class="mb-4">
                                <h4 class="border-bottom pb-2 mb-3">Заказчик</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Русский</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('ru')->who ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>English</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('en')->who ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Türkmen</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('tm')->who ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Цель проекта -->
                        @if($portfolio->translation('ru')->target || $portfolio->translation('en')->target || $portfolio->translation('tm')->target)
                            <div class="mb-4">
                                <h4 class="border-bottom pb-2 mb-3">Цель проекта</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Русский</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('ru')->target ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>English</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('en')->target ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Türkmen</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('tm')->target ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Результат -->
                        @if($portfolio->translation('ru')->result || $portfolio->translation('en')->result || $portfolio->translation('tm')->result)
                            <div class="mb-4">
                                <h4 class="border-bottom pb-2 mb-3">Результат</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Русский</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('ru')->result ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>English</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('en')->result ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Türkmen</strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-0">{{ $portfolio->translation('tm')->result ?? 'Не указано' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Боковая панель -->
                    <div class="col-lg-4">
                        <!-- Статус и настройки -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Статус и настройки</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <strong>Статус:</strong>
                                    @if($portfolio->status)
                                        <span class="badge bg-success ms-2">Активен</span>
                                    @else
                                        <span class="badge bg-secondary ms-2">Неактивен</span>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <strong>На главной странице:</strong>
                                    @if($portfolio->is_main_page)
                                        <span class="badge bg-warning ms-2">Да</span>
                                    @else
                                        <span class="badge bg-light text-dark ms-2">Нет</span>
                                    @endif
                                </div>

                                @if($portfolio->url_button)
                                    <div class="mb-3">
                                        <strong>URL кнопки:</strong>
                                        <div class="mt-1">
                                            <a href="{{ $portfolio->url_button }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-external-link-alt me-1"></i>
                                                Открыть
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if($portfolio->when)
                                    <div class="mb-3">
                                        <strong>Дата проекта:</strong>
                                        <div class="mt-1">{{ $portfolio->when->format('d.m.Y') }}</div>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <strong>Порядок сортировки:</strong>
                                    <div class="mt-1">{{ $portfolio->ordering }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Категории -->
                        @if($portfolio->categories->count() > 0)
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6 class="mb-0">Категории</h6>
                                </div>
                                <div class="card-body">
                                    @foreach($portfolio->categories as $category)
                                        <span class="badge bg-primary me-1 mb-2">
                                            {{ $category->translation('ru')->name ?? 'Категория' }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Информация о записи -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="mb-0">Информация о записи</h6>
                            </div>
                            <div class="card-body">
                                <div class="small">
                                    <div class="mb-2">
                                        <strong>ID:</strong> {{ $portfolio->id }}
                                    </div>
                                    <div class="mb-2">
                                        <strong>Slug:</strong> {{ $portfolio->slug }}
                                    </div>
                                    <div class="mb-2">
                                        <strong>Создан:</strong> {{ $portfolio->created_at->format('d.m.Y H:i') }}
                                    </div>
                                    <div class="mb-0">
                                        <strong>Обновлен:</strong> {{ $portfolio->updated_at->format('d.m.Y H:i') }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Действия -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Действия</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>
                                        Редактировать
                                    </a>
                                    <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left me-2"></i>
                                        Назад к списку
                                    </a>
                                    <form method="POST" action="{{ route('admin.portfolios.destroy', $portfolio->id) }}" 
                                          class="d-inline" onsubmit="return confirm('Вы уверены, что хотите удалить это портфолио?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100">
                                            <i class="fas fa-trash me-2"></i>
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection