<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
	'defaultRoute' => 'site',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cookieValidationKey',
             //'baseUrl' => '/',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
		'authManager' => [
                           'class' => 'yii\rbac\DbManager',
                           'defaultRoles' => ['?'],
          ],
		  'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
		
		
		  'view' => [
			'theme' => [
				'pathMap' => [
				//'pathMap' => ['@app/views' => '@app/themes/default'],
		         //   'baseUrl' => '@web/themes/default',
					'@app/views' => '@app/themes/main',
					
				],
			],
		],
		
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
           // 'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
		
        'db' => require(__DIR__ . '/db.php'),
    ],
	'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Admin',
			
			'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
				],
            ],
        ],
		
        'user' => [
            'class' => 'app\modules\user\User',
			'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                ],
				],
            ],
        ],
		
		 'volunteer' => [
            'class' => 'app\modules\volunteer\Volunteer',
			'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                   //'roles' => ['volunteer'],
                ],
				],
            ],
        ],
		'ngo' => [
            'class' => 'app\modules\ngo\Ngo',
			'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                   // 'roles' => ['ngo'],
                ],
				],
            ],
        ],
		 'users' => [
            'class' => 'app\modules\users\Users',
			'as access' => [
            'class' => 'yii\filters\AccessControl',
            'rules' => [
                [
                    'allow' => true,
                  //  'roles' => ['users'],
                ],
				],
            ],
        ],
   
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
