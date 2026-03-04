<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationSeeder extends Seeder
{
    public function run(): void
    {
        $translations = [
            // UI — umumiy
            ['type' => 'ui', 'slug' => 'add',              'uz' => 'Qo\'shish',          'ru' => 'Добавить',          'en' => 'Add',                'tr' => 'Ekle',           'ar' => 'إضافة',          'zh' => '添加'],
            ['type' => 'ui', 'slug' => 'edit',             'uz' => 'Tahrirlash',         'ru' => 'Редактировать',     'en' => 'Edit',               'tr' => 'Düzenle',        'ar' => 'تعديل',          'zh' => '编辑'],
            ['type' => 'ui', 'slug' => 'delete',           'uz' => 'O\'chirish',         'ru' => 'Удалить',           'en' => 'Delete',             'tr' => 'Sil',            'ar' => 'حذف',            'zh' => '删除'],
            ['type' => 'ui', 'slug' => 'save',             'uz' => 'Saqlash',            'ru' => 'Сохранить',         'en' => 'Save',               'tr' => 'Kaydet',         'ar' => 'حفظ',            'zh' => '保存'],
            ['type' => 'ui', 'slug' => 'cancel',           'uz' => 'Bekor qilish',       'ru' => 'Отмена',            'en' => 'Cancel',             'tr' => 'İptal',          'ar' => 'إلغاء',          'zh' => '取消'],
            ['type' => 'ui', 'slug' => 'back',             'uz' => 'Orqaga',             'ru' => 'Назад',             'en' => 'Back',               'tr' => 'Geri',           'ar' => 'رجوع',           'zh' => '返回'],
            ['type' => 'ui', 'slug' => 'search',           'uz' => 'Qidirish',           'ru' => 'Поиск',             'en' => 'Search',             'tr' => 'Ara',            'ar' => 'بحث',            'zh' => '搜索'],
            ['type' => 'ui', 'slug' => 'filter',           'uz' => 'Filtrlash',          'ru' => 'Фильтр',            'en' => 'Filter',             'tr' => 'Filtrele',       'ar' => 'تصفية',          'zh' => '筛选'],
            ['type' => 'ui', 'slug' => 'actions',          'uz' => 'Amallar',            'ru' => 'Действия',          'en' => 'Actions',            'tr' => 'Eylemler',       'ar' => 'الإجراءات',      'zh' => '操作'],
            ['type' => 'ui', 'slug' => 'confirm',          'uz' => 'Tasdiqlash',         'ru' => 'Подтвердить',       'en' => 'Confirm',            'tr' => 'Onayla',         'ar' => 'تأكيد',          'zh' => '确认'],
            ['type' => 'ui', 'slug' => 'close',            'uz' => 'Yopish',             'ru' => 'Закрыть',           'en' => 'Close',              'tr' => 'Kapat',          'ar' => 'إغلاق',          'zh' => '关闭'],
            ['type' => 'ui', 'slug' => 'update',           'uz' => 'Yangilash',          'ru' => 'Обновить',          'en' => 'Update',             'tr' => 'Güncelle',       'ar' => 'تحديث',          'zh' => '更新'],
            ['type' => 'ui', 'slug' => 'create',           'uz' => 'Yaratish',           'ru' => 'Создать',           'en' => 'Create',             'tr' => 'Oluştur',        'ar' => 'إنشاء',          'zh' => '创建'],
            ['type' => 'ui', 'slug' => 'view',             'uz' => 'Ko\'rish',           'ru' => 'Просмотр',          'en' => 'View',               'tr' => 'Görüntüle',      'ar' => 'عرض',            'zh' => '查看'],
            ['type' => 'ui', 'slug' => 'active',           'uz' => 'Faol',               'ru' => 'Активный',          'en' => 'Active',             'tr' => 'Aktif',          'ar' => 'نشط',            'zh' => '活跃'],
            ['type' => 'ui', 'slug' => 'inactive',         'uz' => 'Nofaol',             'ru' => 'Неактивный',        'en' => 'Inactive',           'tr' => 'Pasif',          'ar' => 'غير نشط',        'zh' => '不活跃'],
            ['type' => 'ui', 'slug' => 'yes',              'uz' => 'Ha',                 'ru' => 'Да',                'en' => 'Yes',                'tr' => 'Evet',           'ar' => 'نعم',            'zh' => '是'],
            ['type' => 'ui', 'slug' => 'no',               'uz' => 'Yo\'q',              'ru' => 'Нет',               'en' => 'No',                 'tr' => 'Hayır',          'ar' => 'لا',             'zh' => '否'],
            ['type' => 'ui', 'slug' => 'loading',          'uz' => 'Yuklanmoqda...',     'ru' => 'Загрузка...',       'en' => 'Loading...',         'tr' => 'Yükleniyor...',  'ar' => 'جار التحميل...', 'zh' => '加载中...'],
            ['type' => 'ui', 'slug' => 'submit',           'uz' => 'Yuborish',           'ru' => 'Отправить',         'en' => 'Submit',             'tr' => 'Gönder',         'ar' => 'إرسال',          'zh' => '提交'],

            // UI — xabarlar
            ['type' => 'message', 'slug' => 'created successfully',  'uz' => 'Muvaffaqiyatli yaratildi',   'ru' => 'Успешно создан',        'en' => 'Created successfully',  'tr' => 'Başarıyla oluşturuldu', 'ar' => 'تم الإنشاء بنجاح',   'zh' => '创建成功'],
            ['type' => 'message', 'slug' => 'updated successfully',  'uz' => 'Muvaffaqiyatli yangilandi',  'ru' => 'Успешно обновлён',      'en' => 'Updated successfully',  'tr' => 'Başarıyla güncellendi', 'ar' => 'تم التحديث بنجاح',   'zh' => '更新成功'],
            ['type' => 'message', 'slug' => 'deleted successfully',  'uz' => 'Muvaffaqiyatli o\'chirildi', 'ru' => 'Успешно удалён',        'en' => 'Deleted successfully',  'tr' => 'Başarıyla silindi',     'ar' => 'تم الحذف بنجاح',     'zh' => '删除成功'],
            ['type' => 'message', 'slug' => 'are you sure',          'uz' => 'Ishonchingiz komilmi?',      'ru' => 'Вы уверены?',           'en' => 'Are you sure?',         'tr' => 'Emin misiniz?',         'ar' => 'هل أنت متأكد؟',      'zh' => '你确定吗？'],
            ['type' => 'message', 'slug' => 'are you sure delete',   'uz' => 'O\'chirishni tasdiqlaysizmi?','ru' => 'Вы уверены, что хотите удалить?','en' => 'Are you sure you want to delete?','tr' => 'Silmek istediğinizden emin misiniz?','ar' => 'هل أنت متأكد أنك تريد الحذف؟','zh' => '您确定要删除吗？'],
            ['type' => 'message', 'slug' => 'not found',             'uz' => 'Topilmadi',                  'ru' => 'Не найдено',            'en' => 'Not found',             'tr' => 'Bulunamadı',            'ar' => 'غير موجود',          'zh' => '未找到'],
            ['type' => 'message', 'slug' => 'access denied',         'uz' => 'Ruxsat yo\'q',               'ru' => 'Доступ запрещён',       'en' => 'Access denied',         'tr' => 'Erişim reddedildi',     'ar' => 'تم رفض الوصول',      'zh' => '拒绝访问'],
            ['type' => 'message', 'slug' => 'server error',          'uz' => 'Server xatosi',              'ru' => 'Ошибка сервера',        'en' => 'Server error',          'tr' => 'Sunucu hatası',         'ar' => 'خطأ في الخادم',      'zh' => '服务器错误'],
            ['type' => 'message', 'slug' => 'required field',        'uz' => 'Majburiy maydon',            'ru' => 'Обязательное поле',     'en' => 'Required field',        'tr' => 'Zorunlu alan',          'ar' => 'حقل مطلوب',          'zh' => '必填字段'],
            ['type' => 'message', 'slug' => 'invalid value',         'uz' => 'Noto\'g\'ri qiymat',         'ru' => 'Неверное значение',     'en' => 'Invalid value',         'tr' => 'Geçersiz değer',        'ar' => 'قيمة غير صالحة',     'zh' => '无效值'],

            // Menu
            ['type' => 'menu', 'slug' => 'dashboard',      'uz' => 'Bosh sahifa',        'ru' => 'Главная',           'en' => 'Dashboard',          'tr' => 'Gösterge paneli',  'ar' => 'لوحة التحكم',    'zh' => '仪表板'],
            ['type' => 'menu', 'slug' => 'hotels',         'uz' => 'Mehmonxonalar',      'ru' => 'Отели',             'en' => 'Hotels',             'tr' => 'Oteller',          'ar' => 'الفنادق',        'zh' => '酒店'],
            ['type' => 'menu', 'slug' => 'languages',      'uz' => 'Tillar',             'ru' => 'Языки',             'en' => 'Languages',          'tr' => 'Diller',           'ar' => 'اللغات',         'zh' => '语言'],
            ['type' => 'menu', 'slug' => 'translations',   'uz' => 'Tarjimalar',         'ru' => 'Переводы',          'en' => 'Translations',       'tr' => 'Çeviriler',        'ar' => 'الترجمات',       'zh' => '翻译'],
            ['type' => 'menu', 'slug' => 'users',          'uz' => 'Foydalanuvchilar',   'ru' => 'Пользователи',      'en' => 'Users',              'tr' => 'Kullanıcılar',     'ar' => 'المستخدمون',     'zh' => '用户'],
            ['type' => 'menu', 'slug' => 'settings',       'uz' => 'Sozlamalar',         'ru' => 'Настройки',         'en' => 'Settings',           'tr' => 'Ayarlar',          'ar' => 'الإعدادات',      'zh' => '设置'],
            ['type' => 'menu', 'slug' => 'reports',        'uz' => 'Hisobotlar',         'ru' => 'Отчёты',            'en' => 'Reports',            'tr' => 'Raporlar',         'ar' => 'التقارير',       'zh' => '报告'],
            ['type' => 'menu', 'slug' => 'logout',         'uz' => 'Chiqish',            'ru' => 'Выйти',             'en' => 'Logout',             'tr' => 'Çıkış',            'ar' => 'تسجيل الخروج',   'zh' => '退出'],
            ['type' => 'menu', 'slug' => 'profile',        'uz' => 'Profil',             'ru' => 'Профиль',           'en' => 'Profile',            'tr' => 'Profil',           'ar' => 'الملف الشخصي',   'zh' => '个人资料'],
            ['type' => 'menu', 'slug' => 'notifications',  'uz' => 'Bildirishnomalar',   'ru' => 'Уведомления',       'en' => 'Notifications',      'tr' => 'Bildirimler',      'ar' => 'الإشعارات',      'zh' => '通知'],

            // Form fieldlar
            ['type' => 'field', 'slug' => 'name',          'uz' => 'Nomi',               'ru' => 'Название',          'en' => 'Name',               'tr' => 'Ad',               'ar' => 'الاسم',          'zh' => '名称'],
            ['type' => 'field', 'slug' => 'title',         'uz' => 'Sarlavha',           'ru' => 'Заголовок',         'en' => 'Title',              'tr' => 'Başlık',           'ar' => 'العنوان',        'zh' => '标题'],
            ['type' => 'field', 'slug' => 'description',   'uz' => 'Tavsif',             'ru' => 'Описание',          'en' => 'Description',        'tr' => 'Açıklama',         'ar' => 'الوصف',          'zh' => '描述'],
            ['type' => 'field', 'slug' => 'text',          'uz' => 'Matn',               'ru' => 'Текст',             'en' => 'Text',               'tr' => 'Metin',            'ar' => 'النص',           'zh' => '文本'],
            ['type' => 'field', 'slug' => 'slug',          'uz' => 'Slug',               'ru' => 'Слаг',              'en' => 'Slug',               'tr' => 'Slug',             'ar' => 'المعرف',         'zh' => '标识符'],
            ['type' => 'field', 'slug' => 'type',          'uz' => 'Turi',               'ru' => 'Тип',               'en' => 'Type',               'tr' => 'Tür',              'ar' => 'النوع',          'zh' => '类型'],
            ['type' => 'field', 'slug' => 'status',        'uz' => 'Holati',             'ru' => 'Статус',            'en' => 'Status',             'tr' => 'Durum',            'ar' => 'الحالة',         'zh' => '状态'],
            ['type' => 'field', 'slug' => 'image',         'uz' => 'Rasm',               'ru' => 'Изображение',       'en' => 'Image',              'tr' => 'Resim',            'ar' => 'الصورة',         'zh' => '图片'],
            ['type' => 'field', 'slug' => 'price',         'uz' => 'Narx',               'ru' => 'Цена',              'en' => 'Price',              'tr' => 'Fiyat',            'ar' => 'السعر',          'zh' => '价格'],
            ['type' => 'field', 'slug' => 'email',         'uz' => 'Elektron pochta',    'ru' => 'Электронная почта', 'en' => 'Email',              'tr' => 'E-posta',          'ar' => 'البريد الإلكتروني','zh' => '电子邮件'],
            ['type' => 'field', 'slug' => 'phone',         'uz' => 'Telefon',            'ru' => 'Телефон',           'en' => 'Phone',              'tr' => 'Telefon',          'ar' => 'الهاتف',         'zh' => '电话'],
            ['type' => 'field', 'slug' => 'address',       'uz' => 'Manzil',             'ru' => 'Адрес',             'en' => 'Address',            'tr' => 'Adres',            'ar' => 'العنوان',        'zh' => '地址'],
            ['type' => 'field', 'slug' => 'latitude',      'uz' => 'Kenglik',            'ru' => 'Широта',            'en' => 'Latitude',           'tr' => 'Enlem',            'ar' => 'خط العرض',       'zh' => '纬度'],
            ['type' => 'field', 'slug' => 'longitude',     'uz' => 'Uzunlik',            'ru' => 'Долгота',           'en' => 'Longitude',          'tr' => 'Boylam',           'ar' => 'خط الطول',       'zh' => '经度'],
            ['type' => 'field', 'slug' => 'is active',     'uz' => 'Faolmi',             'ru' => 'Активен',           'en' => 'Is active',          'tr' => 'Aktif mi',         'ar' => 'نشط',            'zh' => '是否活跃'],
            ['type' => 'field', 'slug' => 'created at',    'uz' => 'Yaratilgan sana',    'ru' => 'Дата создания',     'en' => 'Created at',         'tr' => 'Oluşturulma tarihi','ar' => 'تاريخ الإنشاء',  'zh' => '创建时间'],
            ['type' => 'field', 'slug' => 'updated at',    'uz' => 'Yangilangan sana',   'ru' => 'Дата обновления',   'en' => 'Updated at',         'tr' => 'Güncellenme tarihi','ar' => 'تاريخ التحديث',  'zh' => '更新时间'],
            ['type' => 'field', 'slug' => 'password',      'uz' => 'Parol',              'ru' => 'Пароль',            'en' => 'Password',           'tr' => 'Şifre',            'ar' => 'كلمة المرور',    'zh' => '密码'],
            ['type' => 'field', 'slug' => 'username',      'uz' => 'Foydalanuvchi nomi', 'ru' => 'Имя пользователя', 'en' => 'Username',           'tr' => 'Kullanıcı adı',    'ar' => 'اسم المستخدم',   'zh' => '用户名'],

            // Table
            ['type' => 'table', 'slug' => 'id',            'uz' => 'ID',                 'ru' => 'ID',                'en' => 'ID',                 'tr' => 'ID',               'ar' => 'المعرف',         'zh' => '编号'],
            ['type' => 'table', 'slug' => 'number',        'uz' => 'Raqam',              'ru' => 'Номер',             'en' => 'Number',             'tr' => 'Numara',           'ar' => 'الرقم',          'zh' => '编号'],
            ['type' => 'table', 'slug' => 'total',         'uz' => 'Jami',               'ru' => 'Итого',             'en' => 'Total',              'tr' => 'Toplam',           'ar' => 'المجموع',        'zh' => '总计'],
            ['type' => 'table', 'slug' => 'per page',      'uz' => 'Sahifada',           'ru' => 'На странице',       'en' => 'Per page',           'tr' => 'Sayfa başına',     'ar' => 'في الصفحة',      'zh' => '每页'],
            ['type' => 'table', 'slug' => 'no data',       'uz' => 'Ma\'lumot yo\'q',    'ru' => 'Нет данных',        'en' => 'No data',            'tr' => 'Veri yok',         'ar' => 'لا توجد بيانات', 'zh' => '无数据'],

            // Hotel-specific
            ['type' => 'hotel', 'slug' => 'hotel',         'uz' => 'Mehmonxona',         'ru' => 'Отель',             'en' => 'Hotel',              'tr' => 'Otel',             'ar' => 'الفندق',         'zh' => '酒店'],
            ['type' => 'hotel', 'slug' => 'hotel detail',  'uz' => 'Mehmonxona tafsiloti','ru' => 'Детали отеля',     'en' => 'Hotel detail',       'tr' => 'Otel detayı',      'ar' => 'تفاصيل الفندق',  'zh' => '酒店详情'],
            ['type' => 'hotel', 'slug' => 'hotel list',    'uz' => 'Mehmonxonalar ro\'yxati','ru' => 'Список отелей', 'en' => 'Hotel list',         'tr' => 'Otel listesi',     'ar' => 'قائمة الفنادق',  'zh' => '酒店列表'],
            ['type' => 'hotel', 'slug' => 'hotel created', 'uz' => 'Mehmonxona qo\'shildi','ru' => 'Отель добавлен',  'en' => 'Hotel created',      'tr' => 'Otel eklendi',     'ar' => 'تم إضافة الفندق','zh' => '酒店已添加'],
            ['type' => 'hotel', 'slug' => 'hotel updated', 'uz' => 'Mehmonxona yangilandi','ru' => 'Отель обновлён',  'en' => 'Hotel updated',      'tr' => 'Otel güncellendi', 'ar' => 'تم تحديث الفندق','zh' => '酒店已更新'],
            ['type' => 'hotel', 'slug' => 'hotel deleted', 'uz' => 'Mehmonxona o\'chirildi','ru' => 'Отель удалён',  'en' => 'Hotel deleted',      'tr' => 'Otel silindi',     'ar' => 'تم حذف الفندق',  'zh' => '酒店已删除'],
            ['type' => 'hotel', 'slug' => 'rooms',         'uz' => 'Xonalar',            'ru' => 'Номера',            'en' => 'Rooms',              'tr' => 'Odalar',           'ar' => 'الغرف',          'zh' => '客房'],
            ['type' => 'hotel', 'slug' => 'stars',         'uz' => 'Yulduzlar',          'ru' => 'Звёзды',            'en' => 'Stars',              'tr' => 'Yıldızlar',        'ar' => 'النجوم',         'zh' => '星级'],

            // Language-specific
            ['type' => 'language', 'slug' => 'language',   'uz' => 'Til',                'ru' => 'Язык',              'en' => 'Language',           'tr' => 'Dil',              'ar' => 'اللغة',          'zh' => '语言'],
            ['type' => 'language', 'slug' => 'uzbek',      'uz' => 'O\'zbek',            'ru' => 'Узбекский',         'en' => 'Uzbek',              'tr' => 'Özbekçe',          'ar' => 'الأوزبكية',      'zh' => '乌兹别克语'],
            ['type' => 'language', 'slug' => 'russian',    'uz' => 'Rus',                'ru' => 'Русский',           'en' => 'Russian',            'tr' => 'Rusça',            'ar' => 'الروسية',        'zh' => '俄语'],
            ['type' => 'language', 'slug' => 'english',    'uz' => 'Ingliz',             'ru' => 'Английский',        'en' => 'English',            'tr' => 'İngilizce',        'ar' => 'الإنجليزية',     'zh' => '英语'],
            ['type' => 'language', 'slug' => 'turkish',    'uz' => 'Turk',               'ru' => 'Турецкий',          'en' => 'Turkish',            'tr' => 'Türkçe',           'ar' => 'التركية',        'zh' => '土耳其语'],
            ['type' => 'language', 'slug' => 'arabic',     'uz' => 'Arab',               'ru' => 'Арабский',          'en' => 'Arabic',             'tr' => 'Arapça',           'ar' => 'العربية',        'zh' => '阿拉伯语'],
            ['type' => 'language', 'slug' => 'chinese',    'uz' => 'Xitoy',              'ru' => 'Китайский',         'en' => 'Chinese',            'tr' => 'Çince',            'ar' => 'الصينية',        'zh' => '中文'],

            // Auth
            ['type' => 'auth', 'slug' => 'login',          'uz' => 'Kirish',             'ru' => 'Войти',             'en' => 'Login',              'tr' => 'Giriş',            'ar' => 'تسجيل الدخول',   'zh' => '登录'],
            ['type' => 'auth', 'slug' => 'register',       'uz' => 'Ro\'yxatdan o\'tish','ru' => 'Регистрация',       'en' => 'Register',           'tr' => 'Kayıt ol',         'ar' => 'تسجيل',          'zh' => '注册'],
            ['type' => 'auth', 'slug' => 'forgot password','uz' => 'Parolni unutdim',    'ru' => 'Забыл пароль',      'en' => 'Forgot password',    'tr' => 'Şifremi unuttum',  'ar' => 'نسيت كلمة المرور','zh' => '忘记密码'],
            ['type' => 'auth', 'slug' => 'reset password', 'uz' => 'Parolni tiklash',   'ru' => 'Сбросить пароль',   'en' => 'Reset password',     'tr' => 'Şifreyi sıfırla',  'ar' => 'إعادة تعيين كلمة المرور','zh' => '重置密码'],
            ['type' => 'auth', 'slug' => 'remember me',    'uz' => 'Eslab qol',          'ru' => 'Запомнить меня',    'en' => 'Remember me',        'tr' => 'Beni hatırla',     'ar' => 'تذكرني',         'zh' => '记住我'],

            // Pagination
            ['type' => 'pagination', 'slug' => 'previous', 'uz' => 'Oldingi',            'ru' => 'Предыдущая',        'en' => 'Previous',           'tr' => 'Önceki',           'ar' => 'السابق',         'zh' => '上一页'],
            ['type' => 'pagination', 'slug' => 'next',     'uz' => 'Keyingi',            'ru' => 'Следующая',         'en' => 'Next',               'tr' => 'Sonraki',          'ar' => 'التالي',         'zh' => '下一页'],
            ['type' => 'pagination', 'slug' => 'first',    'uz' => 'Birinchi',           'ru' => 'Первая',            'en' => 'First',              'tr' => 'İlk',              'ar' => 'الأول',          'zh' => '第一页'],
            ['type' => 'pagination', 'slug' => 'last',     'uz' => 'Oxirgi',             'ru' => 'Последняя',         'en' => 'Last',               'tr' => 'Son',              'ar' => 'الأخير',         'zh' => '最后一页'],
            ['type' => 'pagination', 'slug' => 'showing',  'uz' => 'Ko\'rsatilmoqda',    'ru' => 'Показано',          'en' => 'Showing',            'tr' => 'Gösteriliyor',     'ar' => 'عرض',            'zh' => '显示'],

            // Crud detail pages
            ['type' => 'detail', 'slug' => 'created',      'uz' => 'Yaratilgan',         'ru' => 'Создан',            'en' => 'Created',            'tr' => 'Oluşturuldu',      'ar' => 'تم الإنشاء',     'zh' => '已创建'],
            ['type' => 'detail', 'slug' => 'updated',      'uz' => 'Yangilangan',        'ru' => 'Обновлён',          'en' => 'Updated',            'tr' => 'Güncellendi',      'ar' => 'تم التحديث',     'zh' => '已更新'],
            ['type' => 'detail', 'slug' => 'details',      'uz' => 'Tafsilotlar',        'ru' => 'Детали',            'en' => 'Details',            'tr' => 'Detaylar',         'ar' => 'التفاصيل',       'zh' => '详情'],

            // Extra (100 ga yetkazish uchun)
            ['type' => 'ui', 'slug' => 'choose',           'uz' => 'Tanlang',            'ru' => 'Выберите',          'en' => 'Choose',             'tr' => 'Seçin',            'ar' => 'اختر',           'zh' => '选择'],
            ['type' => 'ui', 'slug' => 'upload',           'uz' => 'Yuklash',            'ru' => 'Загрузить',         'en' => 'Upload',             'tr' => 'Yükle',            'ar' => 'رفع',            'zh' => '上传'],
            ['type' => 'ui', 'slug' => 'download',         'uz' => 'Yuklab olish',       'ru' => 'Скачать',           'en' => 'Download',           'tr' => 'İndir',            'ar' => 'تنزيل',          'zh' => '下载'],
            ['type' => 'ui', 'slug' => 'export',           'uz' => 'Eksport',            'ru' => 'Экспорт',           'en' => 'Export',             'tr' => 'Dışa aktar',       'ar' => 'تصدير',          'zh' => '导出'],
            ['type' => 'ui', 'slug' => 'import',           'uz' => 'Import',             'ru' => 'Импорт',            'en' => 'Import',             'tr' => 'İçe aktar',        'ar' => 'استيراد',        'zh' => '导入'],
            ['type' => 'ui', 'slug' => 'copy',             'uz' => 'Nusxa olish',        'ru' => 'Копировать',        'en' => 'Copy',               'tr' => 'Kopyala',          'ar' => 'نسخ',            'zh' => '复制'],
            ['type' => 'ui', 'slug' => 'paste',            'uz' => 'Joylashtirish',      'ru' => 'Вставить',          'en' => 'Paste',              'tr' => 'Yapıştır',         'ar' => 'لصق',            'zh' => '粘贴'],
            ['type' => 'ui', 'slug' => 'print',            'uz' => 'Chop etish',         'ru' => 'Распечатать',       'en' => 'Print',              'tr' => 'Yazdır',           'ar' => 'طباعة',          'zh' => '打印'],
            ['type' => 'ui', 'slug' => 'refresh',          'uz' => 'Yangilash',          'ru' => 'Обновить',          'en' => 'Refresh',            'tr' => 'Yenile',           'ar' => 'تحديث',          'zh' => '刷新'],
            ['type' => 'ui', 'slug' => 'more',             'uz' => 'Ko\'proq',           'ru' => 'Ещё',               'en' => 'More',               'tr' => 'Daha fazla',       'ar' => 'المزيد',         'zh' => '更多'],
        ];

        foreach ($translations as $item) {
            Translation::firstOrCreate(
                ['slug' => $item['slug'], 'type' => $item['type']],
                [
                    'name' => [
                        'default' => $item['uz'],
                        'uz'      => $item['uz'],
                        'ru'      => $item['ru'],
                    ],
                ]
            );
        }
    }
}