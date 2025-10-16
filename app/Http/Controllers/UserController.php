<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Показать список пользователей
     */
    public function index()
    {
        // Проверяем права на просмотр пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_VIEW)) {
            abort(403, 'У вас нет прав для просмотра пользователей');
        }

        $users = User::with('permissions')->paginate(20);
        
        return view('admin.users.index', compact('users'));
    }

    /**
     * Показать форму создания пользователя
     */
    public function create()
    {
        // Проверяем права на создание пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_CREATE)) {
            abort(403, 'У вас нет прав для создания пользователей');
        }

        return view('admin.users.create');
    }

    /**
     * Создать нового пользователя
     */
    public function store(Request $request)
    {
        // Проверяем права на создание пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_CREATE)) {
            abort(403, 'У вас нет прав для создания пользователей');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь успешно создан');
    }


    /**
     * Показать форму редактирования пользователя
     */
    public function edit(User $user)
    {
        // Проверяем права на редактирование пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования пользователей');
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Обновить пользователя
     */
    public function update(Request $request, User $user)
    {
        // Проверяем права на редактирование пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_EDIT)) {
            abort(403, 'У вас нет прав для редактирования пользователей');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь успешно обновлен');
    }

    /**
     * Удалить пользователя
     */
    public function destroy(User $user)
    {
        // Проверяем права на удаление пользователей
        if (!Auth::user()->hasPermission(Permissions::USERS_DELETE)) {
            abort(403, 'У вас нет прав для удаления пользователей');
        }

        // Нельзя удалить самого себя
        if ($user->id === Auth::id()) {
            return redirect()->route('admin.users.index')
                ->with('error', 'Вы не можете удалить самого себя');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'Пользователь успешно удален');
    }
}