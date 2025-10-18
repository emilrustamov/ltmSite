<?php

namespace App\Constants;

class Permissions
{
    // Административные права
    public const ADMIN_ACCESS = 'admin.access';
    
    // Права для новостей
    public const NEWS_VIEW = 'news.view';
    public const NEWS_CREATE = 'news.create';
    public const NEWS_EDIT = 'news.edit';
    public const NEWS_DELETE = 'news.delete';
    
    // Права для портфолио
    public const PORTFOLIO_VIEW = 'portfolio.view';
    public const PORTFOLIO_CREATE = 'portfolio.create';
    public const PORTFOLIO_EDIT = 'portfolio.edit';
    public const PORTFOLIO_DELETE = 'portfolio.delete';
    
    // Права для категорий
    public const CATEGORIES_VIEW = 'categories.view';
    public const CATEGORIES_CREATE = 'categories.create';
    public const CATEGORIES_EDIT = 'categories.edit';
    public const CATEGORIES_DELETE = 'categories.delete';
    
    // Права для заявок кандидатов
    public const APPLICATIONS_VIEW = 'applications.view';
    public const APPLICATIONS_DELETE = 'applications.delete';
    
    // Права для справочников
    public const POSITIONS_VIEW = 'positions.view';
    public const POSITIONS_CREATE = 'positions.create';
    public const POSITIONS_EDIT = 'positions.edit';
    public const POSITIONS_DELETE = 'positions.delete';
    
    public const LANGUAGES_VIEW = 'languages.view';
    public const LANGUAGES_CREATE = 'languages.create';
    public const LANGUAGES_EDIT = 'languages.edit';
    public const LANGUAGES_DELETE = 'languages.delete';
    
    public const WORK_FORMATS_VIEW = 'work_formats.view';
    public const WORK_FORMATS_CREATE = 'work_formats.create';
    public const WORK_FORMATS_EDIT = 'work_formats.edit';
    public const WORK_FORMATS_DELETE = 'work_formats.delete';
    
    public const CITIES_VIEW = 'cities.view';
    public const CITIES_CREATE = 'cities.create';
    public const CITIES_EDIT = 'cities.edit';
    public const CITIES_DELETE = 'cities.delete';
    
    public const SKILLS_VIEW = 'skills.view';
    public const SKILLS_CREATE = 'skills.create';
    public const SKILLS_EDIT = 'skills.edit';
    public const SKILLS_DELETE = 'skills.delete';
    
    // Права для пользователей
    public const USERS_VIEW = 'users.view';
    public const USERS_CREATE = 'users.create';
    public const USERS_EDIT = 'users.edit';
    public const USERS_DELETE = 'users.delete';
    public const USERS_PERMISSIONS = 'users.permissions';
    
    // Права для контактов
    public const CONTACTS_VIEW = 'contacts.view';
    public const CONTACTS_EDIT = 'contacts.edit';
    
    /**
     * Получить все права по группам
     */
    public static function getPermissionsByGroup(): array
    {
        return [
            'admin' => [
                self::ADMIN_ACCESS => 'Доступ к админ панели'
            ],
            'news' => [
                self::NEWS_VIEW => 'Просмотр новостей',
                self::NEWS_CREATE => 'Создание новостей',
                self::NEWS_EDIT => 'Редактирование новостей',
                self::NEWS_DELETE => 'Удаление новостей'
            ],
            'portfolio' => [
                self::PORTFOLIO_VIEW => 'Просмотр портфолио',
                self::PORTFOLIO_CREATE => 'Создание портфолио',
                self::PORTFOLIO_EDIT => 'Редактирование портфолио',
                self::PORTFOLIO_DELETE => 'Удаление портфолио'
            ],
            'categories' => [
                self::CATEGORIES_VIEW => 'Просмотр категорий',
                self::CATEGORIES_CREATE => 'Создание категорий',
                self::CATEGORIES_EDIT => 'Редактирование категорий',
                self::CATEGORIES_DELETE => 'Удаление категорий'
            ],
            'applications' => [
                self::APPLICATIONS_VIEW => 'Просмотр заявок кандидатов',
                self::APPLICATIONS_DELETE => 'Удаление заявок кандидатов'
            ],
            'positions' => [
                self::POSITIONS_VIEW => 'Просмотр должностей',
                self::POSITIONS_CREATE => 'Создание должностей',
                self::POSITIONS_EDIT => 'Редактирование должностей',
                self::POSITIONS_DELETE => 'Удаление должностей'
            ],
            'languages' => [
                self::LANGUAGES_VIEW => 'Просмотр языков',
                self::LANGUAGES_CREATE => 'Создание языков',
                self::LANGUAGES_EDIT => 'Редактирование языков',
                self::LANGUAGES_DELETE => 'Удаление языков'
            ],
            'work_formats' => [
                self::WORK_FORMATS_VIEW => 'Просмотр форматов работы',
                self::WORK_FORMATS_CREATE => 'Создание форматов работы',
                self::WORK_FORMATS_EDIT => 'Редактирование форматов работы',
                self::WORK_FORMATS_DELETE => 'Удаление форматов работы'
            ],
            'cities' => [
                self::CITIES_VIEW => 'Просмотр городов',
                self::CITIES_CREATE => 'Создание городов',
                self::CITIES_EDIT => 'Редактирование городов',
                self::CITIES_DELETE => 'Удаление городов'
            ],
            'skills' => [
                self::SKILLS_VIEW => 'Просмотр навыков',
                self::SKILLS_CREATE => 'Создание навыков',
                self::SKILLS_EDIT => 'Редактирование навыков',
                self::SKILLS_DELETE => 'Удаление навыков'
            ],
            'users' => [
                self::USERS_VIEW => 'Просмотр пользователей',
                self::USERS_CREATE => 'Создание пользователей',
                self::USERS_EDIT => 'Редактирование пользователей',
                self::USERS_DELETE => 'Удаление пользователей',
                self::USERS_PERMISSIONS => 'Управление правами пользователей'
            ],
            'contacts' => [
                self::CONTACTS_VIEW => 'Просмотр контактов',
                self::CONTACTS_EDIT => 'Редактирование контактов'
            ]
        ];
    }
    
    /**
     * Получить все права в виде массива
     */
    public static function getAllPermissions(): array
    {
        $permissions = [];
        foreach (self::getPermissionsByGroup() as $group => $groupPermissions) {
            $permissions = array_merge($permissions, array_keys($groupPermissions));
        }
        return $permissions;
    }
}
