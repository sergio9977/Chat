<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
      /*  'urlManager' =>[
           // "class" => "yii\web\urlManager",
            "showScriptName" => false,
            "enablePrettyUrl" => true,
            'rules'=>[
                
            ],
        ],*/
    ],
    
];
