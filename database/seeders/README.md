# Сидеры базы данных

Этот набор сидеров создан на основе дампа базы данных `ltmsite_db_2025-10-14.sql` и адаптирован под текущую структуру проекта с системой переводов.

## Структура сидеров

### 1. UsersSeeder
- Создает пользователей из дампа базы данных
- Включает тестового пользователя с простым паролем
- Удалены поля `admin` и исправлено `remeber_token` → `remember_token`

### 2. CategoriesSeeder
- Создает категории портфолио
- Использует систему переводов через таблицу `category_translations`
- Поддерживает 3 языка: ru, en, tm

### 3. PortfolioSeeder
- Создает проекты портфолио
- Использует систему переводов через таблицу `portfolio_translations`
- Включает основные поля: slug, photo, url_button, when, status, ordering

### 4. CategoryPortfolioSeeder
- Создает связи между портфолио и категориями
- Упрощенная версия с только существующими проектами

### 5. FreshDataSeeder
- Очищает базу данных и заполняет свежими данными
- Безопасно удаляет данные с учетом внешних ключей

## Использование

### Запуск всех сидеров
```bash
php artisan db:seed
```

### Запуск конкретного сидера
```bash
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=CategoriesSeeder
php artisan db:seed --class=PortfolioSeeder
php artisan db:seed --class=CategoryPortfolioSeeder
```

### Очистка и заполнение свежими данными
```bash
php artisan db:seed --class=FreshDataSeeder
```

## Тестовые пользователи

После запуска сидеров будут созданы следующие пользователи:

- **admin@gmail.com** / password
- **admin2@gmail.com** / password  
- **test@mail.ru** / password
- **erustamow2@gmail.com** / password (админ)
- **admin@ltm.com** / password (админ)
- **test@test.com** / password (тестовый пользователь)

## Категории

Создаются следующие категории:
1. Bitrix
2. Лендинг / Landing
3. Многостраничник / MultiPage Website
4. Мобильные Приложения / Mobile Applications
5. Интернет Магазин / Online Shop
6. Сайт каталог / WebCatalog

## Портфолио

Создаются примеры проектов:
- **Nur Plastik** (лендинг)
- **TM Uber** (мобильное приложение)

## Примечания

- Все сидеры используют `updateOrCreate()` для безопасного повторного запуска
- Система переводов полностью интегрирована
- Внешние ключи настроены корректно
- Данные соответствуют структуре из дампа базы данных
