<?php

use yii\web\View;

return [
    // 'converter' => [
    //     'class' => 'yii\web\AssetConverter',
    //     'commands' => [],
    // ],
    'appendTimestamp' => true,
    // 'linkAssets' => true,
    // 'forceCopy' => YII_DEBUG,
    'bundles' => [
        'yii\web\JqueryAsset' => [
            'sourcePath' => '@npm/jquery/dist',
            // 'js' => [/* YII_ENV_DEV ? 'jquery.js' : */ 'jquery.min.js'],
            'js' => ['https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js'],
            'jsOptions' => [
                'position' => View::POS_END
            ]
        ],
        'yii\bootstrap5\BootstrapAsset' => [
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            // 'css' => [YII_ENV_DEV ? 'src/css/bootstrap.css' : 'dist/css/bootstrap.css',],
            'css' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css']
        ],
        'yii\bootstrap5\BootstrapPluginAsset' => [
            'sourcePath' => '@npm/bootstrap',
            // 'js' => [/* YII_ENV_DEV ? 'dist/js/bootstrap.bundle.js' : */ 'dist/js/bootstrap.bundle.min.js',],
            'js' => ['https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js'],
            'jsOptions' => [
                'position' => View::POS_END
            ]
        ],
    ],
];
