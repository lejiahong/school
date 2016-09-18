<?php

/**
 * Created by getpu on 16/8/29.
 */

namespace getpu\ueditor;


use yii\web\AssetBundle;

class UEditorAsset extends AssetBundle
{
    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
   
    public function init()
    {
        $this->sourcePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
    }
}