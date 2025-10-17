<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobPositionController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра должностей');
        }

        $jobPositions = JobPosition::ordered()->paginate(20);
        
        return view('admin.job-positions.index', [
            'jobPositions' => $jobPositions,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания должностей');
        }

        return view('admin.job-positions.create');
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания должностей');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        $data['slug'] = Str::slug($data['name_ru']) . '-' . time();

        JobPosition::create($data);

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно создана');
    }

    public function edit(JobPosition $jobPosition)
    {
        // Проверка разрешения на редактирование должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования должностей');
        }

        return view('admin.job-positions.edit', [
            'jobPosition' => $jobPosition,
        ]);
    }

    public function update(Request $request, JobPosition $jobPosition)
    {
        // Проверка разрешения на редактирование должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования должностей');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $jobPosition->update($data);

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно обновлена');
    }

    public function destroy(JobPosition $jobPosition)
    {
        // Проверка разрешения на удаление должностей
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления должностей');
        }

        $jobPosition->delete();

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно удалена');
    }
}