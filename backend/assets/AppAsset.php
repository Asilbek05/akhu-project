<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot/metronic/assets';
    public $baseUrl = '@web/metronic/assets';

    public $css = [
        'https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700',
        'plugins/global/plugins.bundle.css',
        'css/style.bundle.css',
    ];

    public $js = [

        'js/scripts.bundle.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'yii\widgets\ActiveFormAsset',
        'yii\grid\GridViewAsset',
    ];

}
