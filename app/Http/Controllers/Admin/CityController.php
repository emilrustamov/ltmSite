<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCityRequest;
use App\Http\Requests\Admin\UpdateCityRequest;
use App\Models\City;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::ordered()->paginate(20);
        
        return view('admin.cities.index', [
            'cities' => $cities,
        ]);
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(StoreCityRequest $request)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order']);
        
        City::create($data);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно создан');
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', [
            'city' => $city,
        ]);
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $data = $request->only(['name_ru', 'name_en', 'name_tm', 'sort_order', 'is_active']);
        
        $city->update($data);

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно обновлен');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.cities.index')
            ->with('success', 'Город успешно удален');
    }
}