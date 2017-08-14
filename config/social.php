<?php

return 
	array(
		'providers' => array (
			'Facebook' => array (
				'enabled' => true,
				'keys'    => array('id'=>'438778766502114', 'secret'=>'fe8037850ee81ab13d5f680d21794672'),
				'title'   => 'Facebook',
				'class'   => 'fb', 'w' => 750, 'h' => 450,
				'scope'   => 'email, user_about_me, user_birthday, user_hometown, user_website, publish_actions, read_custom_friendlists',
				'trustForwarded' => true,
			),
			'Vkontakte' => array (
				'enabled' => true,
				'keys'    => array('id'=>'6113935', 'secret'=>'hJAPyetgBcjKk7plIUg9'),
				'title'   => 'Вконтакте',
                'class'   => 'vk', 'w' => 820, 'h' => 450,
			),
			'Odnoklassniki' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'key'=>'', 'secret'=>''),
                'title'   => 'Одноклассники',
                'class'   => 'od', 'w' => 820, 'h' => 400,
			),
			'Mailru' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
                'title'   => 'Мой мир',
                'class'   => 'mm', 'w' => 580, 'h' => 400,
			),
			'Google' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
                'title'   => 'Google',
                'class'   => 'gg', 'w' => 450, 'h' => 380,
			),
			'Yandex' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
                'title'   => 'Яндекс',
                'class'   => 'ya', 'w' => 450, 'h' => 380,
			),
			'OpenID' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
				'title'   => 'OpenID',
                'class'   => 'openid', 'w' => 450, 'h' => 380,
			),
			'Yahoo' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
				'title'   => 'Yahoo',
                'class'   => 'yahoo', 'w' => 450, 'h' => 380,
			),
			'AOL' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
				'title'   => 'AOL',
                'class'   => 'aol', 'w' => 450, 'h' => 380,
			),
			'Twitter' => array (
				'enabled' => false,
				'keys'    => array('key'=>'', 'secret'=>''),
                'title'   => 'Twitter',
                'class'   => 'twitter', 'w' => 450, 'h' => 380,
			),
			'Live' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
				'title'   => 'Live',
                'class'   => 'live', 'w' => 450, 'h' => 380,
			),
			'MySpace' => array (
				'enabled' => false,
				'keys'    => array('key'=>'', 'secret'=>''),
				'title'   => 'MySpace',
                'class'   => 'myspace', 'w' => 450, 'h' => 380,
			),
			'LinkedIn' => array (
				'enabled' => false,
				'keys'    => array('key'=>'', 'secret'=>''),
				'title'   => 'LinkedIn',
                'class'   => 'linkedin', 'w' => 450, 'h' => 380,
			),
			'Foursquare' => array (
				'enabled' => false,
				'keys'    => array('id'=>'', 'secret'=>''),
				'title'   => 'Foursquare',
                'class'   => 'foursquare', 'w' => 450, 'h' => 380,
			),
		),

		# if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on 'debug_file'
		'debug_mode' => false,
		'debug_file' => '/files/logs/errors.log',
	);