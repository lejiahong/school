<?php

/**
 * Created by getpu on 16/9/12.
 */
 
namespace frontend\controllers;

use frontend\models\Banner;
use Yii;
use yii\web\Controller;
use frontend\models\Videos;

class VideosController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        $banner = Banner::find()->where(['tid' => 13])->orderBy(['sort' => SORT_ASC])->all();
        $searchModel = new Videos;
        $dataProvider  = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'banner' => $banner,
        ]);
    }

    /**
     * @param $id
     * @return string
     */
    public function actionDetail($id)
    {
        $model = Videos::findOne($id);
        if($model !== null){
            $model->updateCounters(['clicked' => 1]);
        }
        return $this->render('detail', [
            'model' => $model,
        ]);
    }
}