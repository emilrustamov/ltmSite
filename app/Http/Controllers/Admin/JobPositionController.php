<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreJobPositionRequest;
use App\Http\Requests\Admin\UpdateJobPositionRequest;
use App\Models\JobPosition;
use App\Models\TechnicalSkill;
use App\Models\WorkFormat;
use Illuminate\Support\Str;

class JobPositionController extends Controller
{
    /**
     * Display job positions list.
     */
    public function index()
    {
        $jobPositions = JobPosition::with('technicalSkills')->ordered()->paginate(20);

        return view('admin.job-positions.index', [
            'jobPositions' => $jobPositions,
        ]);
    }

    /**
     * Show create job position form.
     */
    public function create()
    {
        ['technicalSkills' => $technicalSkills, 'workFormats' => $workFormats] = $this->loadFormOptions();

        return view('admin.job-positions.create', compact('technicalSkills', 'workFormats'));
    }

    /**
     * Store job position.
     */
    public function store(StoreJobPositionRequest $request)
    {
        $data = $this->extractData($request);
        $data['slug'] = $this->makeSlug($data['name_ru']);
        $jobPosition = JobPosition::create($data);

        $jobPosition->technicalSkills()->sync($this->resolveSkillIds($request));

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно создана');
    }

    /**
     * Show edit job position form.
     */
    public function edit(JobPosition $jobPosition)
    {
        $jobPosition->load('technicalSkills');
        ['technicalSkills' => $technicalSkills, 'workFormats' => $workFormats] = $this->loadFormOptions();

        return view('admin.job-positions.edit', compact('jobPosition', 'technicalSkills', 'workFormats'));
    }

    /**
     * Update job position.
     */
    public function update(UpdateJobPositionRequest $request, JobPosition $jobPosition)
    {
        $data = $this->extractData($request);
        $jobPosition->update($data);
        $jobPosition->technicalSkills()->sync($this->resolveSkillIds($request));

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно обновлена');
    }

    /**
     * Delete job position.
     */
    public function destroy(JobPosition $jobPosition)
    {
        $jobPosition->delete();

        return redirect()->route('admin.job-positions.index')
            ->with('success', 'Должность успешно удалена');
    }

    /**
     * Get validation rules.
     */
    private function extractData(StoreJobPositionRequest|UpdateJobPositionRequest $request): array
    {
        $data = $request->except(['technical_skills', 'new_technical_skills']);
        $data['is_active'] = $request->boolean('is_active', false);
        $data['status'] = $request->boolean('status', false);

        return $data;
    }

    /**
     * Resolve full skill ids list.
     */
    private function resolveSkillIds(StoreJobPositionRequest|UpdateJobPositionRequest $request): array
    {
        $skillIds = array_map('intval', (array) $request->input('technical_skills', []));

        foreach ((array) $request->input('new_technical_skills', []) as $newSkill) {
            $nameRu = trim((string) ($newSkill['name_ru'] ?? ''));
            if ($nameRu === '') {
                continue;
            }

            $skill = TechnicalSkill::query()->firstOrCreate(
                ['name_ru' => $nameRu],
                [
                    'name_en' => ($newSkill['name_en'] ?? null) ? trim((string) $newSkill['name_en']) : null,
                    'name_tm' => ($newSkill['name_tm'] ?? null) ? trim((string) $newSkill['name_tm']) : null,
                    'slug' => $this->makeSlug($nameRu, true),
                    'is_active' => true,
                ]
            );

            $skillIds[] = (int) $skill->id;
        }

        return array_values(array_unique($skillIds));
    }

    /**
     * @return array{technicalSkills: \Illuminate\Support\Collection<int, TechnicalSkill>, workFormats: \Illuminate\Support\Collection<int, WorkFormat>}
     */
    private function loadFormOptions(): array
    {
        return [
            'technicalSkills' => TechnicalSkill::query()->get(),
            'workFormats' => WorkFormat::query()->active()->ordered()->get(),
        ];
    }

    /**
     * @return string
     */
    private function makeSlug(string $value, bool $withRandomSuffix = false): string
    {
        $slug = Str::slug($value) . '-' . time();

        if ($withRandomSuffix) {
            $slug .= '-' . random_int(1000, 9999);
        }

        return $slug;
    }
}