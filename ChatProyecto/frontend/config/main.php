<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
         'view' => [
         'theme' => [
             'pathMap' => [
                '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
             ],
         ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
       // 'session' => [
            // this is the name of the session cookie used for login on the frontend
       //     'name' => 'advanced-frontend',
       // ],
          'session' => [
        'class' => '\frontend\controllers\CustomDbSession',
        // 'db' => 'mydb',  // the application component ID of the DB connection. Defaults to 'db'.
        'sessionTable' => 'session_frontend_user', // session table name. Defaults to 'session'.
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
        'authClientCollection' => [
         'class' => 'yii\authclient\Collection',
         'clients' => [
         'facebook' => [
            'class' => 'yii\authclient\clients\Facebook',
            'authUrl' => 'https://www.facebook.com/dialog/oauth?display=popup',
            'clientId' => '1644886329156580',
            'clientSecret' => 'a571cd6e11047d5e79c35954b02ca5ab',
            'attributeNames' => ['name', 'email', 'first_name', 'last_name'],
    ],
  ],
],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
