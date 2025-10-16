<?php

namespace App\Http\Controllers;

use App\Constants\Permissions;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPermissionController extends Controller
{
    /**
     * Показать страницу управления правами пользователя
     */
    public function edit(User $user)
    {
        // Проверяем права доступа
        if (!Auth::user()->hasPermission(Permissions::USERS_PERMISSIONS)) {
            abort(403, 'У вас нет прав для управления правами пользователей');
        }

        $permissions = Permission::all();
        $userPermissions = $user->permissions->pluck('name')->toArray();

        return view('admin.users.permissions', compact('user', 'permissions', 'userPermissions'));
    }

    /**
     * Обновить права пользователя
     */
    public function update(Request $request, User $user)
    {
        // Проверяем права доступа
        if (!Auth::user()->hasPermission(Permissions::USERS_PERMISSIONS)) {
            abort(403, 'У вас нет прав для управления правами пользователей');
        }

        $request->validate([
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,name'
        ]);

        // Синхронизируем права пользователя
        $user->syncPermissions($request->input('permissions', []));
        
        // Очищаем кэш разрешений пользователя
        $user->clearPermissionsCache();

        return redirect()->route('admin.users.index')
            ->with('success', 'Права пользователя успешно обновлены');
    }

    /**
     * Дать разрешение пользователю
     */
    public function givePermission(User $user, Permission $permission)
    {
        // Проверяем права доступа
        if (!Auth::user()->hasPermission(Permissions::USERS_PERMISSIONS)) {
            abort(403, 'У вас нет прав для управления правами пользователей');
        }

        $user->givePermission($permission->name);

        return response()->json([
            'success' => true,
            'message' => 'Разрешение успешно назначено'
        ]);
    }

    /**
     * Отозвать разрешение у пользователя
     */
    public function revokePermission(User $user, Permission $permission)
    {
        // Проверяем права доступа
        if (!Auth::user()->hasPermission(Permissions::USERS_PERMISSIONS)) {
            abort(403, 'У вас нет прав для управления правами пользователей');
        }

        $user->revokePermission($permission->name);

        return response()->json([
            'success' => true,
            'message' => 'Разрешение успешно отозвано'
        ]);
    }
}
