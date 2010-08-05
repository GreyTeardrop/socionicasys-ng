<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Школа системной соционики',
	'sourceLanguage' => 'ru',
	'defaultController' => 'static',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'class' => 'CustomUrlManager',
			'urlFormat'=>'path',
			'showScriptName' => false,
			'useStrictParsing' => true,
			'rules'=>array(
				// Перенаправление старых адресов
				'modules.php' => array('legacyRedirect/nuke'),
				// Обработка pull-запросов с GitHub
				'git/pull/<id:\w+>' => 'git/pull',
				// Все адреса, не обработанные выше, отображаются с помощью контроллера StaticController
				'<path:.*>' => array('static/view', 'keepSlashes' => true),
				// Заглавная страница отображается статично
				'/' => 'static/view',
			),
		),
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info, debug',
				),
			),
		),
		'menuManager' => array(
			'class' => 'MenuManager',
			'pageTree' => 'pageTree',
		)
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		'pageTree' => array(
			'items' => array(
				array(
					'label' => 'Главная',
					'url' => array('static/view'),
					'items' => array(
						array(
							'label' => 'История соционики',
							'url' => array('static/view', 'path' => 'istorija-socioniki'),
						),
						array(
							'label' => 'О Школе системной соционики',
							'url' => array('static/view', 'path' => 'o-shkole'),
						),
						array(
							'label' => 'Новости',
							'url' => array('static/view', 'path' => 'novosti'),
						),
						array(
							'label' => 'Контакты',
							'url' => array('static/view', 'path' => 'kontakty'),
						),
					),
				),
				array(
					'label' => 'Теория',
					'url' => array('static/view', 'path' => 'teorija'),
					'items' => array(
						array(
							'label' => 'Соционика для начинающих',
							'url' => array('static/view', 'path' => 'teorija/socionika-dlja-nachinajushhih'),
						),
						array(
							'label' => 'Вступление к системной соционике',
							'url' => array('static/view', 'path' => 'teorija/vstuplenije'),
						),
						array(
							'label' => 'Системный подход',
							'url' => array('static/view', 'path' => 'teorija/sistemnyj-podhod'),
							'items' => array(
								array(
									'label' => 'Система',
									'url' => array('static/view', 'path' => 'teorija/sistemnyj-podhod/sistema'),
								),
								array(
									'label' => 'Системные принципы',
									'url' => array('static/view', 'path' => 'teorija/sistemnyj-podhod/sistemnye-principy'),
								),
							),
						),
						array(
							'label' => 'Деление информации на аспекты',
							'url' => array('static/view', 'path' => 'teorija/aspekty'),
						),
						array(
							'label' => 'Модель ТИМa',
							'url' => array('static/view', 'path' => 'teorija/model-tima'),
							'items' => array(
								array(
									'label' => 'Функции',
									'url' => array('static/view', 'path' => 'teorija/model-tima/funkcii'),
									'items' => array(
										array(
											'label' => 'Размерность функций',
											'url' => array('static/view', 'path' => 'teorija/model-tima/funkcii/razmernosti'),
										),
										array(
											'label' => 'Знаки функций',
											'url' => array('static/view', 'path' => 'teorija/model-tima/funkcii/znaki'),
										),
									),
								),
								array(
									'label' => '16 моделей ТИМа психики',
									'url' => array('static/view', 'path' => 'teorija/model-tima/16-modelej'),
								),
								array(
									'label' => 'Описание моделей ТИМа',
									'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej'),
									'items' => array(
										array(
											'label' => 'ИЛЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/ile'),
										),
										array(
											'label' => 'СЭИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/sei'),
										),
										array(
											'label' => 'ЭСЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/ese'),
										),
										array(
											'label' => 'ЛИИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/lii'),
										),
										array(
											'label' => 'ЭИЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/eie'),
										),
										array(
											'label' => 'ЛСИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/lsi'),
										),
										array(
											'label' => 'СЛЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/sle'),
										),
										array(
											'label' => 'ИЭИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/iei'),
										),
										array(
											'label' => 'СЭЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/see'),
										),
										array(
											'label' => 'ИЛИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/ili'),
										),
										array(
											'label' => 'ЛИЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/lie'),
										),
										array(
											'label' => 'ЭСИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/esi'),
										),
										array(
											'label' => 'ЛСЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/lse'),
										),
										array(
											'label' => 'ЭИИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/eii'),
										),
										array(
											'label' => 'ИЭЭ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/iee'),
										),
										array(
											'label' => 'СЛИ',
											'url' => array('static/view', 'path' => 'teorija/model-tima/opisanije-modelej/sli'),
										),
									),
								),
								array(
									'label' => 'Коммуникативные модели',
									'url' => array('static/view', 'path' => 'teorija/model-tima/kommunikativnye-modeli'),
								),
								array(
									'label' => 'Суперблоки Витал и Ментал',
									'url' => array('static/view', 'path' => 'teorija/model-tima/vital-mental'),
								),
								array(
									'label' => 'Экстраверсия / интроверсия',
									'url' => array('static/view', 'path' => 'teorija/model-tima/extra-intro'),
								),
								array(
									'label' => 'Рациональность / иррациональность',
									'url' => array('static/view', 'path' => 'teorija/model-tima/rac-irrac'),
								),
							),
						),
						array(
							'label' => 'Межтипные отношения',
							'url' => array('static/view', 'path' => 'teorija/otnoshenija'),
							'items' => array(
								array(
									'label' => 'Диады',
									'url' => array('static/view', 'path' => 'teorija/otnoshenija/diady'),
								),
								array(
									'label' => 'Квадры',
									'url' => array('static/view', 'path' => 'teorija/otnoshenija/kvadry'),
								),
								array(
									'label' => 'Кольца',
									'url' => array('static/view', 'path' => 'teorija/otnoshenija/kolca'),
								),
							),
						),
						array(
							'label' => 'Интегральные ТИМы',
							'url' => array('static/view', 'path' => 'teorija/i-timy'),
						),
					),
				),
				array(
					'label' => 'Практика определения ТИМа',
					'url' => array('static/view', 'path' => 'praktika'),
					'items' => array(
						array(
							'label' => 'Методика типирования',
							'url' => array('static/view', 'path' => 'praktika/metodika'),
						),
					),
				),
				array(
					'label' => 'Статьи, доклады',
					'url' => array('static/view', 'path' => 'statji-doklady'),
					'items' => array(
					),
				),
				array(
					'label' => 'Форум',
					'url' => '/forum/',
				),
			),
		),
	),
);