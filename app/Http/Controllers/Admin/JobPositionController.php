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
            'responsibilities_ru' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'responsibilities_tm' => 'nullable|string',
            'employment_type' => 'nullable|in:full-time,part-time,contract,temporary,internship,volunteer',
            'work_format' => 'nullable|in:on-site,remote,hybrid',
            'salary_ru' => 'nullable|string|max:255',
            'salary_en' => 'nullable|string|max:255',
            'salary_tm' => 'nullable|string|max:255',
            'requirements_ru' => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'requirements_tm' => 'nullable|string',
            'conditions_ru' => 'nullable|string',
            'conditions_en' => 'nullable|string',
            'conditions_tm' => 'nullable|string',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
            'new_technical_skills' => 'nullable|array',
            'new_technical_skills.*.name_ru' => 'required_with:new_technical_skills|string|max:255',
            'new_technical_skills.*.name_en' => 'nullable|string|max:255',
            'new_technical_skills.*.name_tm' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['technical_skills', 'new_technical_skills']);

        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->boolean('is_active', false);
        $data['status'] = $request->boolean('status', false);
        $data['slug'] = Str::slug($data['name_ru']) . '-' . time();
        $jobPosition = JobPosition::create($data);

        // Обработка существующих навыков
        $skillIds = $request->technical_skills ?? [];

        // Обработка новых навыков
        if ($request->has('new_technical_skills') && is_array($request->new_technical_skills)) {
            $baseTimestamp = (int)(microtime(true) * 1000); // Миллисекунды для уникальности
            $counter = 0;
            
            foreach ($request->new_technical_skills as $newSkill) {
                if (!empty($newSkill['name_ru'])) {
                    // Проверяем, не существует ли уже такой навык
                    $existingSkill = TechnicalSkill::where('name_ru', trim($newSkill['name_ru']))->first();
                    
                    if (!$existingSkill) {
                        // Генерируем уникальный slug с использованием миллисекунд и счетчика
                        $baseSlug = Str::slug(trim($newSkill['name_ru']));
                        $slug = $baseSlug . '-' . $baseTimestamp . '-' . $counter;
                        $counter++;
                        
                        // Проверяем уникальность slug и добавляем случайное число если нужно
                        while (TechnicalSkill::where('slug', $slug)->exists()) {
                            $slug = $baseSlug . '-' . $baseTimestamp . '-' . $counter . '-' . rand(1000, 9999);
                            $counter++;
                        }
                        
                        // Создаём новый навык
                        $skill = TechnicalSkill::create([
                            'name_ru' => trim($newSkill['name_ru']),
                            'name_en' => !empty($newSkill['name_en']) ? trim($newSkill['name_en']) : null,
                            'name_tm' => !empty($newSkill['name_tm']) ? trim($newSkill['name_tm']) : null,
                            'slug' => $slug,
                            'is_active' => true,
                        ]);
                        $skillIds[] = $skill->id;
                    } else {
                        // Если навык уже существует, добавляем его ID
                        if (!in_array($existingSkill->id, $skillIds)) {
                            $skillIds[] = $existingSkill->id;
                        }
                    }
                }
            }
        }

        // Синхронизация навыков
        $jobPosition->technicalSkills()->sync($skillIds);

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
            'responsibilities_ru' => 'nullable|string',
            'responsibilities_en' => 'nullable|string',
            'responsibilities_tm' => 'nullable|string',
            'employment_type' => 'nullable|in:full-time,part-time,contract,temporary,internship,volunteer',
            'work_format' => 'nullable|in:on-site,remote,hybrid',
            'salary_ru' => 'nullable|string|max:255',
            'salary_en' => 'nullable|string|max:255',
            'salary_tm' => 'nullable|string|max:255',
            'requirements_ru' => 'nullable|string',
            'requirements_en' => 'nullable|string',
            'requirements_tm' => 'nullable|string',
            'conditions_ru' => 'nullable|string',
            'conditions_en' => 'nullable|string',
            'conditions_tm' => 'nullable|string',
            'ordering' => 'nullable|integer|min:0',
            'technical_skills' => 'nullable|array',
            'technical_skills.*' => 'exists:technical_skills,id',
            'new_technical_skills' => 'nullable|array',
            'new_technical_skills.*.name_ru' => 'required_with:new_technical_skills|string|max:255',
            'new_technical_skills.*.name_en' => 'nullable|string|max:255',
            'new_technical_skills.*.name_tm' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['technical_skills', 'new_technical_skills']);

        // Обработка boolean полей (чекбоксы не отправляются, если не отмечены)
        $data['is_active'] = $request->boolean('is_active', false);
        $data['status'] = $request->boolean('status', false);

        $jobPosition->update($data);

        // Обработка существующих навыков
        $skillIds = $request->technical_skills ?? [];

        // Обработка новых навыков
        if ($request->has('new_technical_skills') && is_array($request->new_technical_skills)) {
            $baseTimestamp = (int)(microtime(true) * 1000); // Миллисекунды для уникальности
            $counter = 0;
            
            foreach ($request->new_technical_skills as $newSkill) {
                if (!empty($newSkill['name_ru'])) {
                    // Проверяем, не существует ли уже такой навык
                    $existingSkill = TechnicalSkill::where('name_ru', trim($newSkill['name_ru']))->first();
                    
                    if (!$existingSkill) {
                        // Генерируем уникальный slug с использованием миллисекунд и счетчика
                        $baseSlug = Str::slug(trim($newSkill['name_ru']));
                        $slug = $baseSlug . '-' . $baseTimestamp . '-' . $counter;
                        $counter++;
                        
                        // Проверяем уникальность slug и добавляем случайное число если нужно
                        while (TechnicalSkill::where('slug', $slug)->exists()) {
                            $slug = $baseSlug . '-' . $baseTimestamp . '-' . $counter . '-' . rand(1000, 9999);
                            $counter++;
                        }
                        
                        // Создаём новый навык
                        $skill = TechnicalSkill::create([
                            'name_ru' => trim($newSkill['name_ru']),
                            'name_en' => !empty($newSkill['name_en']) ? trim($newSkill['name_en']) : null,
                            'name_tm' => !empty($newSkill['name_tm']) ? trim($newSkill['name_tm']) : null,
                            'slug' => $slug,
                            'is_active' => true,
                        ]);
                        $skillIds[] = $skill->id;
                    } else {
                        // Если навык уже существует, добавляем его ID
                        if (!in_array($existingSkill->id, $skillIds)) {
                            $skillIds[] = $existingSkill->id;
                        }
                    }
                }
            }
        }

        // Синхронизация навыков
        $jobPosition->technicalSkills()->sync($skillIds);

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