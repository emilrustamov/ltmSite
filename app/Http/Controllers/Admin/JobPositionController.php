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

        return view('admin.job-positions.create');
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
            'image' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,webp',
            'status' => 'nullable|boolean',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
        ]);

        $data = $request->only([
            'name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active',
            'description_ru', 'description_en', 'description_tm',
            'responsibilities_ru', 'responsibilities_en', 'responsibilities_tm',
            'benefits_ru', 'benefits_en', 'benefits_tm',
            'status', 'ordering'
        ]);
        
        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->has('is_active') ? (bool)$request->is_active : false;
        $data['status'] = $request->has('status') ? (bool)$request->status : false;
        $data['slug'] = Str::slug($data['name_ru']) . '-' . time();
        $data['image'] = ''; // Инициализируем пустой строкой

        $jobPosition = JobPosition::create($data);

        // Обработка изображения
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('uploads/jobs', $filename, 'public');
            $jobPosition->update(['image' => 'storage/' . $path]);
        }

        // Синхронизация навыков
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
        
        return view('admin.job-positions.edit', [
            'jobPosition' => $jobPosition,
        ]);
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
            'image' => 'nullable|image|max:10240|mimes:jpeg,png,jpg,gif,webp',
            'status' => 'nullable|boolean',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
        ]);

        $data = $request->only([
            'name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active',
            'description_ru', 'description_en', 'description_tm',
            'responsibilities_ru', 'responsibilities_en', 'responsibilities_tm',
            'benefits_ru', 'benefits_en', 'benefits_tm',
            'status', 'ordering'
        ]);
        
        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->has('is_active') ? (bool)$request->is_active : false;
        $data['status'] = $request->has('status') ? (bool)$request->status : false;
        
        // Обработка изображения
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs('uploads/jobs', $filename, 'public');
            $data['image'] = 'storage/' . $path;
        }
        
        $jobPosition->update($data);

        // Синхронизация навыков
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