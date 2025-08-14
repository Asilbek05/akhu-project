<?php

namespace backend\assets;

use yii\web\AssetBundle;

class FullCalendarAsset extends AssetBundle
{
    public $basePath = '@webroot/metronic/assets';
    public $baseUrl = '@web/metronic/assets';

    public $css = [
        'plugins/custom/fullcalendar/fullcalendar.bundle.css',
    ];

    public $js = [
        'plugins/custom/fullcalendar/fullcalendar.bundle.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
