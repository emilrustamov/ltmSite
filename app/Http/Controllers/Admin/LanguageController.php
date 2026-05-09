<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreLanguageRequest;
use App\Http\Requests\Admin\UpdateLanguageRequest;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::ordered()->paginate(20);
        
        return view('admin.languages.index', [
            'languages' => $languages,
        ]);
    }

    public function create()
    {
        return view('admin.languages.create');
    }

    public function store(StoreLanguageRequest $request)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'code', 'sort_order']);
        
        Language::create($data);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно создан');
    }

    public function edit(Language $language)
    {
        return view('admin.languages.edit', [
            'language' => $language,
        ]);
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'code', 'sort_order', 'is_active']);
        
        $language->update($data);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно обновлен');
    }

    public function destroy(Language $language)
    {
        $language->delete();

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно удален');
    }
}