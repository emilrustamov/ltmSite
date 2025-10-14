<?php

namespace Database\Seeders;

use App\Constants\Permissions;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionsByGroup = Permissions::getPermissionsByGroup();

        foreach ($permissionsByGroup as $group => $permissions) {
            foreach ($permissions as $permissionName => $displayName) {
                Permission::firstOrCreate(
                    ['name' => $permissionName],
                    [
                        'name' => $permissionName,
                        'display_name' => $displayName,
                        'description' => $this->getPermissionDescription($permissionName)
                    ]
                );
            }
        }
    }

    /**
     * Получить описание разрешения
     */
    private function getPermissionDescription(string $permissionName): string
    {
        $descriptions = [
            Permissions::ADMIN_ACCESS => 'Право доступа к административной панели',
            
            Permissions::NEWS_VIEW => 'Право просматривать список новостей',
            Permissions::NEWS_CREATE => 'Право создавать новые новости',
            Permissions::NEWS_EDIT => 'Право редактировать существующие новости',
            Permissions::NEWS_DELETE => 'Право удалять новости',
            
            Permissions::PORTFOLIO_VIEW => 'Право просматривать список портфолио',
            Permissions::PORTFOLIO_CREATE => 'Право создавать новые работы в портфолио',
            Permissions::PORTFOLIO_EDIT => 'Право редактировать существующие работы в портфолио',
            Permissions::PORTFOLIO_DELETE => 'Право удалять работы из портфолио',
            
            Permissions::CATEGORIES_VIEW => 'Право просматривать список категорий',
            Permissions::CATEGORIES_CREATE => 'Право создавать новые категории',
            Permissions::CATEGORIES_EDIT => 'Право редактировать существующие категории',
            Permissions::CATEGORIES_DELETE => 'Право удалять категории',
            
            Permissions::VACANCIES_VIEW => 'Право просматривать список вакансий',
            Permissions::VACANCIES_CREATE => 'Право создавать новые вакансии',
            Permissions::VACANCIES_EDIT => 'Право редактировать существующие вакансии',
            Permissions::VACANCIES_DELETE => 'Право удалять вакансии',
            
            Permissions::USERS_VIEW => 'Право просматривать список пользователей',
            Permissions::USERS_CREATE => 'Право создавать новых пользователей',
            Permissions::USERS_EDIT => 'Право редактировать существующих пользователей',
            Permissions::USERS_DELETE => 'Право удалять пользователей',
            Permissions::USERS_PERMISSIONS => 'Право назначать и отзывать права доступа у пользователей',
            
            Permissions::CONTACTS_VIEW => 'Право просматривать список контактов',
            Permissions::CONTACTS_EDIT => 'Право редактировать контактную информацию',
        ];

        return $descriptions[$permissionName] ?? 'Разрешение для работы с системой';
    }
}
