<?php

/**
 * Created by getpu on 16/9/8.
 */

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Policy;

class PolicyController extends Controller
{
    public function actionIndex()
    {
        $dataModel = new Policy;
        $dataProvider = $dataModel->getData(Yii::$app->request->queryParams);
        return $this->render('index',[
            'dataProvider' => $dataProvider,
        ]);
    }
}