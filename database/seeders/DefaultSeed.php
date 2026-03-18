<?php

namespace Database\Seeders;

use App\Models\AboutCompany;
use App\Models\AboutPageHeader;
use App\Models\AboutStatistic;
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
        $this->aboutPageHeader();
        $this->aboutStatistic();
        $this->aboutPageSkills();
        $this->contactSection();
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

    public function aboutPageHeader()
    {
        AboutPageHeader::create([
            'title' => [
                'uz' => 'DUNYO BO‘YLAB ENG YAXSHI TRANSPORT KOMPANIYASIGA XUSH KELIBSIZ',
                'ru' => 'ДОБРО ПОЖАЛОВАТЬ В ЛУЧШУЮ ТРАНСПОРТНУЮ КОМПАНИЮ МИРА',
                'default' => 'WELCOME WORLD WIDE BEST TRANSPORT COMPANY',
            ],

            'description' => [
                'uz' => 'Biz samarali logistika va transport xizmatlarini taqdim etamiz.',
                'ru' => 'Мы предоставляем эффективные логистические и транспортные услуги.',
                'default' => 'Competently implement efficient e-commerce without cross-unit growth strategies.',
            ],

            'text' => [
                'uz' => 'Cheksiz yangilanishlar, eng yaxshi xizmatlar va mukammal yechimlar.',
                'ru' => 'Неограниченные обновления, лучшие услуги и идеальные решения.',
                'default' => 'Unlimited revisions, best solutions and professional services.',
            ],

            'experience_text' => [
                'uz' => 'YILLIK TAJRIBA',
                'ru' => 'ЛЕТ ОПЫТА',
                'default' => 'YEARS EXPERIENCE',
            ],

            'experience_year' => '2022-01-01',

            'photo_1' => 'https://wowtheme7.com/tf/logisk/assets/img/about/1.png',
            'photo_2' => 'https://wowtheme7.com/tf/logisk/assets/img/about/1.png',
            'photo_3' => 'https://wowtheme7.com/tf/logisk/assets/img/about/1.png',
            'photo_4' => 'https://wowtheme7.com/tf/logisk/assets/img/about/1.png',
            'banner_photo' => 'https://wowtheme7.com/tf/logisk/assets/img/about/1.png',

            'ceo_name' => 'Mosala',
        ]);
    }

    public function aboutStatistic()
    {
        AboutStatistic::create([
            'title' => [
                'uz' => '2000+',
                'ru' => '2000+',
                'default' => '2000+',
            ],
            'description' => [
                'uz' => 'LOYIHA TAMOMLANDI',
                'ru' => 'ЗАВЕРШЕННЫЕ ПРОЕКТЫ',
                'default' => 'PROJECTS COMPLETED',
            ],
            'text' => [
                'uz' => "Ta'mirlash mumkin bo'lgan oraliq orqali oldingi qismdagi bo'shliqlarga qulay ta'sir ko'rsatadi.",
                'ru' => "Промежуток для ремонта удобно влияет на пространство предыдущего блока.",
                'default' => "It conveniently affects the spacing of the previous section through adjustable spacing.",
            ],
        ]);

        AboutStatistic::create([
            'title' => [
                'uz' => '100+',
                'ru' => '100+',
                'default' => '100+',
            ],
            'description' => [
                'uz' => 'ENG YAXSHI XODIMLAR',
                'ru' => 'ЛУЧШИЕ СОТРУДНИКИ',
                'default' => 'BEST EMPLOYEES',
            ],
            'text' => [
                'uz' => "Ta'mirlash mumkin bo'lgan oraliq orqali oldingi qismdagi bo'shliqlarga qulay ta'sir ko'rsatadi.",
                'ru' => "Промежуток для ремонта удобно влияет на пространство предыдущего блока.",
                'default' => "It conveniently affects the spacing of the previous section through adjustable spacing.",
            ],
        ]);

        AboutStatistic::create([
            'title' => [
                'uz' => '450+',
                'ru' => '450+',
                'default' => '450+',
            ],
            'description' => [
                'uz' => "DUNYO BO'YLAB MIJOZLAR",
                'ru' => 'КЛИЕНТЫ ПО ВСЕМУ МИРУ',
                'default' => 'WORLDWIDE CLIENTS',
            ],
            'text' => [
                'uz' => "Ta'mirlash mumkin bo'lgan oraliq orqali oldingi qismdagi bo'shliqlarga qulay ta'sir ko'rsatadi.",
                'ru' => "Промежуток для ремонта удобно влияет на пространство предыдущего блока.",
                'default' => "It conveniently affects the spacing of the previous section through adjustable spacing.",
            ],
        ]);

        AboutStatistic::create([
            'title' => [
                'uz' => '80+',
                'ru' => '80+',
                'default' => '80+',
            ],
            'description' => [
                'uz' => 'JAHON MUKOFOTLARI',
                'ru' => 'МИРОВЫЕ НАГРАДЫ',
                'default' => 'GLOBAL AWARDS',
            ],
            'text' => [
                'uz' => "Ta'mirlash mumkin bo'lgan oraliq orqali oldingi qismdagi bo'shliqlarga qulay ta'sir ko'rsatadi.",
                'ru' => "Промежуток для ремонта удобно влияет на пространство предыдущего блока.",
                'default' => "It conveniently affects the spacing of the previous section through adjustable spacing.",
            ],
        ]);
    }

    public function aboutPageSkills()
    {
        \App\Models\AboutPageSkills::create([
            'title' => [
                'uz' => "NEGA BIZNI TANLASH KERAK?",
                'ru' => "ПОЧЕМУ ВЫБИРАЮТ НАС?",
                'default' => "WHY CHOOSE US?",
            ],

            'description' => [
                'uz' => "BIZNING KO'NIKMALARIMIZ",
                'ru' => "НАШИ НАВЫКИ",
                'default' => "OUR SKILLS",
            ],

            'text' => [
                'uz' => "Aniq natijalar orqali mijozga yo'naltirilgan konvergentsiyani global miqyosda qo'llab-quvvatlang. Sinergistik ravishda shaffoflikni amalga oshiring.",
                'ru' => "Поддерживайте глобальную конвергенцию, ориентированную на клиента, через четкие результаты. Синергетически обеспечивайте прозрачность.",
                'default' => "Support client-oriented convergence globally through clear results. Synergistically implement transparency.",
            ],

            'photo_1' => "https://wowtheme7.com/tf/logisk/assets/img/about/3.jpg",
            'photo_2' => "https://wowtheme7.com/tf/logisk/assets/img/about/4.jpg",
        ]);
    }

    public function contactSection()
    {
        \App\Models\Contact::create([
            'phone_1' => '+998 90 123 45 67',
            'phone_2' => '+998 91 765 43 21',

            'email_1' => 'info@company.uz',
            'email_2' => 'support@company.uz',

            'address' => [
                'uz' => 'Toshkent shahri, Yunusobod tumani',
                'ru' => 'Город Ташкент, Юнусабадский район',
                'en' => 'Tashkent city, Yunusabad district',
            ],

            'tlegram' => 'https://t.me/company',
            'facebook' => 'https://facebook.com/company',
            'instagram' => 'https://instagram.com/company',
            'watsapp' => 'https://wa.me/998901234567',
            'linked' => 'https://linkedin.com/company/company',
            "location" => "https://maps.app.goo.gl/1P2sKQnNtW2RtE8n6",
        ]);
    }
}
