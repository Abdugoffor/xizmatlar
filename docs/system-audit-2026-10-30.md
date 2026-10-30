# Tizim tekshiruvi — 30.10.2026

Tekshiruv doirasi: Laravel controller, request, model, migration, Blade shablonlari, fayl yuklash va frontend slider sozlamalari. Ushbu tekshiruvda ilova kodi va mavjud limitlar o‘zgartirilmadi. Oldingi user update tuzatishlari saqlandi.

## Ma’lumotni ekranga chiqarish limitlari

Manba: `app/Http/Controllers/Front/IndexController.php`.

| Joy / ma’lumot | Cheklov | Izoh |
| --- | --- | --- |
| Bosh sahifa: xizmatlar | 4 ta | Faqat `is_main=true`; bu so‘rovda `is_active` tekshirilmaydi. |
| Bosh sahifa: ish jarayonlari | 4 ta | `order` bo‘yicha. |
| Bosh sahifa: izohlar | 3 ta | Eng yangi aktiv yozuvlar. |
| Bosh sahifa: statistika | 4 ta | Eng yangi aktiv yozuvlar. |
| Bosh sahifa: bloglar | 3 ta | Eng yangi aktiv yozuvlar. |
| Bosh sahifa: portfolio | 15 ta | Eng yangi aktiv yozuvlar. |
| Biz haqimizda: statistika | 4 ta | Alohida `AboutStatistic` jadvalidan. |
| Xizmatlar va bloglar ro‘yxati | Har sahifada 9 ta | Keyingi yozuvlarga sahifalash orqali o‘tiladi. |
| Xizmat tafsiloti: yon ro‘yxat | 9 ta | Aktiv xizmatlar. |
| Blog: yon ro‘yxat | 5 ta | Oxirgi 10 ta aktiv blog ichidan aralashtirib olinadi. |
| Admin ro‘yxatlari va tarix | Har sahifada 10 ta | Bu umumiy yozuvlar sonining cheklovi emas. |
| Jamoa, mijozlar, skill options | So‘rovlarda son limiti yo‘q | Aktivlik filtri tegishli joylarda ishlatiladi. |

Bosh sahifa limitlari sahifalash bilan ta’minlanmagan: qo‘shimcha yozuv bazada qoladi, lekin shu blokka chiqmaydi. Xizmatlar va bloglar uchun alohida ro‘yxat sahifalari bor.

`public/assets/js/main.js` dagi `items: 3`, `items: 4`, `slidesPerView: 3` sliderning bir paytda nechta kartani ko‘rsatishini belgilaydi. Ular bazadagi jami yozuv sonini cheklamaydi.

## Kiritishdagi belgilangan maydonlar

| Bo‘lim | Tuzilmada belgilangan son |
| --- | --- |
| Kontakt | 3 ta telefon va 3 ta email; dastlabki ikkitasi majburiy. |
| ServiceSection | 3 ta label/text/photo bloki va alohida asosiy rasm. |
| AboutPageHeader | 4 ta rasm va banner; frontend `photo_4` ni ishlatmaydi. |
| AboutPageSkills | 2 ta rasm. |
| AboutCompany | 2 ta ichki block_label/block_title/block_photo bloki. |

Tekshirilgan CRUD yaratish kodlarida yozuvlar sonini 3 yoki 4 taga yetganda to‘xtatadigan tekshiruv topilmadi. Ammo yuqoridagi maydonlar soni sxema va formaga oldindan yozilgan: masalan, to‘rtinchi telefon uchun alohida maydon mavjud emas.

Fayllar uchun ko‘p requestlarda `max:10240`, ya’ni har faylga 10 MB limit bor. Video requestida ham 10 MB. Bu yozuvlar soni bilan bog‘liq emas.

`AboutCompany`, `Video`, `ServiceSection`, `AboutPageHeader`, `AboutPageSkills`, `Contact` ayrim sahifalarda `first()` bilan olinadi. Shu bo‘limlarda qo‘shimcha yozuv yaratish uning avtomatik ravishda saytda paydo bo‘lishini anglatmaydi.

## Tasdiqlangan muammolar

1. **Yuqori — tarix sahifasida parol xeshi ochiladi.** `HasHistory` userning `password` va `remember_token` atributlarini filtrlab tashlamaydi. `routes/web.php` tarixga `admin,user` rollarining ikkalasini ham qo‘yadi, `HistoryController` esa User tarixi uchun qo‘shimcha ruxsat tekshirmaydi. Alohida testda oddiy user boshqa userning xeshini HTTP 200 javobida ko‘ra oldi. Xesh oddiy matndagi parol emas, lekin uni ko‘rsatish mumkin emas. Tuzatish: maxfiy atributlarni tarixga yozmaslik, mavjud tarix yozuvlarini alohida tozalash rejasini tuzish va User tarixi uchun ruxsatni tekshirish.

2. **Yuqori — rasm maydonlari PHP fayl nomini ham qabul qiladi.** Masalan, `StorePortfolioRequest` faqat `file|max:10240` ni tekshiradi. Testda `.php` nomli fayl validatsiyadan o‘tdi; fayl yuklanmadi yoki bajarilmadi. `FileUploadService` asl kengaytmani saqlab, faylni `public/uploaded` ichiga joylaydi. Repozitoriydagi `.htaccess` yuklangan skriptlar bajarilishini taqiqlamaydi. Tuzatish: rasm uchun rasm/MIME tekshiruvi, hujjatlar uchun aniq ruxsat etilgan turlar, xavfsiz kengaytma va yuklash katalogida skript bajarilishini o‘chirish.

3. **Aktivlik va sana filtrlarida PostgreSQL xatosi.** Service, Blog, Team, Portfolio, Client, Language, Carousel, Comment controllerlari `is_active` uchun `LIKE` ishlatadi. Blog sanasida ham `LIKE` bor. Amaldagi baza drayveri `pgsql`; alohida, ma’lumot o‘zgartirmaydigan boolean `LIKE` so‘rovi `SQLSTATE 42883` qaytardi. Natija: ushbu filtr ishlatilganda ro‘yxat xato berishi mumkin. Tuzatish: boolean uchun `=`, sana uchun `whereDate` yoki sana oralig‘i.

4. **Yashirilgan kontent to‘liq yashirilmaydi.** Bosh sahifa xizmatlar so‘rovida `is_active=true` sharti yo‘q. `serviceShow` va `blogShow` ham slug orqali qidirganda aktivlikni tekshirmaydi. Testlar noaktiv xizmat bosh sahifa kolleksiyasiga kirishini va noaktiv xizmat/blog tafsiloti controllerdan qaytishini tasdiqladi. Tuzatish: barcha ommaviy so‘rovlarga aktivlik sharti.

5. **Rasmsiz portfolio yaratish 500 xatosiga olib keladi.** Request `photo` ni ixtiyoriy deb qabul qiladi, migration esa uni majburiy qiladi. HTTP test `NOT NULL constraint failed: portfolios.photo` xatosini tasdiqladi. Client, Team, Carousel, Comment, Statistic va boshqa ayrim bo‘limlarda ham request bilan migration o‘rtasida shunday nomuvofiqlik bor; ular ushbu auditda alohida HTTP test bilan tekshirilmadi. Tuzatish: biznes talabiga ko‘ra requestni majburiy qilish yoki ustunni nullable qilish.

6. **AboutPageHeader yaratishda banner saqlanmaydi.** Yaratish formasida `banner_photo` bor va migrationda majburiy. Lekin Store request qoidalarida ham, controllerning `store()` metodida ham uni saqlash yo‘q. Update yo‘li esa banner bilan ishlaydi. Bu kod va migration asosida aniqlangan nomuvofiqlik. Tuzatish: create validatsiyasi va upload ishlovini qo‘shish.

7. **AboutPageHeader to‘rtinchi rasmi saytda chiqmaydi.** `photo_4` admin orqali saqlanadi, ammo `resources/views/front` ichida unga murojaat yo‘q; about shabloni dastlabki uch rasmni ishlatadi. Tuzatish: kerakli dizayn joyiga chiqarish yoki ishlatilmaydigan maydonni formadan olib tashlash.

8. **Mavjud email bilan yangi user yaratish baza xatosiga boradi.** Oldingi tuzatish update uchun uniqueness tekshiruvini qo‘shgan. Store requestida `unique` yo‘q. Alohida HTTP testda takroriy email `UNIQUE constraint failed: users.email` xatosini berdi. Tuzatish: Store requestga `unique:users,email` qo‘shish.

9. **O‘chirilgan yoki slugi almashtirilgan tarjima keshda qoladi.** Delete keshni tozalamaydi. Update yangi slug uchun keshni tozalaydi, eski slug uchun tozalamaydi. O‘chirish testi yozuv bazadan o‘chganidan keyin ham `getTranslation()` eski matnni qaytarganini tasdiqladi. Kesh muddati 180 daqiqa. Tuzatish: delete va slug o‘zgarishida eski kesh kalitlarini ham tozalash.

10. **Asosiy ma’lumot bo‘lmaganda bosh sahifa 500 qaytaradi.** `AboutCompany::first()` va boshqa yagona bloklar `null` bo‘lishi mumkin, shablon esa ularning atributlariga bevosita murojaat qiladi. Alohida testda `/uz` asosiy bloklar bo‘lmagan bazada HTTP 500 qaytardi. Tuzatish: bo‘sh holatni ko‘rsatish yoki zarur bloklarning o‘chirilishini boshqarish.

11. **Ishlamaydigan til kodini saqlash mumkin.** Language request ixtiyoriy 255 belgilik satrni qabul qiladi; route esa faqat 2–5 ta lotin harfiga mos keladi. Testda `uz-UZ` saqlandi, lekin `/uz-UZ/admin` 404 berdi. Tuzatish: til kodi validatsiyasini route talabi bilan moslashtirish va takrorlanishni tekshirish.

12. **CLI/test muhitida helper yuklanmaydi.** `app/helpers.php` faqat `public/index.php` orqali yuklanadi. To‘liq test to‘plamida `ExampleTest` `Call to undefined function getLanguage()` bilan yiqildi. Bundan tashqari, test `/` uchun 200 kutmoqda, route esa redirect qiladi. Tuzatish: helperni umumiy bootstrap/autoloadga ulash va testni haqiqiy route xatti-harakatiga moslash.

13. **Fayl yuklash xatosi fayl yo‘li sifatida saqlanishi mumkin.** `FileUploadService` istisnoda xato matnini qaytaradi, controllerlar esa natijani fayl yo‘li deb saqlaydi. Bu kod tahlili bilan aniqlangan; yuklash katalogida ataylab nosozlik yaratilmagan. Tuzatish: istisnoni boshqarish va upload muvaffaqiyatsiz bo‘lsa yozuvni saqlamaslik.

## Tekshiruv natijalari va chegaralari

- Vaqtinchalik audit tekshiruvlari: 10 ta test, 25 ta assertion. Ular mavjud xatti-harakatni, shu jumladan xatolarni qayta hosil qilish uchun yozildi; testlarning o‘tishi yuqoridagi nuqsonlar tuzatilganini anglatmaydi.
- To‘liq mavjud test to‘plami: 12 ta testdan 11 tasi o‘tdi, `ExampleTest` helper yuklanmagani sabab yiqildi.
- Ilova ma’lumotlarini yaratish/o‘zgartirish testlari alohida SQLite `:memory:` bazasida bajarildi. Amaldagi PostgreSQLga faqat drayverni aniqlash va boolean `LIKE` operatorini tekshirish uchun o‘qish so‘rovi yuborildi.
- Brauzerda barcha sahifalarning ko‘rinishi va barcha CRUD kombinatsiyalari tekshirilmadi. Migrationdagi nomuvofiqliklar amaldagi baza sxemasi keyinchalik qo‘lda o‘zgartirilgan bo‘lsa boshqacha namoyon bo‘lishi mumkin.
