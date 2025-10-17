<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use App\Models\Categories;
use App\Models\CategoryTranslation;

class FullPortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Сначала создаем категории
        $categories = [
            [
                'id' => 1,
                'slug' => 'bitrix',
                'translations' => [
                    'en' => ['name' => 'Bitrix'],
                    'ru' => ['name' => 'Bitrix'],
                    'tm' => ['name' => 'Bitrix'],
                ],
            ],
            [
                'id' => 2,
                'slug' => 'landing',
                'translations' => [
                    'en' => ['name' => 'Landing'],
                    'ru' => ['name' => 'Лендинг'],
                    'tm' => ['name' => 'Landing'],
                ],
            ],
            [
                'id' => 3,
                'slug' => 'multipage',
                'translations' => [
                    'en' => ['name' => 'MultiPage Website'],
                    'ru' => ['name' => 'Многостраничник'],
                    'tm' => ['name' => 'MultiPage Website'],
                ],
            ],
            [
                'id' => 4,
                'slug' => 'mobile-apps',
                'translations' => [
                    'en' => ['name' => 'Mobile Applications'],
                    'ru' => ['name' => 'Мобильные Приложения'],
                    'tm' => ['name' => 'Mobile Applications'],
                ],
            ],
            [
                'id' => 5,
                'slug' => 'online-shop',
                'translations' => [
                    'en' => ['name' => 'Online Shop'],
                    'ru' => ['name' => 'Интернет Магазин'],
                    'tm' => ['name' => 'Online Shop'],
                ],
            ],
            [
                'id' => 6,
                'slug' => 'web-catalog',
                'translations' => [
                    'en' => ['name' => 'WebCatalog'],
                    'ru' => ['name' => 'Сайт каталог'],
                    'tm' => ['name' => 'WebCatalog'],
                ],
            ],
            [
                'id' => 7,
                'slug' => 'web-catalog-2',
                'translations' => [
                    'en' => ['name' => 'WebCatalog'],
                    'ru' => ['name' => 'Сайт каталог'],
                    'tm' => ['name' => 'WebCatalog'],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $translations = $categoryData['translations'];
            unset($categoryData['translations']);
            
            $category = Categories::updateOrCreate(['id' => $categoryData['id']], $categoryData);
            
            foreach ($translations as $locale => $translation) {
                CategoryTranslation::updateOrCreate(
                    ['category_id' => $category->id, 'locale' => $locale],
                    $translation
                );
            }
        }

        $portfolios = [
            [
                'id' => 95,
                'slug' => 'nur-plastik',
                'photo' => 'portfolio-image/1744111035.png',
                'when' => '2025-10-20',
                'url_button' => 'https://nur-plastik.com/',
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Company entering international market',
                        'target' => '<p>Company entering international market</p>',
                        'result' => '<p>Clean, laconic website with all necessary features</p>',
                    ],
                    'ru' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Компания выходит на международный рынок',
                        'target' => '<p>Компания выходит на международный рынок</p>',
                        'result' => '<p>Чистый, лаконичный сайт со всеми необходимыми функциями</p>',
                    ],
                    'tm' => [
                        'title' => 'Nur Plastik',
                        'who' => 'Nur Plastik',
                        'description' => 'Kompaniýa halkara bazara çykýar',
                        'target' => '<p>Kompaniýa halkara bazara çykýar</p>',
                        'result' => '<p>Arassa, lakoniki sahypa ähli zerur funksiýalar bilen</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:17:53',
                'updated_at' => '2025-05-10 06:24:47',
            ],
            [
                'id' => 99,
                'slug' => 'atto',
                'photo' => 'portfolio-image/8wO0cPbVqoARiqJdkeHPoAFwIukIxXvCzfpxad6b.png',
                'when' => '2024-11-14',
                'url_button' => null,
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Atto',
                        'who' => 'Atto',
                        'description' => 'Mobile clothing brand app',
                        'target' => '<p>Independent mobile sales channel</p>',
                        'result' => '<p>Lightweight, intuitive mobile app with admin panel</p>',
                    ],
                    'ru' => [
                        'title' => 'Atto',
                        'who' => 'Atto',
                        'description' => 'Мобильное приложение для бренда одежды',
                        'target' => '<p>Самостоятельный канал продаж</p>',
                        'result' => '<p>Лёгкое, понятное мобильное приложение с админкой</p>',
                    ],
                    'tm' => [
                        'title' => 'Atto',
                        'who' => 'Atto',
                        'description' => 'Egin-eşik brendi üçin mobil goşundy',
                        'target' => '<p>Garaşsyz satuw kanaly</p>',
                        'result' => '<p>Ýeňil, düşnükli mobil goşundy admin panel bilen</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:22:11',
                'updated_at' => '2025-05-10 06:26:44',
            ],
            [
                'id' => 101,
                'slug' => 'tm-uber',
                'photo' => 'portfolio-image/FiSqleIHwCxNJp2VbBXp7ITkfFrPmJ7p2D9rLiWi.png',
                'when' => '2024-10-09',
                'url_button' => null,
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Taxi service application',
                        'target' => '<p>Full-featured taxi service system</p>',
                        'result' => '<p>Complete system with web dispatcher, driver and client apps</p>',
                    ],
                    'ru' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Приложение для такси',
                        'target' => '<p>Полноценная система такси</p>',
                        'result' => '<p>Комплексная система с веб-диспетчерской и приложениями</p>',
                    ],
                    'tm' => [
                        'title' => 'TM Uber',
                        'who' => 'TM Uber',
                        'description' => 'Taksi hyzmaty üçin goşundy',
                        'target' => '<p>Doly taksi hyzmaty ulgamy</p>',
                        'result' => '<p>Web-dispetçer we goşundylar bilen doly ulgam</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:23:30',
                'updated_at' => '2025-05-10 06:31:44',
            ],
            [
                'id' => 102,
                'slug' => 'duomouseion',
                'photo' => 'portfolio-image/PHJqtttUvd5Teno1SPM5pyLkEjc0miriSiTVjmlq.png',
                'when' => '2023-01-25',
                'url_button' => 'https://www.duomouseion.com/',
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Duomouseion',
                        'who' => 'Duomouseion',
                        'description' => 'Musical duo website for French audience',
                        'target' => '<p>Elegant website with concert schedule</p>',
                        'result' => '<p>Beautiful and functional website for artistic presence</p>',
                    ],
                    'ru' => [
                        'title' => 'Duomouseion',
                        'who' => 'Duomouseion',
                        'description' => 'Сайт музыкального дуэта для французской аудитории',
                        'target' => '<p>Элегантный сайт с расписанием концертов</p>',
                        'result' => '<p>Красивый и функциональный сайт для творческого присутствия</p>',
                    ],
                    'tm' => [
                        'title' => 'Duomouseion',
                        'who' => 'Duomouseion',
                        'description' => 'Fransiýa tomaşaçylary üçin saz dueti sahypasy',
                        'target' => '<p>Konsert tertibi bilen owadan sahypa</p>',
                        'result' => '<p>Döredijilik keşbi üçin owadan we peýdaly sahypa</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:24:52',
                'updated_at' => '2025-05-10 06:31:37',
            ],
            [
                'id' => 103,
                'slug' => 'nidzhat',
                'photo' => 'portfolio-image/bEXPEFx4114lJqbuVAsyQePSFFnRuCrsKqMvG2qO.png',
                'when' => '2024-05-05',
                'url_button' => 'https://nidzhat.ru/',
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Nidzhat',
                        'who' => 'Nidzhat',
                        'description' => 'Personal website for legal professional',
                        'target' => '<p>Professional online presence for lawyer</p>',
                        'result' => '<p>Website that helps lawyer communicate with clients</p>',
                    ],
                    'ru' => [
                        'title' => 'Nidzhat',
                        'who' => 'Nidzhat',
                        'description' => 'Личный сайт для юриста',
                        'target' => '<p>Профессиональное онлайн-представительство</p>',
                        'result' => '<p>Сайт, который помогает юристу общаться с клиентами</p>',
                    ],
                    'tm' => [
                        'title' => 'Nidzhat',
                        'who' => 'Nidzhat',
                        'description' => 'Hukuk hünärmeni üçin şahsy sahypa',
                        'target' => '<p>Hünär derejeli onlaýn wekiliýet</p>',
                        'result' => '<p>Hukuk hünärmeniniň müşderiler bilen gürleşmegine kömek edýän sahypa</p>',
                    ],
                ],
                'created_at' => '2024-10-09 05:26:19',
                'updated_at' => '2025-05-10 06:31:31',
            ],
            [
                'id' => 107,
                'slug' => 'container-tm',
                'photo' => 'portfolio-image/ZN34MVkhb3IwiTOyObWO9ye1FcnQuQE6SiQqLzGR.png',
                'when' => '2024-02-01',
                'url_button' => 'https://container-tm.com/',
                'is_main_page' => 0,
                'status' => 1,
                'ordering' => 5,
                'translations' => [
                    'en' => [
                        'title' => 'Container-TM',
                        'who' => 'Container-TM',
                        'description' => 'Container services website',
                        'target' => '<p>Container services platform</p>',
                        'result' => '<p>Professional container services website</p>',
                    ],
                    'ru' => [
                        'title' => 'Container-TM',
                        'who' => 'Container-TM',
                        'description' => 'Сайт контейнерных услуг',
                        'target' => '<p>Платформа контейнерных услуг</p>',
                        'result' => '<p>Профессиональный сайт контейнерных услуг</p>',
                    ],
                    'tm' => [
                        'title' => 'Container-TM',
                        'who' => 'Container-TM',
                        'description' => 'Konteýner hyzmatlary sahypasy',
                        'target' => '<p>Konteýner hyzmatlary platformasy</p>',
                        'result' => '<p>Hünär derejeli konteýner hyzmatlary sahypasy</p>',
                    ],
                ],
                'created_at' => '2024-10-22 04:23:37',
                'updated_at' => '2025-05-10 06:30:02',
            ],
            [
                'id' => 108,
                'slug' => 'anima-home',
                'photo' => 'portfolio-image/oRnGSn5TdO676wqVFwSzhnbE4qjLmKb6AvCG2UA1.png',
                'when' => '2024-08-17',
                'url_button' => 'https://play.google.com/store/apps/details?id=ru.animahome.android',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 1,
                'translations' => [
                    'en' => [
                        'title' => 'Anima Home',
                        'who' => 'Anima Home',
                        'description' => 'Smart home mobile app',
                        'target' => '<p>User-friendly mobile app for smart home control</p>',
                        'result' => '<p>Android app integrated with smart home system</p>',
                    ],
                    'ru' => [
                        'title' => 'Anima Home',
                        'who' => 'Anima Home',
                        'description' => 'Мобильное приложение для умного дома',
                        'target' => '<p>Удобное мобильное приложение для управления умным домом</p>',
                        'result' => '<p>Android-приложение, интегрированное с системой умного дома</p>',
                    ],
                    'tm' => [
                        'title' => 'Anima Home',
                        'who' => 'Anima Home',
                        'description' => 'Akylly öý üçin mobil goşundy',
                        'target' => '<p>Amatly akylly öý dolandyryş goşundysy</p>',
                        'result' => '<p>Akylly öý ulgamy bilen integrirlenen Android goşundy</p>',
                    ],
                ],
                'created_at' => '2024-10-22 04:46:03',
                'updated_at' => '2025-05-10 06:29:43',
            ],
            [
                'id' => 122,
                'slug' => 'tulpar',
                'photo' => 'https://ltm.studio/storage/20/tulp-min.jpg',
                'when' => '2025-05-02',
                'url_button' => 'https://play.google.com/store/apps/details?id=studio.ltm.tulpar&pcampaignid=web_share',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Tulpar',
                        'who' => 'Tulpar',
                        'description' => 'Intercity passenger transportation system',
                        'target' => '<p>Digital platform for transportation business</p>',
                        'result' => '<p>Comprehensive system with admin panel and mobile apps</p>',
                    ],
                    'ru' => [
                        'title' => 'Tulpar',
                        'who' => 'Tulpar',
                        'description' => 'Система междугородних пассажирских перевозок',
                        'target' => '<p>Цифровая платформа для транспортного бизнеса</p>',
                        'result' => '<p>Комплексная система с админ-панелью и мобильными приложениями</p>',
                    ],
                    'tm' => [
                        'title' => 'Tulpar',
                        'who' => 'Tulpar',
                        'description' => 'Şäherara ýolagçy daşamalary ulgamy',
                        'target' => '<p>Daşamalar işi üçin sanly platforma</p>',
                        'result' => '<p>Admin panel we mobil goşundylar bilen doly ulgam</p>',
                    ],
                ],
                'created_at' => '2025-04-13 14:50:23',
                'updated_at' => '2025-05-10 06:29:39',
            ],
            [
                'id' => 123,
                'slug' => 'eurocosmetics',
                'photo' => 'https://ltm.studio/storage/21/euroCosmetic-min.jpg',
                'when' => '2025-03-31',
                'url_button' => 'https://partners.eurocosmetics.com.tm/',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 3,
                'translations' => [
                    'en' => [
                        'title' => 'Eurocosmetics',
                        'who' => 'Eurocosmetics',
                        'description' => 'International exhibition website for cosmetics',
                        'target' => '<p>Professional presentation for international exhibition</p>',
                        'result' => '<p>One-page website aligned with brand identity</p>',
                    ],
                    'ru' => [
                        'title' => 'Eurocosmetics',
                        'who' => 'Eurocosmetics',
                        'description' => 'Сайт для международной выставки косметики',
                        'target' => '<p>Профессиональная презентация для международной выставки</p>',
                        'result' => '<p>Одностраничный сайт в фирменном стиле</p>',
                    ],
                    'tm' => [
                        'title' => 'Eurocosmetics',
                        'who' => 'Eurocosmetics',
                        'description' => 'Halkara kosmetika sergisi üçin sahypa',
                        'target' => '<p>Halkara sergi üçin hünär derejeli tanyşdyryş</p>',
                        'result' => '<p>Marka stili bilen utgaşykly bir sahypalyk saýt</p>',
                    ],
                ],
                'created_at' => '2025-04-13 14:51:21',
                'updated_at' => '2025-06-27 10:53:39',
            ],
            [
                'id' => 124,
                'slug' => 'nurana-bedew',
                'photo' => 'https://ltm.studio/storage/23/NB-bitrix-min.png',
                'when' => '2025-01-01',
                'url_button' => 'https://www.bitrix24.kz/partners/partner/23472882/',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Nurana Bedew',
                        'who' => 'Nurana Bedew',
                        'description' => 'Bitrix24 business process automation',
                        'target' => '<p>Unified tool for task management and process control</p>',
                        'result' => '<p>Bitrix24-based system with clear process tracking</p>',
                    ],
                    'ru' => [
                        'title' => 'Nurana Bedew',
                        'who' => 'Nurana Bedew',
                        'description' => 'Автоматизация бизнес-процессов на Bitrix24',
                        'target' => '<p>Единый инструмент для управления задачами и процессами</p>',
                        'result' => '<p>Система на базе Bitrix24 с четким отслеживанием процессов</p>',
                    ],
                    'tm' => [
                        'title' => 'Nurana Bedew',
                        'who' => 'Nurana Bedew',
                        'description' => 'Bitrix24 iş proseslerini awtomatlaşdyrmak',
                        'target' => '<p>Wezipeler we prosesleri dolandyrmak üçin bitewi gural</p>',
                        'result' => '<p>Bitrix24 esasynda prosesleri yzarlamak bilen ulgam</p>',
                    ],
                ],
                'created_at' => '2025-04-14 14:02:37',
                'updated_at' => '2025-05-10 06:29:32',
            ],
            [
                'id' => 125,
                'slug' => 'transcaspian-tours',
                'photo' => 'https://ltm.studio/storage/27/Transcaspian.jpg',
                'when' => '2025-02-02',
                'url_button' => 'https://transcaspiantours.com/',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 2,
                'translations' => [
                    'en' => [
                        'title' => 'Transcaspian Tours',
                        'who' => 'Transcaspian Tours',
                        'description' => 'Tourism website optimization',
                        'target' => '<p>Improve site visibility and attract tourists</p>',
                        'result' => '<p>SEO optimization and Google Ads campaigns</p>',
                    ],
                    'ru' => [
                        'title' => 'Transcaspian Tours',
                        'who' => 'Transcaspian Tours',
                        'description' => 'Оптимизация туристического сайта',
                        'target' => '<p>Повысить видимость сайта и привлечь туристов</p>',
                        'result' => '<p>SEO-оптимизация и рекламные кампании Google Ads</p>',
                    ],
                    'tm' => [
                        'title' => 'Transcaspian Tours',
                        'who' => 'Transcaspian Tours',
                        'description' => 'Turistic saýty optimizasiýa etmek',
                        'target' => '<p>Sahypanyň görünmegini ýokarlandyrmak we turistleri çekmek</p>',
                        'result' => '<p>SEO optimizasiýa we Google Ads reklam kampaniýalary</p>',
                    ],
                ],
                'created_at' => '2025-04-18 14:40:51',
                'updated_at' => '2025-05-10 06:29:17',
            ],
            [
                'id' => 126,
                'slug' => 'kenek',
                'photo' => 'portfolio-image/kenek-placeholder.png',
                'when' => '2024-09-01',
                'url_button' => 'https://play.google.com/store/apps/details?id=studio.ltm.kenek&hl=tr',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Kenek',
                        'who' => 'Kenek',
                        'description' => 'Mobile app for existing online store',
                        'target' => '<p>Expand reach and improve shopping experience</p>',
                        'result' => '<p>Mobile app for Android and iOS with full synchronization</p>',
                    ],
                    'ru' => [
                        'title' => 'Kenek',
                        'who' => 'Kenek',
                        'description' => 'Мобильное приложение для существующего интернет-магазина',
                        'target' => '<p>Расширить охват и улучшить опыт покупок</p>',
                        'result' => '<p>Мобильное приложение для Android и iOS с полной синхронизацией</p>',
                    ],
                    'tm' => [
                        'title' => 'Kenek',
                        'who' => 'Kenek',
                        'description' => 'Bar bolan internet dükany üçin mobil goşundy',
                        'target' => '<p>Elýeterliligi giňeltmek we satyn alyş tejribesini gowulaşdyrmak</p>',
                        'result' => '<p>Android we iOS üçin doly sinhronizasiýa bilen mobil goşundy</p>',
                    ],
                ],
                'created_at' => '2025-04-19 13:25:16',
                'updated_at' => '2025-05-10 06:29:10',
            ],
            [
                'id' => 127,
                'slug' => 'colife-invest',
                'photo' => 'portfolio-image/colife-invest-placeholder.png',
                'when' => '2025-03-31',
                'url_button' => 'https://www.bitrix24.kz/partners/partner/23472882/',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Colife Invest',
                        'who' => 'Colife Invest',
                        'description' => 'Real estate CRM system in Dubai',
                        'target' => '<p>Unified system for sales funnel management</p>',
                        'result' => '<p>Bitrix24 CRM system for real estate agency</p>',
                    ],
                    'ru' => [
                        'title' => 'Colife Invest',
                        'who' => 'Colife Invest',
                        'description' => 'CRM-система для недвижимости в Дубае',
                        'target' => '<p>Единая система для управления воронкой продаж</p>',
                        'result' => '<p>CRM-система Bitrix24 для агентства недвижимости</p>',
                    ],
                    'tm' => [
                        'title' => 'Colife Invest',
                        'who' => 'Colife Invest',
                        'description' => 'Dubada emläk üçin CRM ulgamy',
                        'target' => '<p>Satuw prosesini dolandyrmak üçin bitewi ulgam</p>',
                        'result' => '<p>Emläk agentligi üçin Bitrix24 CRM ulgamy</p>',
                    ],
                ],
                'created_at' => '2025-04-19 13:43:10',
                'updated_at' => '2025-05-10 06:29:03',
            ],
            [
                'id' => 128,
                'slug' => 'takyk-abzal',
                'photo' => 'https://ltm.studio/storage/36/TakykAbzal1.jpg',
                'when' => '2025-01-05',
                'url_button' => 'https://www.bitrix24.kz/partners/partner/23472882/',
                'is_main_page' => 1,
                'status' => 1,
                'ordering' => 0,
                'translations' => [
                    'en' => [
                        'title' => 'Takyk Abzal',
                        'who' => 'Takyk Abzal',
                        'description' => 'Training system digitization',
                        'target' => '<p>Digitize training structure with participant management</p>',
                        'result' => '<p>Custom Bitrix24 solution for training management</p>',
                    ],
                    'ru' => [
                        'title' => 'Takyk Abzal',
                        'who' => 'Takyk Abzal',
                        'description' => 'Цифровизация системы тренингов',
                        'target' => '<p>Перенести структуру тренингов в цифровой вид</p>',
                        'result' => '<p>Кастомное решение на Bitrix24 для управления тренингами</p>',
                    ],
                    'tm' => [
                        'title' => 'Takyk Abzal',
                        'who' => 'Takyk Abzal',
                        'description' => 'Trening ulgamyny sanly görnüşe geçirmek',
                        'target' => '<p>Trening gurluşyny sanly görnüşe geçirmek</p>',
                        'result' => '<p>Trening dolandyryşy üçin Bitrix24 esasynda ýörite çözgüt</p>',
                    ],
                ],
                'created_at' => '2025-04-23 10:07:11',
                'updated_at' => '2025-05-10 06:28:54',
            ],
        ];

        foreach ($portfolios as $portfolioData) {
            $translations = $portfolioData['translations'];
            unset($portfolioData['translations']);
            
            // Создаем портфолио
            $portfolio = Portfolio::updateOrCreate(
                ['id' => $portfolioData['id']],
                $portfolioData
            );
            
            // Создаем переводы
            foreach ($translations as $locale => $translationData) {
                PortfolioTranslation::updateOrCreate(
                    [
                        'portfolio_id' => $portfolio->id,
                        'locale' => $locale,
                    ],
                    $translationData
                );
            }
        }
    }
}
