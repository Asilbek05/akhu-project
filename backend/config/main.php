<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'layout' => '_main',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl' => ['site/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsVersion' => '5'
                ],
                'kartik\file\FileInputAsset' => [
                    'bsVersion' => '5'
                ],
            ],
        ],
        'urlManagerFrontend' => [
            'class' => 'yii\web\UrlManager',
            'baseUrl' => 'http://localhost:8080',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                'signup' => 'site/signup',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'settings/update-section/<id:\d+>/<section:\w+>' => 'settings/update-section',
                'event/<event_id:\d+>/schedules' => 'event-schedule/manage',
                'leadership-sections/manage/<leadership_id:\d+>' => 'leadership-sections/manage',
                'application-requests/set-status' => 'application-requests/set-status',
            ],
        ],

    ],
    'params' => $params,
];
