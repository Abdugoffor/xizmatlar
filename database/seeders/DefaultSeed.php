<?php

namespace Database\Seeders;

use App\Models\AboutCompany;
use App\Models\ProcessSection;
use App\Models\ServiceSection;
use App\Models\Statistic;
use Illuminate\Database\Seeder;

class DefaultSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // home statik section
        $this->pageAboutCompany();
        $this->serviceSection();
        $this->protessingSection();
        $this->statisticSection();
    }

    public function pageAboutCompany()
    {

        AboutCompany::create([

            'section_label' => [
                'uz' => 'Biz haqimizda',
                'ru' => 'О компании',
                'en' => 'About Company',
            ],

            'title' => [
                'uz' => 'Biz professional xizmatlar ko‘rsatamiz',
                'ru' => 'Мы предоставляем профессиональные услуги',
                'en' => 'We Provide Professional Services',
            ],

            'description' => [
                'uz' => 'Bizning kompaniyamiz ko‘p yillik tajribaga ega bo‘lib mijozlarga sifatli xizmat ko‘rsatadi.',
                'ru' => 'Наша компания имеет многолетний опыт и предоставляет качественные услуги клиентам.',
                'en' => 'Our company has many years of experience and provides high quality services to clients.',
            ],

            'experience_year' => 10,

            'experience_text' => [
                'uz' => 'Tajriba',
                'ru' => 'Опыт',
                'en' => 'Experience',
            ],

            'experience_photo' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'block_label1' => [
                'uz' => 'Bizning missiyamiz',
                'ru' => 'Наша миссия',
                'en' => 'Our Mission',
            ],

            'block_title1' => [
                'uz' => 'Mijozlarimiz uchun eng yaxshi xizmatni taqdim etish',
                'ru' => 'Предоставлять лучший сервис для наших клиентов',
                'en' => 'Providing the best service for our clients',
            ],

            'block_photo1' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'block_label2' => [
                'uz' => 'Bizning maqsadimiz',
                'ru' => 'Наша цель',
                'en' => 'Our Goal',
            ],

            'block_title2' => [
                'uz' => 'Innovatsion yechimlar yaratish',
                'ru' => 'Создавать инновационные решения',
                'en' => 'Create innovative solutions',
            ],

            'block_photo2' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'founder_name' => [
                'uz' => 'Ali Valiyev',
                'ru' => 'Али Валиев',
                'en' => 'Ali Valiyev',
            ],

            'founder_position' => [
                'uz' => 'Kompaniya asoschisi',
                'ru' => 'Основатель компании',
                'en' => 'Founder of Company',
            ],

            'founder_photo' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'main_photo' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

        ]);
    }

    public function serviceSection()
    {
        ServiceSection::create([

            'title' => [
                'uz' => 'Bizning xizmatlar jarayoni',
                'ru' => 'Процесс наших услуг',
                'en' => 'Our Service Process',
            ],

            'description' => [
                'uz' => 'Biz mijozlarimizga eng yaxshi xizmat ko‘rsatish uchun aniq jarayon asosida ishlaymiz.',
                'ru' => 'Мы работаем по четкому процессу для предоставления лучшего сервиса нашим клиентам.',
                'en' => 'We work with a clear process to provide the best service to our clients.',
            ],

            'label_1' => [
                'uz' => 'Tahlil',
                'ru' => 'Анализ',
                'en' => 'Analysis',
            ],

            'text_1' => [
                'uz' => 'Loyihani boshlashdan oldin barcha talablar tahlil qilinadi.',
                'ru' => 'Перед началом проекта анализируются все требования.',
                'en' => 'All requirements are analyzed before starting the project.',
            ],

            'photo_1' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'label_2' => [
                'uz' => 'Rejalashtirish',
                'ru' => 'Планирование',
                'en' => 'Planning',
            ],

            'text_2' => [
                'uz' => 'Har bir loyiha uchun aniq reja ishlab chiqiladi.',
                'ru' => 'Для каждого проекта разрабатывается четкий план.',
                'en' => 'A clear plan is created for each project.',
            ],

            'photo_2' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'label_3' => [
                'uz' => 'Natija',
                'ru' => 'Результат',
                'en' => 'Result',
            ],

            'text_3' => [
                'uz' => 'Yakuniy natija mijoz talablariga mos ravishda taqdim etiladi.',
                'ru' => 'Итоговый результат предоставляется в соответствии с требованиями клиента.',
                'en' => 'The final result is delivered according to client requirements.',
            ],

            'photo_3' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

            'main_photo' => 'https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png',

        ]);
    }

    public function protessingSection()
    {
        for ($i = 1; $i <= 4; $i++) {

            ProcessSection::create([

                'title' => [
                    'uz' => "Jarayon $i",
                    'ru' => "Процесс $i",
                    'en' => "Process $i",
                ],

                'description' => [
                    'uz' => "Bu $i-bosqich jarayon haqida qisqacha ma'lumot",
                    'ru' => "Краткое описание этапа процесса $i",
                    'en' => "Short description of process step $i",
                ],

                'photo' => "https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png",

                'order' => $i,
            ]);
        }
    }

    public function statisticSection()
    {
        for ($i = 1; $i <= 4; $i++) {

            Statistic::create([

                'title' => [
                    'uz' => "Statistika $i",
                    'ru' => "Статистика $i",
                    'en' => "Statistic $i",
                ],

                'description' => [
                    'uz' => "Bu $i-statistika haqida qisqacha ma'lumot",
                    'ru' => "Краткая информация о статистике $i",
                    'en' => "Short information about statistic $i",
                ],

                'photo' => "https://wowtheme7.com/tf/logisk/assets/img/home-3/8.png",

                'is_active' => true,
            ]);
        }
    }
}
