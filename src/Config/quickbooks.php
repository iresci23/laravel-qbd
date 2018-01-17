<?php
return [
    'qb_dsn'   		=> env('QB_DSN'),
    'qb_username'   => env('QB_USERNAME'),
    'qb_password'   => env('QB_PASSWORD'),

    'qb_timezone'   => env('QB_TIMEZONE'),
    'qb_log_level'  => constant(env('QB_LOGLEVEL')),
    'qb_mem_limit'  => env('QB_MEMLIMIT'),

    'error_map'     => array(
        '*' => array(Iresci23\LaravelQbd\Services\ErrorHandler::class,'catchallErrors')
    ),

    'hooks'			=> array(), // An array of callback hooks

    'soap'			=> array(
    					'server' 	=> constant(env('QB_SOAPSERVER')), // A pure-PHP SOAP server (no PHP ext/soap extension required, also makes debugging easier)
    					'options'	=> [] // See http://www.php.net/soap
    ),

    'handler_options'=> array(
			    		'deny_concurrent_logins' => false,
			    		'deny_reallyfast_logins' => false
    ), // // See the comments in the QuickBooks/Server/Handlers.php file

    'driver_options' => array(), //// See the comments in the QuickBooks/Driver/<YOUR DRIVER HERE>.php file ( i.e. 'Mysql.php', etc. )

    'callback_options'=> array()
];