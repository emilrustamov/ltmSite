<?php

namespace App\Traits;

use Illuminate\Support\Facades\Artisan;

trait AutoSyncPermissions
{
    /**
     * Автоматически синхронизировать разрешения при загрузке
     */
    public function syncPermissions()
    {
        try {
            Artisan::call('permissions:sync');
            return true;
        } catch (\Exception $e) {
            \Log::error('Failed to sync permissions: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Проверить и синхронизировать разрешения если нужно
     */
    public function ensurePermissionsSynced()
    {
        // Проверяем, есть ли новые разрешения в константах, которых нет в БД
        $reflection = new \ReflectionClass(\App\Constants\Permissions::class);
        $constants = $reflection->getConstants();
        
        $permissionNames = [];
        foreach ($constants as $name => $value) {
            if (is_string($value) && strpos($value, '.') !== false) {
                $permissionNames[] = $value;
            }
        }
        
        $existingPermissions = \App\Models\Permission::whereIn('name', $permissionNames)->pluck('name')->toArray();
        $missingPermissions = array_diff($permissionNames, $existingPermissions);
        
        if (!empty($missingPermissions)) {
            $this->syncPermissions();
        }
    }
}
