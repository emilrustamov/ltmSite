<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

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
    protected $description = 'Очистить кэш разрешений всех пользователей';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Очистка кэша разрешений...');

        $users = User::all();
        $cleared = 0;

        foreach ($users as $user) {
            if (method_exists($user, 'clearPermissionsCache')) {
                $user->clearPermissionsCache();
                $cleared++;
            }
        }

        $this->info("Кэш разрешений очищен для {$cleared} пользователей");
        
        return Command::SUCCESS;
    }
}