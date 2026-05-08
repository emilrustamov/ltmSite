<?php

namespace App\Traits;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

trait LogsUserActivity
{
    /**
     * Логировать действие пользователя
     */
    protected function logUserActivity(string $action, string $model, $modelId = null, array $data = []): void
    {
        $user = Auth::user();
        
        $logData = [
            'user_id' => $user?->id,
            'user_name' => $user?->name,
            'action' => $action,
            'model' => $model,
            'model_id' => $modelId,
            'data' => $data,
            'ip' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'timestamp' => now()->toISOString(),
        ];
        
        Log::channel('admin')->info('Admin Action', $logData);
    }
    
    /**
     * Логировать создание
     */
    protected function logCreate(string $model, $modelId, array $data = []): void
    {
        $this->logUserActivity('create', $model, $modelId, $data);
    }
    
    /**
     * Логировать обновление
     */
    protected function logUpdate(string $model, $modelId, array $oldData = [], array $newData = []): void
    {
        $this->logUserActivity('update', $model, $modelId, [
            'old_data' => $oldData,
            'new_data' => $newData,
        ]);
    }
    
    /**
     * Логировать удаление
     */
    protected function logDelete(string $model, $modelId, array $data = []): void
    {
        $this->logUserActivity('delete', $model, $modelId, $data);
    }
    
    /**
     * Логировать просмотр
     */
    protected function logView(string $model, $modelId = null): void
    {
        $this->logUserActivity('view', $model, $modelId);
    }
}
