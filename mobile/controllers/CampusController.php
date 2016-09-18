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
class CampusController extends Controller
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
     * 创业团队-创业先锋
     */
    public function actionTeam()
    {
        $this->layout = false;
        $this->getView()->title = "校园创业-创业团队";

        //创业团队-banner
        $newsBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        //创业团队-创业先锋
        $van = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','20'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(8)
            ->all();

        //创业团队-人才招募
        $job = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','21'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(7)
            ->all();

        //创业团队-项目展示
        $projectShow = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','23'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(3)
            ->all();

        return $this->render('venture_team',['van'=>$van, 'job'=>$job, 'projectShow'=>$projectShow, 'newsBanner'=>$newsBanner,]);
    }

    //创业组织
    public function actionOrg()
    {
        $this->layout = false;

        //创业组织
        $org = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','24'])
            ->orderBy(['id'=>SORT_DESC])
            ->asArray()
            ->limit(2)
            ->all();

        return $this->render('venture_org',['org'=>$org,]);
    }

    //创业组织load
    public function actionOrg_load()
    {
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->where(['cid' => '24']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 2]);
            $data = $model->offset(($pages->offset)+2)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //投资公司
    public function actionInvest(){
        $this->layout = false;

        return $this->render('invest');
    }

}
