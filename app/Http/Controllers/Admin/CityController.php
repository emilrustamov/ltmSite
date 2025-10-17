<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Constants\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function index()
    {
        // Проверка разрешения на просмотр городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра городов');
        }

        $cities = City::ordered()->paginate(20);
        
        return view('admin.cities.index', [
            'cities' => $cities,
        ]);
    }

    public function create()
    {
        // Проверка разрешения на создание городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания городов');
        }

        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        // Проверка разрешения на создание городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_CREATE)) {
            abort(403, 'У вас нет прав для создания городов');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        
        City::create($data);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно создан');
    }

    public function edit(City $city)
    {
        // Проверка разрешения на редактирование городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования городов');
        }

        return view('admin.cities.edit', [
            'city' => $city,
        ]);
    }

    public function update(Request $request, City $city)
    {
        // Проверка разрешения на редактирование городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования городов');
        }

        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'name_tm' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $city->update($data);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно обновлен');
    }

    public function destroy(City $city)
    {
        // Проверка разрешения на удаление городов
        if (!Auth::user()->hasPermission(Permissions::APPLICATIONS_DELETE)) {
            abort(403, 'У вас нет прав для удаления городов');
        }

        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно удален');
    }
}