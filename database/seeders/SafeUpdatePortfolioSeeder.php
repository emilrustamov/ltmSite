<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortfolioTranslation;

class SafeUpdatePortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * БЕЗОПАСНО обновляет только поле result для существующих портфолио
     */
    public function run(): void
    {
        $this->command->info('🔄 Безопасное обновление полей result для портфолио...');
        
        // Обновляем только поле result для существующих портфолио
        $portfolioResults = [
            // Nur Plastik (ID: 95)
            95 => [
                'ru' => '<p>Мы собрали чистый, лаконичный сайт, в котором есть всё необходимое: продукция с качественными фото, рассказ о производстве, контактная форма и мессенджеры для связи. Сделали многоязычную версию — чтобы зарубежные партнёры не терялись в догадках. Упор сделали не на "красоту ради красоты", а на простоту, доверие и ясность. Теперь у клиента есть инструмент, который помогает выстраивать первые деловые контакты — и уверенно презентовать компанию на международной арене.</p>',
                'en' => '<p>We created a clean, laconic website that has everything needed: products with quality photos, production story, contact form and messengers for communication. We made a multilingual version — so that foreign partners don\'t get lost in guesses. We focused not on "beauty for beauty\'s sake", but on simplicity, trust and clarity. Now the client has a tool that helps build first business contacts — and confidently present the company on the international arena.</p>',
                'tm' => '<p>Biz arassa, lakoniki sahypa döretdik, ol ähli zerur zatlary öz içine alýar: hilili suratlar bilen önümler, öndüriliş taryhy, aragatnaşyk formasy we habarlaşmak üçin messenjerler. Köp dilli wersiýa döretdik — daşarky hyzmatdaşlaryň düşnüksiz galmazlygy üçin. "Gözellik üçin gözellik" däl-de, eýsem ýönekeýlik, ynam we aýdyňlyk üstünde işledik. Indi müşderiniň ilkinji iş aragatnaşyklary gurmaga we kompaniýany halkara sahnada ynamly tanyşdyrmaga kömek edýän guraly bar.</p>'
            ],
            // Atto (ID: 99)
            99 => [
                'ru' => '<p>Мы разработали мобильное приложение для покупателей — лёгкое, понятное и стильное. Там удобно листать каталог, смотреть фотографии, добавлять в корзину и оформлять заказ. Параллельно сделали внутреннюю админку — чтобы клиент сам управлял товаром, ценами, акциями и статусами заказов. Без программистов и лишней бюрократии. Система получилась гибкой: всё работает быстро, удобно, без лишнего. А главное — у клиента теперь есть свой собственный онлайн-магазин, который можно развивать как полноценный бренд</p>',
                'en' => '<p>We developed a mobile app for customers — lightweight, intuitive, and stylish. It makes browsing the catalog a pleasure: users can easily scroll through products, view photos, add items to the cart, and place an order with just a few taps. At the same time, we built an internal admin panel — so the client could manage products, prices, promotions, and order statuses independently. No need for developers or bureaucracy. The result is a flexible system: everything runs smoothly, efficiently, and without clutter. Most importantly, the client now has a fully independent online store — a foundation they can grow into a full-fledged brand.</p>',
                'tm' => '<p>Biz müşderiler üçin ýeňil, düşnükli we döwrebap mobil goşundy taýýarladyk. Ulanyjylar katalogy aňsatlyk bilen gözden geçirip, suratlara seredip, harytlary sebede goşup we sargyt edip bilýärler. Şonuň bilen birlikde, müşderiniň özüniň harytlary, bahalary, aksiýalary we sargytlaryň ýagdaýlaryny dolandyrmagy üçin içerki admin panelini döretdik. Programmistlere ýa-da artykmaç resminama işlerine zerurlyk galmady. Netijede çeýe we amatly ulgam döredi: hemme zat çalt we ýönekeý işleýär. Iň möhümi — müşderiniň häzirki wagtda özüniň garaşsyz onlaýn dükanı bar we ol bu platformany doly derejeli brende öwürip biler.</p>'
            ],
            // Добавьте другие проекты по необходимости
        ];

        $updatedCount = 0;
        
        foreach ($portfolioResults as $portfolioId => $results) {
            foreach ($results as $locale => $result) {
                $updated = PortfolioTranslation::where('portfolio_id', $portfolioId)
                    ->where('locale', $locale)
                    ->update(['result' => $result]);
                    
                if ($updated) {
                    $updatedCount++;
                    $this->command->info("✅ Обновлен result для портфолио ID: {$portfolioId}, язык: {$locale}");
                }
            }
        }

        $this->command->info('🎉 Безопасное обновление завершено!');
        $this->command->info("📊 Обновлено записей: {$updatedCount}");
        $this->command->info('💾 Все остальные данные (фото, настройки, связи) сохранены!');
    }
}
