<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        YII_ENV_DEV ? 'src/css/style.css' : 'dist/css/style.css'
    ];
    public $js = [
        YII_ENV_DEV ? 'src/js/main.js' : 'dist/js/main.js',
    ];
    public $jsOptions = [
        'type' => 'module',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset'
    ];
}
