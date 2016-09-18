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
class GoodController extends Controller
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

    //创业导师
    public function actionTeacher()
    {
        $this->layout = false;
        $this->getView()->title = "校园创业-创业导师";
        //创业导师
        $teacher = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','20'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(4)
            ->all();

        return $this->render('good-teacher',['teacher'=>$teacher]);
    }

    //创业导师load
    public function actionTeacher_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->where(['cid' => '20']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //精品活动
    public function actionActive()
    {
        $this->layout = false;
        $this->getView()->title = "创业干货-精品活动";
        //banner
        $banner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','27'])
            ->andWhere(['=','top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //最新活动
        $new = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','27'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //总裁说
        $ceo = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','36'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //高桌晚宴
        $dinner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','37'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        return $this->render('good_active',['banner'=>$banner,'new'=>$new,'ceo'=>$ceo, 'dinner'=>$dinner]);
    }

    //活动详细
    public function actionDetail()
    {
        $this->layout = false;

        return $this->render('active-detail');
    }



}
