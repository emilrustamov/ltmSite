<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobPosition;
use App\Models\TechnicalSkill;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class JobPositionController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра должностей');
        }

        $jobPositions = JobPosition::with('technicalSkills')->ordered()->paginate(20);

        return view('admin.job-positions.index', [
            'jobPositions' => $jobPositions,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания должностей');
        }

        $technicalSkills = TechnicalSkill::all();

        return view('admin.job-positions.create', compact('technicalSkills'));
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания должностей');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',
            'responsibilities_ru' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'responsibilities_tm' => 'nullable|string',
            'benefits_ru' => 'nullable|string',
            'benefits_en' => 'nullable|string',
            'benefits_tm' => 'nullable|string',
            'employment_type_ru' => 'nullable|string|max:255',
            'employment_type_en' => 'nullable|string|max:255',
            'employment_type_tm' => 'nullable|string|max:255',
            'work_format_ru' => 'nullable|string|max:255',
            'work_format_en' => 'nullable|string|max:255',
            'work_format_tm' => 'nullable|string|max:255',
            'salary_ru' => 'nullable|string|max:255',
            'salary_en' => 'nullable|string|max:255',
            'salary_tm' => 'nullable|string|max:255',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
        ]);

        $data = $request->except(['technical_skills']);

        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->has('is_active') ? (bool) $request->is_active : false;
        $data['status'] = $request->has('status') ? (bool) $request->status : false;
        $data['slug'] = Str::slug($data['name_ru']) . '-' . time();
        $jobPosition = JobPosition::create($data);

        // Синхронизация навыков (изображение удалено)
        $jobPosition->technicalSkills()->sync($request->technical_skills ?? []);

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно создана');
    }

    public function edit(JobPosition $jobPosition)
    {
        // Проверка разрешения на редактирование должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования должностей');
        }

        $jobPosition->load('technicalSkills');
        $technicalSkills = TechnicalSkill::all();

        return view('admin.job-positions.edit', compact('jobPosition', 'technicalSkills'));
    }

    public function update(Request $request, JobPosition $jobPosition)
    {
        // Проверка разрешения на редактирование должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования должностей');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'description_ru' => 'nullable|string',
            'description_en' => 'nullable|string',
            'description_tm' => 'nullable|string',
            'responsibilities_ru' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'responsibilities_tm' => 'nullable|string',
            'benefits_ru' => 'nullable|string',
            'benefits_en' => 'nullable|string',
            'benefits_tm' => 'nullable|string',
            'employment_type_ru' => 'nullable|string|max:255',
            'employment_type_en' => 'nullable|string|max:255',
            'employment_type_tm' => 'nullable|string|max:255',
            'work_format_ru' => 'nullable|string|max:255',
            'work_format_en' => 'nullable|string|max:255',
            'work_format_tm' => 'nullable|string|max:255',
            'salary_ru' => 'nullable|string|max:255',
            'salary_en' => 'nullable|string|max:255',
            'salary_tm' => 'nullable|string|max:255',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
        ]);

        $data = $request->except(['technical_skills']);

        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->has('is_active') ? (bool) $request->is_active : false;
        $data['status'] = $request->has('status') ? (bool) $request->status : false;

        $jobPosition->update($data);

        // Синхронизация навыков (изображение удалено)
        $jobPosition->technicalSkills()->sync($request->technical_skills ?? []);

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно обновлена');
    }

    public function destroy(JobPosition $jobPosition)
    {
        // Проверка разрешения на удаление должностей
        if (!Auth::user()->hasPermission(Permissions::POSITIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления должностей');
        }

        $jobPosition->delete();

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно удалена');
    }
}