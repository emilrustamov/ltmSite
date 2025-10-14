# Система позиций и заявок

## Обзор системы

Система состоит из нескольких компонентов, которые позволяют создавать гибкую структуру позиций с динамическими полями для заявок.

## Архитектура базы данных

### 1. Таблица `positions` (Основные позиции)
```sql
- id (primary key)
- slug (unique)
- status (boolean) - активна ли позиция
- is_featured (boolean) - рекомендуемая позиция
- sort_order (integer) - порядок отображения
- created_at, updated_at
```

### 2. Таблица `position_translations` (Переводы позиций)
```sql
- id (primary key)
- position_id (foreign key -> positions.id)
- locale (string, 2 chars) - 'ru', 'en', 'tm'
- name (string) - название позиции
- description (text) - описание позиции
- requirements (text) - общие требования
- created_at, updated_at
```

### 3. Таблица `position_variants` (Варианты позиций)
```sql
- id (primary key)
- position_id (foreign key -> positions.id)
- slug (string)
- status (boolean)
- sort_order (integer)
- created_at, updated_at
```

### 4. Таблица `position_variant_translations` (Переводы вариантов)
```sql
- id (primary key)
- position_variant_id (foreign key -> position_variants.id)
- locale (string, 2 chars)
- name (string) - название варианта (например: "Frontend разработчик")
- description (text) - описание варианта
- created_at, updated_at
```

### 5. Таблица `dynamic_fields` (Динамические поля)
```sql
- id (primary key)
- position_variant_id (foreign key -> position_variants.id)
- field_type (enum) - 'text', 'textarea', 'select', 'checkbox', 'file', 'email', 'phone', 'number', 'date'
- field_name (string) - техническое имя поля
- is_required (boolean)
- sort_order (integer)
- validation_rules (json) - правила валидации
- created_at, updated_at
```

### 6. Таблица `dynamic_field_translations` (Переводы полей)
```sql
- id (primary key)
- dynamic_field_id (foreign key -> dynamic_fields.id)
- locale (string, 2 chars)
- label (string) - подпись поля
- placeholder (string) - placeholder
- help_text (text) - подсказка
- options (json) - для select полей
- created_at, updated_at
```

### 7. Таблица `applications` (Заявки пользователей)
```sql
- id (primary key)
- position_variant_id (foreign key -> position_variants.id)
- status (enum) - 'new', 'reviewed', 'accepted', 'rejected'
- applicant_name (string)
- applicant_email (string)
- applicant_phone (string)
- resume_file (string) - путь к резюме
- cover_letter (text) - сопроводительное письмо
- created_at, updated_at
```

### 8. Таблица `application_responses` (Ответы на динамические поля)
```sql
- id (primary key)
- application_id (foreign key -> applications.id)
- dynamic_field_id (foreign key -> dynamic_fields.id)
- value (text) - ответ пользователя
- file_path (string) - для файловых полей
- created_at, updated_at
```

## Логика работы

### Админская часть

1. **Создание позиции**
   - Админ создает основную позицию (например: "Разработка")
   - Добавляет переводы на 3 языка
   - Настраивает статус и приоритет

2. **Создание вариантов позиции**
   - Для каждой позиции создаются варианты (например: "Frontend", "Backend", "Fullstack")
   - Каждый вариант имеет свои переводы

3. **Настройка динамических полей**
   - Для каждого варианта позиции настраиваются уникальные поля
   - Поля могут быть разных типов: текст, выбор, файл и т.д.
   - Настраиваются правила валидации и обязательность

### Пользовательская часть

1. **Выбор позиции**
   - Пользователь видит список активных позиций
   - При клике на позицию открываются варианты

2. **Выбор варианта**
   - Пользователь выбирает конкретный вариант позиции
   - Система загружает динамические поля для этого варианта

3. **Заполнение формы**
   - Показываются только поля, настроенные для выбранного варианта
   - Валидация происходит согласно настроенным правилам
   - Обязательные поля помечены

4. **Отправка заявки**
   - Данные сохраняются в таблицу applications
   - Ответы на динамические поля сохраняются в application_responses
   - Пользователь получает подтверждение

### Пример структуры

```
Позиция: "Разработка"
├── Вариант: "Frontend разработчик"
│   ├── Поле: "Опыт работы с React" (select: 0-1 год, 1-3 года, 3+ лет)
│   ├── Поле: "Портфолио проектов" (file, обязательное)
│   └── Поле: "Знание CSS фреймворков" (checkbox: Bootstrap, Tailwind, Material-UI)
├── Вариант: "Backend разработчик"
│   ├── Поле: "Опыт с базами данных" (select: MySQL, PostgreSQL, MongoDB)
│   ├── Поле: "Знание PHP фреймворков" (checkbox: Laravel, Symfony, Yii)
│   └── Поле: "Примеры API" (textarea, необязательное)
└── Вариант: "Fullstack разработчик"
    ├── Поле: "Предпочтения по стек" (text)
    ├── Поле: "GitHub профиль" (text, обязательное)
    └── Поле: "Готовность к командировкам" (checkbox)
```

## API Endpoints

### Админские маршруты
```
GET    /admin/positions              - Список позиций
POST   /admin/positions              - Создание позиции
GET    /admin/positions/{id}/edit    - Форма редактирования
PUT    /admin/positions/{id}         - Обновление позиции
DELETE /admin/positions/{id}         - Удаление позиции

GET    /admin/positions/{id}/variants     - Список вариантов позиции
POST   /admin/positions/{id}/variants     - Создание варианта
PUT    /admin/variants/{id}              - Обновление варианта
DELETE /admin/variants/{id}              - Удаление варианта

GET    /admin/variants/{id}/fields        - Поля варианта
POST   /admin/variants/{id}/fields        - Создание поля
PUT    /admin/fields/{id}                 - Обновление поля
DELETE /admin/fields/{id}                 - Удаление поля

GET    /admin/applications                - Список заявок
GET    /admin/applications/{id}           - Просмотр заявки
PUT    /admin/applications/{id}/status    - Изменение статуса заявки
```

### Публичные маршруты
```
GET    /careers                    - Страница с позициями
GET    /careers/{position}         - Варианты позиции
GET    /careers/{position}/{variant} - Форма заявки
POST   /careers/{position}/{variant} - Отправка заявки
```

## Модели

### Position
- `translations()` - связи с переводами
- `variants()` - связи с вариантами
- `activeVariants()` - только активные варианты

### PositionVariant
- `translations()` - связи с переводами
- `position()` - связь с основной позицией
- `dynamicFields()` - связи с полями
- `applications()` - связи с заявками

### DynamicField
- `translations()` - связи с переводами
- `positionVariant()` - связь с вариантом
- `applicationResponses()` - связи с ответами

### Application
- `positionVariant()` - связь с вариантом
- `responses()` - связи с ответами на поля
- `statusBadge()` - метод для получения статуса

## Особенности реализации

1. **Многоязычность** - все текстовые поля переводимы
2. **Гибкость полей** - можно создавать любые типы полей
3. **Валидация** - настраиваемая валидация для каждого поля
4. **Файлы** - поддержка загрузки файлов (резюме, портфолио)
5. **Статусы** - отслеживание статуса заявок
6. **Сортировка** - настраиваемый порядок отображения

## Будущие улучшения

1. **Уведомления** - email уведомления при новых заявках
2. **Фильтры** - фильтрация заявок по статусу, дате, позиции
3. **Экспорт** - экспорт заявок в Excel/PDF
4. **Календарь** - планирование собеседований
5. **Рейтинги** - оценка кандидатов
6. **Интеграции** - интеграция с HR системами
