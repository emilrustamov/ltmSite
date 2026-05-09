<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTechnicalSkillRequest;
use App\Http\Requests\Admin\UpdateTechnicalSkillRequest;
use App\Models\TechnicalSkill;
use Illuminate\Support\Str;

class TechnicalSkillController extends Controller
{
    public function index()
    {
        $technicalSkills = TechnicalSkill::ordered()->paginate(20);
        
        return view('admin.technical-skills.index', [
            'technicalSkills' => $technicalSkills,
        ]);
    }

    public function create()
    {
        return view('admin.technical-skills.create');
    }

    public function store(StoreTechnicalSkillRequest $request)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        $data['slug'] = Str::slug($data['name_ru']) . '-' . time();
        
        TechnicalSkill::create($data);

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно создан');
    }

    public function edit(TechnicalSkill $technicalSkill)
    {
        return view('admin.technical-skills.edit', [
            'technicalSkill' => $technicalSkill,
        ]);
    }

    public function update(UpdateTechnicalSkillRequest $request, TechnicalSkill $technicalSkill)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $technicalSkill->update($data);

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно обновлен');
    }

    public function destroy(TechnicalSkill $technicalSkill)
    {
        $technicalSkill->delete();

        return redirect()->route('admin.technical-skills.index')
            ->with('success', 'Навык успешно удален');
    }
}