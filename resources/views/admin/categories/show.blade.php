@extends('admin.layouts.app')

@section('title', 'Просмотр категории - Админ-панель')

@section('page-title', 'Просмотр категории')

@section('breadcrumbs')
    <li class="inline-flex items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-blue-600">
            <i class="fas fa-home mr-2"></i>Dashboard
        </a>
    </li>
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <a href="{{ route('admin.categories.index') }}" class="text-gray-700 hover:text-blue-600">Категории</a>
        </div>
    </li>
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-gray-500">Просмотр</span>
        </div>
    </li>
@endsection

@section('content')
<div class="max-w-4xl">
    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">{{ $category->translation('ru')->name ?? 'Категория' }}</h2>
            <p class="text-gray-600">ID: {{ $category->id }} | Создана: {{ $category->created_at->format('d.m.Y H:i') }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.categories.edit', $category->id) }}" 
               class="btn-primary inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <i class="fas fa-edit mr-2"></i>
                Редактировать
            </a>
            <a href="{{ route('admin.categories.index') }}" 
               class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Назад к списку
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Category Details -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Детали категории</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <p class="mt-1 text-sm text-gray-900 font-mono">{{ $category->slug }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Количество проектов</label>
                        <p class="mt-1 text-sm text-gray-900">{{ $category->portfolios()->count() }} проектов</p>
                    </div>
                </div>
            </div>

            <!-- Translations -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Переводы</h3>
                
                <div class="space-y-4">
                    @foreach(['ru' => 'Русский', 'en' => 'English', 'tm' => 'Türkmen'] as $locale => $langName)
                        @php
                            $translation = $category->translation($locale);
                        @endphp
                        
                        <div class="border border-gray-200 rounded-lg p-4">
                            <h4 class="font-medium text-gray-900 mb-2">{{ $langName }}</h4>
                            
                            @if($translation)
                                <p class="text-sm text-gray-900">{{ $translation->name }}</p>
                            @else
                                <p class="text-sm text-gray-500 italic">Перевод не найден</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Category Info -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Информация о категории</h3>
                
                <div class="space-y-3">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">ID</label>
                        <p class="text-sm text-gray-900">#{{ $category->id }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Slug</label>
                        <p class="text-sm text-gray-900 font-mono">{{ $category->slug }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Создана</label>
                        <p class="text-sm text-gray-900">{{ $category->created_at->format('d.m.Y H:i') }}</p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Обновлена</label>
                        <p class="text-sm text-gray-900">{{ $category->updated_at->format('d.m.Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Быстрые действия</h3>
                
                <div class="space-y-2">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" 
                       class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        <i class="fas fa-edit mr-2"></i>
                        Редактировать
                    </a>
                    
                    @if($category->portfolios()->count() === 0)
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="w-full inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                    onclick="return confirm('Вы уверены, что хотите удалить эту категорию?')">
                                <i class="fas fa-trash mr-2"></i>
                                Удалить
                            </button>
                        </form>
                    @else
                        <div class="text-center p-3 bg-yellow-50 border border-yellow-200 rounded-md">
                            <p class="text-sm text-yellow-800">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                Нельзя удалить категорию с проектами
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Related Projects -->
    @if($category->portfolios()->count() > 0)
        <div class="mt-6">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Проекты в этой категории</h3>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Название</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Статус</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Создан</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($category->portfolios()->with('translations')->get() as $portfolio)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        #{{ $portfolio->id }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $portfolio->translation('ru')->title ?? 'Без названия' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $portfolio->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $portfolio->status ? 'Активен' : 'Неактивен' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $portfolio->created_at->format('d.m.Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.projects.show', $portfolio->id) }}" 
                                           class="text-blue-600 hover:text-blue-900 mr-3">Просмотр</a>
                                        <a href="{{ route('admin.projects.edit', $portfolio->id) }}" 
                                           class="text-indigo-600 hover:text-indigo-900">Редактировать</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
