<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioTranslation;

class SafeUpdatePortfolioDescriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * БЕЗОПАСНО обновляет только поле description для существующих портфолио
     */
    public function run(): void
    {
        $this->command->info('🔄 Безопасное обновление полей target (цель проекта) для портфолио...');
        
        // Обновляем только поле description для существующих портфолио
        $portfolioDescriptions = [
            // Nur Plastik (ID: 95)
            95 => [
                'ru' => 'Компания выходит на международный рынок. Вопрос — как быстро и понятно рассказать о себе потенциальным партнёрам из других стран? Без сайта это сложно: нет доверия, нет информации, нет контакта. Клиенту нужен был понятный и достойный сайт, с которым не стыдно заходить на внешние рынки.',
                'en' => 'Company entering international market. The question was how to quickly and clearly tell potential partners from other countries about themselves? Without a website, this is difficult: no trust, no information, no contact. The client needed a clear and worthy website that they wouldn\'t be ashamed to enter foreign markets with.',
                'tm' => 'Kompaniýa halkara bazara çykýar. Sorag — potensial hyzmatdaşlara beýleki ýurtlardan özleri barada nädip çalt we düşnükli gürrüň bermek? Sahypa bolmasa, bu kyn: ynam ýok, maglumat ýok, aragatnaşyk ýok. Müşderi daşarky bazarlara girmekden uýat bolmaz ýaly düşnükli we abraýly sahypa isledi.'
            ],
            // Atto (ID: 99)
            99 => [
                'ru' => 'Клиент запускал бренд одежды и хотел продавать через мобильное приложение. Платформы вроде Instagram и маркетплейсы не подходили — нужен был самостоятельный канал продаж с полным контролем: витрина, заказы, клиенты, акции. Также важно было быстро обновлять каталог и отслеживать продажи без лишних сложностей.',
                'en' => 'To launch their new clothing brand, the client needed more than just another marketplace. They were looking for a fully independent mobile sales channel — one that gave them total control over how products are displayed, how orders are handled, and how customers are engaged. Easy catalog updates and clear sales tracking were key to their vision.',
                'tm' => 'Müşderi egin-eşik brendiniň işe girizilmegine taýýarlyk görýärdi we mobil goşundy arkaly doly gözegçilikli satuw ulgamyny döretmek isledi. Sosial ulgamlardaky we marketpleýs platformalaryndaky çäklendirmeler sebäpli, öz witrinasyny, müşderilerini, sargytlaryny we aksiýalary dolandyrýan garaşsyz platforma zerur boldy. Şeýle-de katalog dolandyryşyny ýönekeýleşdirmek we satuw statistikasyny tiz yzarlaýmak möhüm meseleleriň biri bolup durýardy.'
            ],
            // TM Uber (ID: 101)
            101 => [
                'ru' => 'Клиент пришёл с идеей запустить собственный сервис такси. На рынке уже были готовые решения, но все они — шаблонные: интерфейсы неудобные, доработки невозможны, логика работы жёстко зашита. А хотелось — своё. Удобное, современное, с возможностью развивать систему под себя.',
                'en' => 'The client came with an idea to launch their own taxi service. There were ready-made solutions on the market, but all of them were generic: clunky interfaces, no room for customization, and rigid business logic. What they really wanted was something of their own — user-friendly, modern, and flexible enough to evolve with their needs.',
                'tm' => 'Müşderi öz taksi hyzmatyny işe girizmek pikiri bilen bize ýüzlendi. Bazarda eýýäm taýýar çözgütler bardy, emma olar şablon görnüşindedi: interfeýsler o diýen amatly däl, üýtgetmeler girizmek mümkin däl, iş logikasy bolsa berk kodlaşdyrylan. Müşderi bolsa özüne degişli çözgüt isleýärdi — döwrebap, amatly we geljekde ösdürip boljak çeýe ulgam.'
            ],
            // Duomouseion (ID: 102)
            102 => [
                'ru' => 'Музыкальному дуэту нужно было создать сайт для французской аудитории — с акцентом на эстетику, лёгкость и удобство. Главная цель — делиться расписанием концертов, рассказывать о себе и поддерживать связь с поклонниками. Всё должно было выглядеть просто, но со вкусом — чтобы соответствовать духу классической музыки и сценической культуры Франции.',
                'en' => 'The musical duo needed a website tailored for a French audience — with a strong focus on aesthetics, simplicity, and ease of use. The main goal was to share their concert schedule, tell their story, and stay connected with fans. Everything had to look clean yet tasteful — reflecting the spirit of classical music and the stage culture of France.',
                'tm' => 'Saz sungatyna degişli duet Fransýadaky tomaşaçylara niýetlenen sahypany döretmek isledi. Saýt diňe maglumat berýän däl, eýsem estetika, ýeňillik we göze görünýän arassalyk bilen aýratyn tapawutlanmalydy. Esasy maksat — konsertleriň tertibini paýlaşmak, öz döredijilik ýoluny görkezmek we muşdaklar bilen hemişe aragatnaşykda bolmakdy. Her bir bölegi ýönekeý, emma sahna medeniýetine we klassiki saz sungatyna laýyk derejede duýgur bolmalydy.'
            ],
            // Nidzhat (ID: 103)
            103 => [
                'ru' => 'Клиенту нужен был личный сайт, чтобы представить себя как специалиста, рассказать о своей юридической практике и упростить коммуникацию с потенциальными клиентами. Основной акцент — на доверии, чёткости подачи информации и возможности быстро выйти на связь.',
                'en' => 'The client needed a personal website to present themselves as a legal professional, share their experience, and simplify communication with potential clients. The key focus was on building trust, delivering information clearly, and providing a fast way to get in touch.',
                'tm' => 'Müşderi özüni hünärmen hökmünde tanatmak, hukuk tejribesi barada gürrüň bermek we potensial müşderiler bilen aragatnaşygy ýeňilleşdirmek üçin şahsy sahypa isledi. Esasy üns — ynama, maglumatlaryň düşnükli görnüşde berilmegine we tiz aragatnaşyk gurmak mümkinçiligine göňükdirildi.'
            ],
            // Anima Home (ID: 108)
            108 => [
                'ru' => 'У заказчика уже была своя техническая команда и готовая система "умного дома": оборудование, контроллеры, внутренние протоколы. Но не хватало важного элемента — удобного мобильного приложения, через которое пользователь мог бы управлять всеми устройствами: светом, климатом, безопасностью и другими функциями. Важно было не просто сделать красивый интерфейс, а глубоко интегрироваться в уже существующую экосистему, учесть технические особенности и обеспечить стабильную работу.',
                'en' => 'The client already had their own technical team and a functioning smart home system in place — including hardware, controllers, and internal protocols. But one essential element was missing: a user-friendly mobile app that would allow users to control all devices — lighting, climate, security, and other features — from one place. The goal wasn\'t just to design a beautiful interface, but to deeply integrate into the existing ecosystem, account for all technical specifics, and ensure reliable performance.',
                'tm' => 'Müşderiniň eýýäm öz tehniki topary we taýýar "akylly öý" ulgamy bardy: enjamlar, dolandyryjylar we içerki protokollar öňden bar. Ýöne möhüm bir bölek ýetmezçilik edýärdi — ähli enjamlary (ýşyklandyryş, howa ýagdaýy, howpsuzlyk we beýleki funksiýalar) dolandyrmaga mümkinçilik berýän amatly mobil goşundy. Bu ýerde maksat diňe owadan interfeýs döretmek däl, eýsem bar bolan ekosistema çuňňur integrasiýa gazanmak, tehniki aýratynlyklary göz öňünde tutmak we durnukly işlemegi üpjün etmek boldy.'
            ],
            // Tulpar (ID: 122)
            122 => [
                'ru' => 'Клиент запускал новый бизнес по междугородним пассажирским перевозкам в Казахстане. Важно было не просто запустить сервис, а сразу выстроить его на удобной цифровой платформе — с учётом логистики, работы водителей и удобства для клиентов. Нужна была надёжная админ-панель и два мобильных приложения: для клиентов и водителей.',
                'en' => 'The client was launching a new intercity passenger transportation business in Kazakhstan. It was important not just to start the service, but to build it immediately on a convenient digital platform — taking into account logistics, driver operations, and customer experience. A reliable admin panel and two mobile applications were required: one for customers and one for drivers.',
                'tm' => 'Müşderi Gazagystanda şäherara ýolagçy daşamalary boýunça täze işini ýola goýýardy. Bu hyzmaty diňe işe girizmek däl-de, eýsem onuň ilkinji günlerden başlap döwrebap sanly platformada gurulmagy möhüm boldy — logistika, sürüjileriň işi we müşderiler üçin amatlylyk göz öňünde tutulmalydy. Şeýle hem ygtybarly admin panel we iki sany mobil goşundy gerekdi: biri müşderiler üçin, beýlekisi sürürüjiler üçin.'
            ],
            // Eurocosmetics (ID: 123)
            123 => [
                'ru' => 'Клиенту потребовался сайт для участия в международной выставке, чтобы представить свою продукцию и услуги в сфере косметических товаров. Основная цель — показать профессиональный уровень компании, выделиться среди участников и обеспечить удобный доступ к информации о бренде и предложениях.',
                'en' => 'The client needed a website for participation in an international exhibition to present their products and services in the field of cosmetics. The main goal was to showcase the company\'s professional level, stand out among other participants, and provide easy access to information about the brand and its offerings.',
                'tm' => 'Müşderä halkara sergä gatnaşmak üçin öz önümlerini we kosmetika hyzmatlaryny görkezýän web sahypasy gerekdi. Esasy maksat — kompaniýanyň hünär derejesini görkezmek, beýleki gatnaşyjylaryň arasynda tapawutlanmak we marka hem-de teklipler barada maglumatlara amatly elýeterliligi üpjün etmekdi.'
            ],
            // Nurana Bedew (ID: 124)
            124 => [
                'ru' => 'С ростом компании увеличилось количество задач, участников процессов и документов. Возникла потребность в едином инструменте для постановки задач, отслеживания ответственности, фиксирования сроков и прозрачного управления внутренними бизнес-процессами. Особенно важно было структурировать процессы, связанные с экспортом, легализацией и контрактами.',
                'en' => 'As the company grew, the number of tasks, process participants, and documents increased. There emerged a need for a unified tool to assign tasks, track responsibility, monitor deadlines, and ensure transparency in internal business processes. It was especially important to structure workflows related to export, legal documentation, and contracts.',
                'tm' => 'Kompaniýanyň ösüşi bilen birlikde wezipeleriň, gatnaşyjylaryň we resminamalaryň sany hem artdy. Şonuň üçin ähli işleri bir ýerden dolandyrmaga mümkinçilik berýän ulgam gerek boldy — wezipesini bermek, jogapkärleri belläp, möhletleri yzarlamak we iş proseslerini açyk saklamak üçin. Esasan-da eksport, resmileşdiriş we şertnamalar bilen baglanyşykly işleri tertipläp dolandyrmak gerekdi'
            ],
            // Transcaspian Tours (ID: 125)
            125 => [
                'ru' => 'Клиенту было важно, чтобы сайт не просто существовал, а действительно работал на привлечение туристов. До запуска работ он слабо индексировался, не попадал в поиск по ключевым запросам и почти не давал трафика. Требовалось поднять видимость сайта в интернете, подготовить его к продвижению и запустить рекламу.',
                'en' => 'The client wanted the website not just to exist, but to actually attract tourists. Before our work began, it was poorly indexed, didn\'t appear in search results for relevant queries, and generated almost no traffic. The task was to improve the site\'s visibility, prepare it for promotion, and launch advertising campaigns.',
                'tm' => 'Müşderi üçin esasy zat — diňe bir saýt döretmek däl-de, eýsem onuň turistleri özüne çekmegi boldy. Işler başlamazdan ozal, saýtyň indekslenişi pesdi, möhüm açar sözler boýunça gözlegde görkezilmeýärdi we islenişi ýaly traffik getirmeýärdi. Wezipa — saýtyň internetde görünmesini ýokarlandyrmak, öňe sürmäge taýýarlamak we reklamany işe girizmekdi'
            ],
            // Kenek (ID: 126)
            126 => [
                'ru' => 'У клиента уже был ранее интернет-магазин, но для расширения охвата и повышения удобства покупок понадобилось разработать мобильное приложение. Цель — выйти на мобильную аудиторию, упростить доступ к товарам, увеличить количество заказов и повысить лояльность клиентов. Важно было создать удобный интерфейс, адаптированный под смартфоны, и обеспечить публикацию на обеих платформах: Google Play и App Store.',
                'en' => 'The client already had an online store, but to expand their reach and improve the shopping experience, a mobile application needed to be developed. The goal was to reach the mobile audience, simplify access to products, increase the number of orders, and boost customer loyalty. It was important to create a user-friendly interface optimized for smartphones and ensure publication on both platforms: Google Play and the App Store.',
                'tm' => 'Müşderiniň eýýäm internet dükanı bardy, ýöne elýeterliligi giňeltmek we satyn alyş amatlylygyny ýokarlandyrmak üçin ýörite mobil goşundy taýýarlamaly boldy. Maksat — mobil ulanyjylara ýetmek, harytlara girişi ýönekeýleşdirmek, sargytlaryň sanyny artdyrmak we müşderi wepalylygyny ýokarlandyrmak. Goşundynyň telefona laýyk amatly interfeýsiniň bolmagy we onuň Google Play bilen App Store-a ýerleşdirilmegi möhüm boldy.'
            ],
            // Colife Invest (ID: 127)
            127 => [
                'ru' => 'Компания Colife Invest работает на рынке недвижимости в Дубае. С ростом количества обращений и расширением команды брокеров возникла потребность в единой системе, где можно централизованно отслеживать воронку продаж, контролировать качество работы с клиентами, фиксировать звонки и переписки, ставить задачи и видеть аналитику в режиме реального времени.',
                'en' => 'Colife Invest is a real estate company operating in the Dubai market. As the number of client inquiries grew and the team of brokers expanded, the company needed a unified system to centrally manage the sales funnel, monitor the quality of client interactions, log calls and messages, assign tasks, and view real-time analytics.',
                'tm' => 'Colife Invest — Dubaýda emläk bazarynda işleýän kompaniýa. Müşderi ýüzlenmeleriniň köpelmegi we brokerler toparynyň giňemegi bilen, satuw prosesiniň tapgyrlaryna gözegçilik etmek, müşderiler bilen gatnaşyklaryň hilini dolandyrmak, jaňlary we ýazgylary hasaba almak, wezipeleri bellemegiň hem-de analitikany hakyky wagtda görmeğiň mümkinçiligi bolan bitewi ulgam zerur boldy.'
            ],
            // Takyk Abzal (ID: 128)
            128 => [
                'ru' => 'Клиент выстроил масштабную систему проведения тренингов, в которую входят роли, модули, услуги, компании-участники, расписание и оплаты. Требовалось перенести эту структуру в цифровой вид — с возможностью управлять участниками, фиксировать оплаты, гибко распределять доступ и исключить ручную работу с таблицами. Особенно важно было: исключить ошибки при подборе участников и ролей; обеспечить контроль над статусами оплат; настроить точечный доступ к данным, особенно в части финансов; интегрировать всю систему с календарём.',
                'en' => 'The client developed a large-scale training system that includes roles, modules, services, participating companies, schedules, and payments. The task was to digitize this entire structure — enabling participant management, payment tracking, flexible access control, and eliminating manual work with spreadsheets. The key priorities were to: eliminate errors in assigning participants and roles; ensure clear control over payment statuses; set up precise data access, especially for financial information; integrate the entire system with a calendar.',
                'tm' => 'Müşderi rollar, modulalar, hyzmatlar, gatnaşyjy kompaniýalar, meýilnamalar we tölegleri öz içine alýan giň gerimli trening ulgamyny döretdi. Bu gurluşy doly sanly görnüşe geçirmek zerur boldy — gatnaşyjylary dolandyrmaga, tölegleri belläp geçmäge, elýeterliligi çeýe paýlamaga we tablisalar bilen el işi arkaly işlemegi aradan aýyrmaga mümkinçilik döretmeli boldy. Aýratyn möhüm bolan talaplar: Gatnaşyjylary we rollary saýlamakda ýalňyşlyklaryň öňüni almak; Tölegleriň ýagdaýyna doly gözegçiligi üpjün etmek; Maglumatlara, esasan hem maliýe bilen bagly bölümlere, takyk elýeterlilik gurmak; Ulgamy doly görnüşde senenama bilen integrirlemek.'
            ],
            // Добавьте другие проекты по необходимости
        ];

        $updatedCount = 0;
        
        foreach ($portfolioDescriptions as $portfolioId => $descriptions) {
            foreach ($descriptions as $locale => $description) {
                $updated = PortfolioTranslation::where('portfolio_id', $portfolioId)
                    ->where('locale', $locale)
                    ->update(['target' => $description]);
                    
                if ($updated) {
                    $updatedCount++;
                    $this->command->info("✅ Обновлен target (цель проекта) для портфолио ID: {$portfolioId}, язык: {$locale}");
                }
            }
        }

        $this->command->info('🎉 Безопасное обновление target (цель проекта) завершено!');
        $this->command->info("📊 Обновлено записей: {$updatedCount}");
        $this->command->info('💾 Все остальные данные (фото, настройки, связи) сохранены!');
    }
}
