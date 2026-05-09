<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreWorkFormatRequest;
use App\Http\Requests\Admin\UpdateWorkFormatRequest;
use App\Models\WorkFormat;
use Illuminate\Support\Str;

class WorkFormatController extends Controller
{
    public function index()
    {
        $workFormats = WorkFormat::ordered()->paginate(20);
        
        return view('admin.work-formats.index', [
            'workFormats' => $workFormats,
        ]);
    }

    public function create()
    {
        return view('admin.work-formats.create');
    }

    public function store(StoreWorkFormatRequest $request)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        $data['slug'] = $this->makeSlug($data['name_ru']);

        WorkFormat::create($data);

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно создан');
    }

    public function edit(WorkFormat $workFormat)
    {
        return view('admin.work-formats.edit', [
            'workFormat' => $workFormat,
        ]);
    }

    public function update(UpdateWorkFormatRequest $request, WorkFormat $workFormat)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        $data['slug'] = $this->makeSlug($data['name_ru'], (string) $workFormat->id);

        $workFormat->update($data);

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно обновлен');
    }

    public function destroy(WorkFormat $workFormat)
    {
        $workFormat->delete();

        return redirect()->route('admin.work-formats.index')
            ->with('success', 'Формат работы успешно удален');
    }

    /**
     * @return string
     */
    private function makeSlug(string $value, ?string $suffix = null): string
    {
        return Str::slug($value) . '-' . ($suffix ?? time());
    }
}