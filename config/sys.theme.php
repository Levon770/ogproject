<?php
/**
 * Системные настройки
 */

$config = array(
	$_SERVER['HTTPS'] = 'on',
    'site.host'   => 'ogut.am',
    'site.static' => '//ogut.am',
    'site.title'  => 'Ogut.am', // название сайта, для подобных случаев: "Я уже зарегистрирован на {Example.am}"
    /**
     * Доступ к базе данных
     */
    'db.type' => 'mysql', // варианты: pgsql, mysql
    'db.host' => 'localhost', // варианты: localhost, ...
    'db.port' => '3306', // варианты: pgsql - 5432, mysql - 3306
    'db.name' => '', //ask to admin
    'db.user' => '', //ask to admin
    'db.pass' => '', //ask to admin
    'db.charset' => 'UTF8',
    'db.prefix' => 'bff_',
    /**
     * Mail
     */
    'mail.support'  => 'help@ogut.am',
    'mail.noreply'  => 'noreply@ogut.am',
    'mail.admin'    => 'help@ogut.am',
    'mail.fromname' => 'Ogut.am - Անվճար հայտարարությունների կայք',
    'mail.method'   => 'smtp', // варианты: mail, sendmail, smtp
    'mail.smtp' => array(
		'host'=>'smtp.yandex.ru',
		'port'=>465,
		'user'=>'noreply@ogut.am',
		'pass'=>'destination2',
		'secure'=>'ssl', // варианты: '', 'tls', 'ssl'
    ),
    /**
     * Локализация
     */
     'locale.available' => array( // список языков (используемых на сайте)
        // ключ языка => название языка
        'hy' => 'Հայերեն',
//       'ru' => 'Русский',
//		'en' => 'English'
     ),
     'locale.default' => 'hy', // язык по-умолчанию
    /**
     * Настройки услуг и систем оплаты (bills)
     * Полный список доступных настроек указан в BillsModuleBase::init методе
     * Также настройка доступных способов оплаты для пользователя настраивается в методе BillsBase::getPaySystems
     */
    'services.enabled' => false, // платные услуги (true - включены, false - выключены)
    'bills.robox.test' => true,
    'bills.robox.login' => 'example.am',
    'bills.robox.pass1' => '',
    'bills.robox.pass2' => '',
    /**
     * Sphinx (если используется)
     */
    'sphinx.enabled' => false, // варианты: true, false
    'sphinx.host'    => 'localhost',
    'sphinx.port'    => 3306,
    /**
     * Пользователи
     */
    'users.register.phone' => false, // Запрашивать номер телефона при регистрации (варианты: true|false)
    'users.register.phone.contacts' => false, // Отображать номер телефона указанный при регистрации в контактах профиля первым (варианты: true|false)
    'users.register.social.email.activation' => false, // Отправлять письмо со ссылкой активации при авторизации через соц. сеть (варианты: true|false)
    'users.register.captcha' => false, // Задействовать поле "капча" при регистрации  (варианты: true|false)
	'contacts.captcha' => false, // Использовать капчу, в случае если пользователь неавторизован  (варианты: true|false)
    'users.profile.phones' => 3, // Кол-во доступных номеров телефон (в профиле)
	'users.settings.destroy' => false, // Удаление аккаунта в профиле (варианты: true|false)
    # Настройки SMS:
    'users.sms.provider'      => 'sms_ru', // доступные sms провайдеры: 'sms_ru'
    'users.sms.retry.limit'   => 3, // Кол-во допустимых повторных отправок sms
    'users.sms.retry.timeout' => 3, // Кол-во минут ожидания при достижении масимально допустимых повторных отправок
    # -- провайдер sms.ru:
    'users.sms.sms_ru.api_id' => '', // Уникальный ключ (api_id), например: 4ac0c9c0-25xx-77f4-ed29-1519e8719180
    'users.sms.sms_ru.from'   => '', // Имя отправителя: http://sms.ru/?panel=mass&subpanel=senders
    'users.sms.sms_ru.test'   => false, // Тестовая отправка: (варианты: true|false)
    /**
     * Debug
     */
    'php.errors.reporting' => -1, // all
    'php.errors.display'   => 1, // отображать ошибки (варианты: 1|0)
    'localhost' => false, // localhost (варианты: true|false), для разработки на локальной машине
    'debug' => false, // варианты:true|false - включить debug-режим
    /**
     * Дополнительные настройки:
     * ! Настоятельно не рекомендуется изменять после запуска проекта
     */
    'date.timezone' => 'Europe/Moscow', // часовой пояс
    'cookie.prefix' => 'bff_', // cookie префикс
    'currency.default' => 5, // основная валюта (ID)
    /**
     * Доступный тип пользователя, публикующего объявление, варианты:
     * 1) 'user' - только пользователь (добавление объявлений доступно сразу, объявления размещаются только "от частного лица"), модуль магазинов(shops) при этом может отсутствовать.
     * 2) 'shop' - только магазин (добавление объявлений доступно после открытия магазина, только "от магазина")
     * 3) 'user-or-shop' - пользователь или магазин (добавление объявлений доступно сразу только "от частного лица", после открытия магазина - объявления размещаются "от частного лица" или "от магазина")
     * 4) 'user-to-shop' - пользователь и магазин (добавление объявлений доступно сразу только "от частного лица", после открытия магазина - объявления размещаются только "от магазина")
     * ! Настоятельно не рекомендуется изменять после запуска проекта
     */
    'bbs.publisher' => 'user',
    'bbs.premoderation' => false, // Премодерация публикации объявлений (true), постмодерация (false)
    'bbs.search.list.type' => 1, // Тип списка по-умолчанию, варианты: 1 - строчный вид, 2 - галерея при варианте 2 банеры отключаются.
    'bbs.search.category.currency' => false, // Выполнять в списках конвертацию цен объявлений в валюту указанную в категории, false - не выполнять
    'bbs.form.category.edit' => true, // Возможность редактирования категории при редактировании объявления  (варианты: true|false)
    'bbs.form.agreement' => true, // Отображать галочку пользовательского соглашения в форме добавления объявления для неавторизованных пользователей  (варианты: true|false)
    'bbs.comments' => false,	// Комментирование объявлений  (варианты: true|false)
    'bbs.comments.premoderation' => false, // Премодерация комментариев объявлений (true), постмодерация (false)
	'bbs.delete.timeout'  => 0, // Полное удаление удаленных пользователем объявлений через X дней после окончания публикации, 0 - не удалять
    'bbs.index.last.limit' => 120, // Количество последних, премиум обьявлений на главной
	
    # Магазины
    'shops.premoderation' => true, // Премодерация магазинов (true), постмодерация (false)
    'shops.categories' => true, // Использовать категории магазинов (true), Использовать категории объявлений (false)
    'shops.categories.limit' => 0, // Максимально допустимое кол-во категорий магазинов, связываемых с магазинами, 0 - без ограничений
    'shops.phones.limit' => 5, // Кол-во доступных телефонов (0 - без ограничений)
    'shops.social.limit' => 5, // Кол-во доступных ссылок соц.сетей (0 - без ограничений)
	'shops.search.pagesize' => 8, // Поиск и результаты поиска
    # Блог
    'blog.categories' => true, // Использовать категории
    'blog.tags' => true, // Использовать теги
    # Geo
    'geo.ip.location' => false, // Выполнять определение региона по IP  (варианты: true|false)
    'geo.maps.type' => 'google', // Тип карт 'google', 'yandex'
    'geo.maps.googleKey' => 'AIzaSyAJnQ-wsj0nsOZS_uJIl64ZfXmjbgpfvtI', // API ключ для Google Карт
    'geo.districts'   => true, // Включить районы города (выбор и поиск)
	'geo.default.country' => 5050, //Изменить страну по-умолчанию
    # SEO
    'seo.landing.pages.enabled' => false, // Задействовать посадочные страницы
);
// изменить в файле bff/init.php в строке 6 'support@ogut.com' на Ваш адрес почты.

return $config;