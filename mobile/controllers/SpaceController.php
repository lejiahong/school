<?php
namespace mobile\controllers;

use Yii;
use yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use mobile\models\FronArticle;

/**
 * Site controller
 */
class SpaceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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
     * 创业空间
     */
    public function actionIndex()
    {
        $this->layout = false;
        $this->getView()->title = "元空间-基本介绍";
        return $this->render('index');
    }

    //创业空间-最新公告
    public function actionFirst_notice()
    {
        $this->layout = false;
        $this->getView()->title = "元空间-最新公告";
        //创业空间-最新公告
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','17']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('first_notice',['model'=>$model,'pages'=>$pages ]);
    }

    //创业空间-文件下载
    public function actionFirst_down()
    {
        $this->layout = false;
        $this->getView()->title = "元空间-文件下载";
        //创业空间-文件下载
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','32']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('first_down',['model'=>$model,'pages'=>$pages ]);
    }

    /**
     * 创业空间-良渚科技园
     */
    public function actionScience_index()
    {
        $this->layout = false;
        $this->getView()->title = "良渚科技园-基本介绍";
        return $this->render('science_index');
    }

    //创业空间-良渚科技园-最新公告
    public function actionScience_notice()
    {
        $this->layout = false;
        $this->getView()->title = "良渚科技园-最新公告";
        //良渚科技园-最新公告
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','30']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('science_notice',['model'=>$model,'pages'=>$pages ]);
    }

    //创业空间-良渚科技园-文件下载
    public function actionScience_down()
    {
        $this->layout = false;
        $this->getView()->title = "良渚科技园-文件下载";
        //创业空间-文件下载
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','33']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('science_down',['model'=>$model,'pages'=>$pages ]);
    }

    /**
     * 创业空间-杭州众创空间
     */
    public function actionMany_index()
    {
        $this->layout = false;
        $this->getView()->title = "杭州众创空间-基本介绍";
        return $this->render('many_index');
    }

    //创业空间-杭州众创空间-最新公告
    public function actionMany_notice()
    {
        $this->layout = false;
        $this->getView()->title = "杭州众创空间-最新公告";
        //杭州众创空间-最新公告
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','31']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('many_notice',['model'=>$model,'pages'=>$pages ]);
    }

    //创业空间-良渚科技园-文件下载
    public function actionMany_down()
    {
        $this->layout = false;
        $this->getView()->title = "杭州众创空间-文件下载";
        //杭州众创空间-文件下载
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','34']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('many_down',['model'=>$model,'pages'=>$pages ]);
    }

    /**
     * 创业空间-紫金创业小镇
     */
    public function actionTown_index()
    {
        $this->layout = false;
        $this->getView()->title = "紫金创业小镇-基本介绍";
        return $this->render('town_index');
    }

    //创业空间-紫金创业小镇-最新公告
    public function actionTown_notice()
    {
        $this->layout = false;
        $this->getView()->title = "紫金创业小镇-最新公告";
        //杭州众创空间-最新公告
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','18']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('town_notice',['model'=>$model,'pages'=>$pages ]);
    }

    //创业空间-良渚科技园-文件下载
    public function actionTown_down()
    {
        $this->layout = false;
        $this->getView()->title = "紫金创业小镇-文件下载";
        //杭州众创空间-文件下载
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','35']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('town_down',['model'=>$model,'pages'=>$pages ]);
    }

}
