<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobPosition;

class UpdateJobPositionsSeeder extends Seeder
{
    public function run(): void
    {
        // Обновляем только те поля, которых нет
        $jobPositions = [
            'client-manager' => [
                'name_tm' => 'Müşderi bilen işleşmek üçin menecer',
                'description_ru' => 'Отвечает за поддержание и развитие отношений с клиентами, решение их вопросов и обеспечение высокого уровня сервиса.',
                'description_en' => 'Responsible for maintaining and developing client relationships, resolving their issues and ensuring high service levels.',
                'description_tm' => 'Müşderiler bilen gatnaşyklary saklamak we ösdürmek, olaryň meselelerini çözmek we ýokary hyzmat derejesini üpjün etmek üçin jogapkär.',
                'responsibilities_ru' => "• Ведение переговоров с клиентами\n• Анализ потребностей клиентов\n• Подготовка коммерческих предложений\n• Контроль выполнения договоров",
                'responsibilities_en' => "• Conducting negotiations with clients\n• Analyzing client needs\n• Preparing commercial proposals\n• Monitoring contract execution",
                'responsibilities_tm' => "• Müşderiler bilen gepleşik geçirmek\n• Müşderileriň zerurlyklaryny analiz etmek\n• Söwda teklipnamalary taýýarlamak\n• Şertnamalaryň ýerine ýetirilişini gözegçilik etmek",
                'benefits_ru' => "• Конкурентная заработная плата\n• Гибкий график работы\n• Возможность карьерного роста\n• Обучение и развитие",
                'benefits_en' => "• Competitive salary\n• Flexible work schedule\n• Career growth opportunities\n• Training and development",
                'benefits_tm' => "• Bäsleşik aýlyk\n• Esnek iş grafiki\n• Kariýera ösüşi mümkinçilikleri\n• Okuw we ösüş",
                'image' => null,
                'status' => true,
                'ordering' => 1
            ],
            'frontend-developer' => [
                'name_tm' => 'Frontend programmir',
                'description_ru' => 'Создает пользовательские интерфейсы для веб-приложений, обеспечивает интерактивность и удобство использования.',
                'description_en' => 'Creates user interfaces for web applications, ensures interactivity and usability.',
                'description_tm' => 'Web programma üçin ulanyjy interfeýslerini döredýär, interaktivlik we ulanyş amatlygyny üpjün edýär.',
                'responsibilities_ru' => "• Разработка пользовательских интерфейсов\n• Адаптивная верстка\n• Оптимизация производительности\n• Тестирование и отладка",
                'responsibilities_en' => "• Developing user interfaces\n• Responsive layout\n• Performance optimization\n• Testing and debugging",
                'responsibilities_tm' => "• Ulanyjy interfeýslerini işläp düzmek\n• Jogap berýän düzgünleme\n• Işjeňlik optimizasiýasy\n• Test etmek we kemçilikleri düzetmek",
                'benefits_ru' => "• Современные технологии\n• Удаленная работа\n• Профессиональное развитие\n• Командная работа",
                'benefits_en' => "• Modern technologies\n• Remote work\n• Professional development\n• Team collaboration",
                'benefits_tm' => "• Häzirki zaman tehnologiýalary\n• Uzak iş\n• Hünär ösüşi\n• Topar işi",
                'image' => null,
                'status' => true,
                'ordering' => 2
            ],
            'backend-developer' => [
                'name_tm' => 'Backend programmir',
                'description_ru' => 'Разрабатывает серверную часть приложений, обеспечивает работу с базами данных и API.',
                'description_en' => 'Develops server-side applications, ensures database and API functionality.',
                'description_tm' => 'Serwer tarapynda programma işläp düzyär, maglumat bazasy we API işjeňligini üpjün edýär.',
                'responsibilities_ru' => "• Разработка серверной логики\n• Работа с базами данных\n• Создание API\n• Обеспечение безопасности",
                'responsibilities_en' => "• Developing server logic\n• Database work\n• Creating APIs\n• Ensuring security",
                'responsibilities_tm' => "• Serwer logikasyny işläp düzmek\n• Maglumat bazasy bilen işlemek\n• API döretmek\n• Howpsuzlygy üpjün etmek",
                'benefits_ru' => "• Высокая зарплата\n• Сложные проекты\n• Техническое развитие\n• Стабильность",
                'benefits_en' => "• High salary\n• Complex projects\n• Technical development\n• Stability",
                'benefits_tm' => "• Ýokary aýlyk\n• Çylşyrymly taslamalar\n• Tehniki ösüş\n• Durmuşlylyk",
                'image' => null,
                'status' => true,
                'ordering' => 3
            ],
            'flutter-developer' => [
                'name_tm' => 'Flutter programmir',
                'description_ru' => 'Создает мобильные приложения для iOS и Android с использованием Flutter framework.',
                'description_en' => 'Creates mobile applications for iOS and Android using Flutter framework.',
                'description_tm' => 'Flutter framework ulanyp iOS we Android üçin mobil programmalar döredýär.',
                'responsibilities_ru' => "• Разработка мобильных приложений\n• Кроссплатформенная разработка\n• UI/UX реализация\n• Тестирование на устройствах",
                'responsibilities_en' => "• Developing mobile applications\n• Cross-platform development\n• UI/UX implementation\n• Device testing",
                'responsibilities_tm' => "• Mobil programmalar işläp düzmek\n• Platformalar arasy işläp düzmek\n• UI/UX amala aşyrmak\n• Enjamlar üstünde test etmek",
                'benefits_ru' => "• Современный стек\n• Быстрая разработка\n• Один код для двух платформ\n• Высокий спрос",
                'benefits_en' => "• Modern stack\n• Fast development\n• One code for two platforms\n• High demand",
                'benefits_tm' => "• Häzirki zaman tehnologiýalary\n• Çalt işläp düzmek\n• Iki platform üçin bir kod\n• Ýokary talaplar",
                'image' => null,
                'status' => true,
                'ordering' => 4
            ],
            'ui-ux-designer' => [
                'name_tm' => 'UI/UX dizaýner',
                'description_ru' => 'Создает пользовательские интерфейсы и обеспечивает удобство использования продуктов.',
                'description_en' => 'Creates user interfaces and ensures product usability.',
                'description_tm' => 'Ulanyjy interfeýslerini döredýär we önümleriň ulanyş amatlygyny üpjün edýär.',
                'responsibilities_ru' => "• Создание макетов и прототипов\n• Пользовательские исследования\n• Визуальный дизайн\n• Тестирование интерфейсов",
                'responsibilities_en' => "• Creating layouts and prototypes\n• User research\n• Visual design\n• Interface testing",
                'responsibilities_tm' => "• Düzgünleme we prototipleri döretmek\n• Ulanyjy araştırmaları\n• Görsel dizaýn\n• Interfeýs test etmek",
                'benefits_ru' => "• Творческая работа\n• Влияние на продукт\n• Современные инструменты\n• Портфолио проектов",
                'benefits_en' => "• Creative work\n• Product influence\n• Modern tools\n• Project portfolio",
                'benefits_tm' => "• Döredijilik işi\n• Önüme täsir\n• Häzirki zaman guralary\n• Taslama portfolyosy",
                'image' => null,
                'status' => true,
                'ordering' => 5
            ],
            'team-lead' => [
                'name_tm' => 'Topar ýolbaşçysy',
                'description_ru' => 'Руководит командой разработчиков, планирует задачи и обеспечивает качество кода.',
                'description_en' => 'Leads development team, plans tasks and ensures code quality.',
                'description_tm' => 'Işläp düzüji toparlara ýolbaşçylyk edýär, wezipeleri meýilleşdirýär we kodyň hilini üpjün edýär.',
                'responsibilities_ru' => "• Управление командой\n• Планирование спринтов\n• Code review\n• Менторство разработчиков",
                'responsibilities_en' => "• Team management\n• Sprint planning\n• Code review\n• Developer mentoring",
                'responsibilities_tm' => "• Topar dolandyryşy\n• Sprint meýilleşdirme\n• Kod gözden geçirme\n• Işläp düzüjileri öwretmek",
                'benefits_ru' => "• Лидерские навыки\n• Высокая зарплата\n• Управленческий опыт\n• Влияние на архитектуру",
                'benefits_en' => "• Leadership skills\n• High salary\n• Management experience\n• Architecture influence",
                'benefits_tm' => "• Ýolbaşçylyk ukyplary\n• Ýokary aýlyk\n• Dolandyryş tejribesi\n• Arhitektura täsiri",
                'image' => null,
                'status' => true,
                'ordering' => 6
            ],
        ];

        foreach ($jobPositions as $slug => $data) {
            $jobPosition = JobPosition::where('slug', $slug)->first();
            
            if ($jobPosition) {
                // Обновляем поля с переносами строк
                $updateData = [];
                
                foreach ($data as $field => $value) {
                    // Принудительно обновляем поля с переносами строк
                    if (in_array($field, ['responsibilities_ru', 'responsibilities_en', 'responsibilities_tm', 'benefits_ru', 'benefits_en', 'benefits_tm'])) {
                        $updateData[$field] = $value;
                    }
                }
                
                if (!empty($updateData)) {
                    $jobPosition->update($updateData);
                    echo "Updated {$jobPosition->name_ru} with fields: " . implode(', ', array_keys($updateData)) . "\n";
                } else {
                    echo "No updates needed for {$jobPosition->name_ru}\n";
                }
            }
        }
    }
}