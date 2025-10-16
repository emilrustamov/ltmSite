<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearPermissionsCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:clear-cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all user permissions cache';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Clearing permissions cache...');
        
        // Очищаем все кэши разрешений пользователей
        $pattern = 'user_permissions_*';
        $keys = Cache::getRedis()->keys($pattern);
        
        if (!empty($keys)) {
            Cache::getRedis()->del($keys);
            $this->info('Cleared ' . count($keys) . ' permission cache entries.');
        } else {
            $this->info('No permission cache entries found.');
        }
        
        $this->info('Permissions cache cleared successfully!');
        
        return 0;
    }
}
