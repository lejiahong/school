<?php
namespace frontend\controllers;

use getpu\devicedetect\Devicedetect;
use Yii;
use yii\web\Controller;
use frontend\models\Banner;
use frontend\models\Dynamic;


/**
 * Site controller
 */
class SiteController extends Controller
{

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $banner = Banner::find()->where(['tid' => 13])->orderBy(['sort' => SORT_ASC])->all(); // 首页横幅
        $dynamic= Dynamic::getNews();

        //$mobile = new \getpu\devicedetect\models\Mobile_Detect();

       // var_dump(\Yii::$app->devicedetect->isMobile());



        return $this->render('index',[
            'banner' => $banner,
            'dynamic' => $dynamic, //动态信息
        ]);
    }

}
