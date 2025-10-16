<?php

namespace App\Traits;

use App\Constants\Permissions;
use App\Models\Permission;

trait HasPermissions
{
    /**
     * Получить разрешения пользователя
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'user_permissions');
    }

    /**
     * Проверить, имеет ли пользователь определенное разрешение
     */
    public function hasPermission(string $permission): bool
    {
        // Кэшируем разрешения пользователя на 5 минут
        $cacheKey = "user_permissions_{$this->id}";
        
        $permissions = cache()->remember($cacheKey, 300, function () {
            return $this->permissions()->pluck('name')->toArray();
        });
        
        return in_array($permission, $permissions);
    }

    /**
     * Проверить, имеет ли пользователь любое из указанных разрешений
     */
    public function hasAnyPermission(array $permissions): bool
    {
        return $this->permissions()->whereIn('name', $permissions)->exists();
    }

    /**
     * Проверить, имеет ли пользователь все указанные разрешения
     */
    public function hasAllPermissions(array $permissions): bool
    {
        $userPermissions = $this->permissions()->whereIn('name', $permissions)->pluck('name')->toArray();
        return count($userPermissions) === count($permissions);
    }

    /**
     * Дать разрешение пользователю
     */
    public function givePermission(string $permission): void
    {
        $permissionModel = Permission::where('name', $permission)->first();
        
        if ($permissionModel && !$this->hasPermission($permission)) {
            $this->permissions()->attach($permissionModel->id);
        }
    }

    /**
     * Дать несколько разрешений пользователю
     */
    public function givePermissions(array $permissions): void
    {
        foreach ($permissions as $permission) {
            $this->givePermission($permission);
        }
    }

    /**
     * Отозвать разрешение у пользователя
     */
    public function revokePermission(string $permission): void
    {
        $permissionModel = Permission::where('name', $permission)->first();
        
        if ($permissionModel) {
            $this->permissions()->detach($permissionModel->id);
        }
    }

    /**
     * Отозвать несколько разрешений у пользователя
     */
    public function revokePermissions(array $permissions): void
    {
        foreach ($permissions as $permission) {
            $this->revokePermission($permission);
        }
    }

    /**
     * Синхронизировать разрешения пользователя
     */
    public function syncPermissions(array $permissions): void
    {
        $permissionIds = Permission::whereIn('name', $permissions)->pluck('id')->toArray();
        $this->permissions()->sync($permissionIds);
        
        // Очищаем кэш разрешений после изменения
        $this->clearPermissionsCache();
    }
    
    /**
     * Очистить кэш разрешений пользователя
     */
    public function clearPermissionsCache(): void
    {
        $cacheKey = "user_permissions_{$this->id}";
        cache()->forget($cacheKey);
    }

    /**
     * Проверить, является ли пользователь администратором
     */
    public function isAdmin(): bool
    {
        return $this->hasPermission(Permissions::ADMIN_ACCESS);
    }
}
