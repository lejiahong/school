<?php

/**
 * Created by getpu on 16/8/31.
 */
 
namespace frontend\controllers;

use frontend\models\Reprint;
use yii\web\Controller;
use frontend\models\News;


class NewsController extends Controller
{
    public $ids = [];

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = News::getData();
        $reprints = Reprint::find()->orderBy(['created_at' => SORT_ASC])->limit(10)->all();
        return $this->render('index',[
            'dataProvider' => $dataProvider,
            'reprints' => $reprints,
        ]);
    }

    /**
     * @param $cid
     * @param $id
     * @return string
     */
    public function actionDetail($cid,$id)
    {
        $detail = News::find()->where('cid = :cid and id = :id',[':cid' => $cid, ':id' => $id])->one();
        return $this->render('detail',[
            'detail' => $detail,
        ]);
    }

    /***
     * @return string
     */
    public function actionLayout()
    {
        $dataProvider = News::find()->where(['cid' => 4, 'top' => 1, 'rec' => 1])->limit(9)->all();
        return $this->render('layout',[
           'dataProvider' => $dataProvider,
        ]);
    }
}