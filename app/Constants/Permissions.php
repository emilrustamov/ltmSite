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
