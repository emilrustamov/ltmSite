<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Permission;
use App\Constants\Permissions;

class SyncPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permissions:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Синхронизировать разрешения из констант с базой данных';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Синхронизация разрешений...');

        // Получаем все константы разрешений из класса Permissions
        $reflection = new \ReflectionClass(Permissions::class);
        $constants = $reflection->getConstants();
        
        $permissions = [];
        $descriptions = [];

        // Собираем все разрешения и их описания
        foreach ($constants as $name => $value) {
            if (is_string($value) && strpos($value, '.') !== false) {
                $permissions[] = $value;
                
                // Генерируем описание на основе имени разрешения
                $parts = explode('.', $value);
                $action = $parts[1] ?? '';
                $resource = $parts[0] ?? '';
                
                $actionMap = [
                    'view' => 'Просмотр',
                    'create' => 'Создание',
                    'edit' => 'Редактирование',
                    'delete' => 'Удаление',
                    'permissions' => 'Управление правами',
                    'access' => 'Доступ'
                ];
                
                $resourceMap = [
                    'admin' => 'администратора',
                    'news' => 'новостей',
                    'portfolio' => 'портфолио',
                    'categories' => 'категорий',
                    'applications' => 'заявок кандидатов',
                    'users' => 'пользователей',
                    'contacts' => 'контактов',
                    'positions' => 'должностей',
                    'languages' => 'языков',
                    'work_formats' => 'форматов работы',
                    'cities' => 'городов',
                    'skills' => 'навыков'
                ];
                
                $actionText = $actionMap[$action] ?? ucfirst($action);
                $resourceText = $resourceMap[$resource] ?? $resource;
                
                $descriptions[$value] = $actionText . ' ' . $resourceText;
            }
        }

        $created = 0;
        $updated = 0;

        foreach ($permissions as $permission) {
            $description = $descriptions[$permission] ?? ucfirst(str_replace('.', ' ', $permission));
            
            $existing = Permission::where('name', $permission)->first();
            
            if (!$existing) {
                Permission::create([
                    'name' => $permission,
                    'display_name' => $description,
                    'description' => $description
                ]);
                $created++;
                $this->line("Создано: {$permission}");
            } else {
                // Обновляем описание если оно изменилось
                if ($existing->description !== $description) {
                    $existing->update([
                        'display_name' => $description,
                        'description' => $description
                    ]);
                    $updated++;
                    $this->line("Обновлено: {$permission}");
                }
            }
        }

        $this->info("Синхронизация завершена!");
        $this->info("Создано: {$created} разрешений");
        $this->info("Обновлено: {$updated} разрешений");
        
        return Command::SUCCESS;
    }
}
