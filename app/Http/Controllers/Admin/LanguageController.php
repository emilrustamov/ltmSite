<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра языков');
        }

        $languages = Language::ordered()->paginate(20);
        
        return view('admin.languages.index', [
            'languages' => $languages,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания языков');
        }

        return view('admin.languages.create');
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания языков');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'code' => 'required|string|max:3|unique:languages,code',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'code', 'sort_order']);
        
        Language::create($data);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно создан');
    }

    public function edit(Language $language)
    {
        // Проверка разрешения на редактирование языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования языков');
        }

        return view('admin.languages.edit', [
            'language' => $language,
        ]);
    }

    public function update(Request $request, Language $language)
    {
        // Проверка разрешения на редактирование языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования языков');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'code' => 'required|string|max:3|unique:languages,code,' . $language->id,
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'code', 'sort_order', 'is_active']);
        
        $language->update($data);

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно обновлен');
    }

    public function destroy(Language $language)
    {
        // Проверка разрешения на удаление языков
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления языков');
        }

        $language->delete();

        return redirect()->route('admin.languages.index')
            ->with('success', 'Язык успешно удален');
    }
}