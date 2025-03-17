<?php

$urlManager = require __DIR__ . '/url_manager.php';
$assetManager = require __DIR__ . '/asset_manager.php';

return [
    'assetManager' => $assetManager,
    'request' => [
        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
        'cookieValidationKey' => 'pdG_wWpbrpWiOL57t0VQejV_j613tmtU',
    ],
    'cache' => [
        'class' => 'yii\caching\FileCache',
    ],
    'user' => [
        'identityClass' => 'app\models\User',
        'enableAutoLogin' => true,
    ],
    'errorHandler' => [
        'errorAction' => 'site/error',
    ],
    'mailer' => [
        'class' => \yii\symfonymailer\Mailer::class,
        'viewPath' => '@app/mail',
        // send all mails to a file by default.
        'useFileTransport' => false,
        'transport' => MAIL_TRANSPORT,
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
    'db' => DB_CONFIG,
    'urlManager' => $urlManager
];
