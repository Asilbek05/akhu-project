<?php

namespace backend\assets;

use yii\web\AssetBundle;

class WidgetsAsset extends AssetBundle
{
    public $basePath = '@webroot/metronic/assets';
    public $baseUrl = '@web/metronic/assets';

    public $js = [
        'js/widgets.bundle.js',
        'js/custom/widgets.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
