<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkFormat;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WorkFormatController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_VIEW)) {
            abort(403, 'У вас нет прав для просмотра форматов работы');
        }

        $workFormats = WorkFormat::ordered()->paginate(20);
        
        return view('admin.work-formats.index', [
            'workFormats' => $workFormats,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_CREATE)) {
            abort(403, 'У вас нет прав для создания форматов работы');
        }

        return view('admin.work-formats.create');
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_CREATE)) {
            abort(403, 'У вас нет прав для создания форматов работы');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        
        WorkFormat::create($data);

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно создан');
    }

    public function edit(WorkFormat $workFormat)
    {
        // Проверка разрешения на редактирование форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования форматов работы');
        }

        return view('admin.work-formats.edit', [
            'workFormat' => $workFormat,
        ]);
    }

    public function update(Request $request, WorkFormat $workFormat)
    {
        // Проверка разрешения на редактирование форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_EDIT)) {
            abort(403, 'У вас нет прав для редактирования форматов работы');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $workFormat->update($data);

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно обновлен');
    }

    public function destroy(WorkFormat $workFormat)
    {
        // Проверка разрешения на удаление форматов работы
        if (!Auth::user()->hasPermission(Permissions::VACANCIES_DELETE)) {
            abort(403, 'У вас нет прав для удаления форматов работы');
        }

        $workFormat->delete();

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно удален');
    }
}