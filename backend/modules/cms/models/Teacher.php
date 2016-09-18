<?php

/**
 * Created by getpu on 16/9/7.
 */

namespace backend\modules\cms\models;

use Yii;

class Teacher extends FronArticle
{
    public static $cid = 18;

    public function init()
    {
        $this->cid = self::$cid;
        parent::init();
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['fid'] = Yii::t('app', 'Teacher avatar');
        $labels['title'] = Yii::t('app','Teacher name');
        return $labels;
    }
}