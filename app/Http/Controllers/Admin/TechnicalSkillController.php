<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnicalSkill;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicalSkillController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра навыков');
        }

        $technicalSkills = TechnicalSkill::ordered()->paginate(20);
        
        return view('admin.technical-skills.index', [
            'technicalSkills' => $technicalSkills,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания навыков');
        }

        return view('admin.technical-skills.create');
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания навыков');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        $data['slug'] = \Illuminate\Support\Str::slug($data['name_ru']) . '-' . time();
        
        TechnicalSkill::create($data);

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно создан');
    }

    public function edit(TechnicalSkill $technicalSkill)
    {
        // Проверка разрешения на редактирование навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования навыков');
        }

        return view('admin.technical-skills.edit', [
            'technicalSkill' => $technicalSkill,
        ]);
    }

    public function update(Request $request, TechnicalSkill $technicalSkill)
    {
        // Проверка разрешения на редактирование навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования навыков');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $technicalSkill->update($data);

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно обновлен');
    }

    public function destroy(TechnicalSkill $technicalSkill)
    {
        // Проверка разрешения на удаление навыков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления навыков');
        }

        $technicalSkill->delete();

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно удален');
    }
}