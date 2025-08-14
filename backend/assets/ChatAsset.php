<?php

namespace backend\assets;

use yii\web\AssetBundle;

class ChatAsset extends AssetBundle
{
    public $basePath = '@webroot/metronic/assets';
    public $baseUrl = '@web/metronic/assets';

    public $js = [
        'js/custom/apps/chat/chat.js',
    ];

    public $depends = [
        'backend\assets\AppAsset',
    ];
}
