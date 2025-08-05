<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css',
        'css/bootstrap.min.css',
        'css/fontawesome.css',
        'css/animate.css',
        'css/swiper.min.css',
        'css/odometer.css',
        'css/magnific-popup.css',
        'css/recoleta-font.css',
        'css/nice-select.css',
        'css/main.css',
    ];
    public $js = [
        'js/jquery-3.7.1.min.js',
        'js/bootstrap.bundle.min.js',
        'js/swiper.min.js',
        'js/wow.min.js',
        'js/appear.js',
        'js/odometer.min.js',
        'js/countdown.js',
        'js/imagesloaded.pkgd.min.js',
        'js/isotope.pkgd.min.js',
        'js/parallax-scroll.js',
        'js/jquery.nice-select.min.js',
        'js/jquery.magnific-popup.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}