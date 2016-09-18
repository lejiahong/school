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
class PolicyController extends Controller
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



    //政策公告
    public function actionNotice()
    {
        $this->layout = false;
        $this->getView()->title = "政策信息-政策公告";

        //政策公告
        $data = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','10']);
        $pages = new Pagination(['totalCount' => $data->count(), 'pageSize' => 6]);

        $model = $data->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('policy-notice',['notice'=>$model,'pages'=>$pages ]);
    }

    //公告详情
    public function actionDetail()
    {
        $this->layout = false;
        $this->getView()->title = "政策公告 - 公告详情";
        //公告详情
        $model = FronArticle::find()
            ->joinWith('fronFiles')
            ->joinWith('fronCategorys')
            ->where(['{{%fron_article}}.id'=>$_GET['id']])
            ->one();

        return $this->render('notice_detail',['model'=>$model,]);
    }

    //元空间-详情信息
    public function actionSpace_detail()
    {
        $this->layout = false;

        return $this->render('/news/detail_2');
    }

    //科研转化-最新发布
    public function actionTeacher()
    {
        $this->layout = false;
        $this->getView()->title = "政策信息-科研成果转化";

        //科研转化-banner
        $teacherBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','11'])
            ->andWhere(['=','top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //科研转化-最新发布
        $teacher = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','11'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(4)
            ->all();
        return $this->render('teacher',['teacher'=>$teacher, 'teacherBanner'=>$teacherBanner]);
    }

    //科研转化-最新发布load
    public function actionTeacher_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->where(['cid' => '11']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //科研转化-成功案例
    public function actionTeacher_ok()
    {
        $this->layout = false;
        $this->getView()->title = "政策信息-科研成果转化";

        //科研转化-banner
        $teacherBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','11'])
            ->andWhere(['=','top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //科研转化-最新发布
        $teacher = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','11'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();
        return $this->render('teacher_ok',['teacher'=>$teacher, 'teacherBanner'=>$teacherBanner]);
    }

    //科研转化-成功案例load
    public function actionTeacher_ok_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->where(['cid' => '11']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 3]);
            $data = $model->offset(($pages->offset)+3)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

}
