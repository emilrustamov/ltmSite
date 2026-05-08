<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Constants\Permissions;

class ReferenceDataPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Используем команду синхронизации разрешений
        $this->command('permissions:sync');
        
        $this->command->info('Разрешения для справочников синхронизированы автоматически!');
    }
}
