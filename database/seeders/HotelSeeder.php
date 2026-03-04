<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $hotels = [
            [
                'title' => [
                    'default' => 'Intercontinental Toshkent',
                    'uz'      => 'Intercontinental Toshkent',
                    'ru'      => 'Интерконтиненталь Ташкент',
                ],
                'description' => [
                    'default' => 'Toshkentning markazida joylashgan 5 yulduzli mehmonxona.',
                    'uz'      => 'Toshkentning markazida joylashgan 5 yulduzli mehmonxona.',
                    'ru'      => '5-звёздочный отель в центре Ташкента.',
                ],
                'text' => [
                    'default' => 'Mehmonxona zamonaviy xonalar, restoranlar va konferentsiya zallari bilan jihozlangan.',
                    'uz'      => 'Mehmonxona zamonaviy xonalar, restoranlar va konferentsiya zallari bilan jihozlangan.',
                    'ru'      => 'Отель оснащён современными номерами, ресторанами и конференц-залами.',
                ],
                'latitude'  => 41.299697,
                'longitude' => 69.240073,
                'is_active' => true,
            ],
            [
                'title' => [
                    'default' => 'Hyatt Regency Toshkent',
                    'uz'      => 'Hyatt Regency Toshkent',
                    'ru'      => 'Хаятт Риджэнси Ташкент',
                ],
                'description' => [
                    'default' => 'Zamonaviy dizayn va yuksak xizmat darajasiga ega mehmonxona.',
                    'uz'      => 'Zamonaviy dizayn va yuksak xizmat darajasiga ega mehmonxona.',
                    'ru'      => 'Отель с современным дизайном и высоким уровнем обслуживания.',
                ],
                'text' => [
                    'default' => 'Hyatt Regency mehmonxonasi sport zali, spa va ochiq hovuzi bilan mashhur.',
                    'uz'      => 'Hyatt Regency mehmonxonasi sport zali, spa va ochiq hovuzi bilan mashhur.',
                    'ru'      => 'Отель Hyatt Regency известен своим спортзалом, спа и открытым бассейном.',
                ],
                'latitude'  => 41.311820,
                'longitude' => 69.279340,
                'is_active' => true,
            ],
            [
                'title' => [
                    'default' => 'Lotte City Hotel Toshkent',
                    'uz'      => 'Lotte City Hotel Toshkent',
                    'ru'      => 'Лотте Сити Отель Ташкент',
                ],
                'description' => [
                    'default' => 'Koreya menejmentida boshqariladigan qulay va zamonaviy mehmonxona.',
                    'uz'      => 'Koreya menejmentida boshqariladigan qulay va zamonaviy mehmonxona.',
                    'ru'      => 'Удобный и современный отель под корейским управлением.',
                ],
                'text' => [
                    'default' => 'Mehmonxona Toshkent savdo markaziga yaqin joylashgan bo\'lib, biznes sayohatchilar uchun ideal.',
                    'uz'      => 'Mehmonxona Toshkent savdo markaziga yaqin joylashgan bo\'lib, biznes sayohatchilar uchun ideal.',
                    'ru'      => 'Отель расположен рядом с торговым центром Ташкента и идеально подходит для деловых путешественников.',
                ],
                'latitude'  => 41.295400,
                'longitude' => 69.233600,
                'is_active' => true,
            ],
            [
                'title' => [
                    'default' => 'Wyndham Toshkent',
                    'uz'      => 'Wyndham Toshkent',
                    'ru'      => 'Виндэм Ташкент',
                ],
                'description' => [
                    'default' => 'Xalqaro darajadagi xizmat ko\'rsatadigan zamonaviy mehmonxona.',
                    'uz'      => 'Xalqaro darajadagi xizmat ko\'rsatadigan zamonaviy mehmonxona.',
                    'ru'      => 'Современный отель с международным уровнем обслуживания.',
                ],
                'text' => [
                    'default' => 'Wyndham mehmonxonasi shaharning biznes va madaniy markaziga qulay kirish imkonini beradi.',
                    'uz'      => 'Wyndham mehmonxonasi shaharning biznes va madaniy markaziga qulay kirish imkonini beradi.',
                    'ru'      => 'Отель Wyndham обеспечивает удобный доступ к деловому и культурному центру города.',
                ],
                'latitude'  => 41.305600,
                'longitude' => 69.271200,
                'is_active' => true,
            ],
            [
                'title' => [
                    'default' => 'Grand Mir Hotel',
                    'uz'      => 'Grand Mir Hotel',
                    'ru'      => 'Гранд Мир Отель',
                ],
                'description' => [
                    'default' => 'O\'zbekistonning an\'anaviy mehmondo\'stligi ruhida qurilgan hashamatli mehmonxona.',
                    'uz'      => 'O\'zbekistonning an\'anaviy mehmondo\'stligi ruhida qurilgan hashamatli mehmonxona.',
                    'ru'      => 'Роскошный отель, построенный в духе традиционного узбекского гостеприимства.',
                ],
                'text' => [
                    'default' => 'Grand Mir milliy naqsh va zamonaviy qulayliklarni muvaffaqiyatli birlashtiradi.',
                    'uz'      => 'Grand Mir milliy naqsh va zamonaviy qulayliklarni muvaffaqiyatli birlashtiradi.',
                    'ru'      => 'Grand Mir успешно сочетает национальный орнамент с современными удобствами.',
                ],
                'latitude'  => 41.308900,
                'longitude' => 69.268400,
                'is_active' => false,
            ],
        ];

        foreach ($hotels as $hotel) {
            Hotel::firstOrCreate(
                ['latitude' => $hotel['latitude'], 'longitude' => $hotel['longitude']],
                $hotel
            );
        }
    }
}