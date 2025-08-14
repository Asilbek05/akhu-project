<?php

namespace backend\assets;

use yii\web\AssetBundle;

class DatatablesAsset extends AssetBundle
{
    public $basePath = '@webroot/metronic/assets';
    public $baseUrl = '@web/metronic/assets';

    public $css = [
        'plugins/custom/datatables/datatables.bundle.css',
    ];

    public $js = [
        'plugins/custom/datatables/datatables.bundle.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
