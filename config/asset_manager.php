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
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            'js' => ['src/vendorJs/jquery.min.js'],
            'jsOptions' => ['position' => View::POS_END]
        ],
        'yii\bootstrap5\BootstrapAsset' => [
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            'css' => ['src/vendorCss/bootstrap.min.css',],
        ],
        'yii\bootstrap5\BootstrapPluginAsset' => [
            'basePath' => '@webroot',
            'baseUrl' => '@web',
            'js' => ['src/vendorJs/bootstrap.bundle.min.js',],
            'jsOptions' => ['position' => View::POS_END]
        ],
    ],
];
