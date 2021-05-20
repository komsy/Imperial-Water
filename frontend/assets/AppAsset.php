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
        'css/site.css',
        'css/stepper.css',
        'css/style.css',
        'css/bootstrap.min.css',
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/slick.css',
        'css/responsive.css'
        'css/default.css'
        'css/owl.carousel.min.css'
    ];
    public $js = [
        'js/app.js',
        'js/myscripts.js',
        'js/bootstrap.min.js',
        'js/slick.min.js',
        'js/popper.min.js',
        'js/main.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
