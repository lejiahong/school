<?php
namespace mobile\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\data\Pagination;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Response;
use mobile\models\FronArticle;

/**
 * Site controller
 */
class AppController extends Controller
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
     * 首页
     */
    public function actionIndex()
    {
        $this->layout = false;

        //banner
        $banner = FronArticle::find()
                ->joinWith('fronFiles')
                ->andWhere(['=','top','1'])
                ->limit(3)
                ->all();

        //公告
        $news = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','10'])
            ->andWhere(['=','top','1'])
            ->limit(6)
            ->all();

        //创业导师
        $teacher = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','20'])
            ->one();

        //在线课程
        $course = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','14'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(6)
            ->all();

        //教师科技成果转化
        $change = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','11'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(6)
            ->all();

        //新闻动态
        $newsTrends = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','4'])
            ->andWhere(['=','top','1'])
            ->limit(4)
            ->all();

        return $this->render('index',['banner'=>$banner, 'news'=>$news, 'teacher'=>$teacher, 'course'=>$course ,'change'=>$change, 'newsTrends'=>$newsTrends]);
    }

    //创业课程
    public function actionLesson()
    {
        $this->layout = false;
        $this->getView()->title = "创业干货-创业课程";

        //创业干货-创业课程-最新课程
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','14']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 4]);
        $model = $data->offset($pages->offset)->limit($pages->limit)->all();

        //创业干货-创业课程-最多观看
        $modelMore = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','14'])
            ->limit(4)
            ->all();
        return $this->render('venture_lesson',['model'=>$model,'pages'=>$pages,'modelMores'=>$modelMore,]);
    }

    //课程详情
    public function actionLesson_detail()
    {
        $this->layout = false;
        return $this->render('Lesson_detail');
    }

}
