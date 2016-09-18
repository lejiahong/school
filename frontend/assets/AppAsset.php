<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/assets';
    public $css = [
        'css/unslider.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery-3.0.0.min.js',
        'js/unslider.js',
        'js/slick.min.js',
    ];
    public $depends = [

    ];
}
