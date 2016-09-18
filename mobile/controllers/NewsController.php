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
use mobile\models\FronReprint;

/**
 * Site controller
 */
class NewsController extends Controller
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
     * 新闻
     */
    public function actionIndex()
    {
        $this->layout = false;

        $this->getView()->title = "新闻动态-重点新闻";

        //重点新闻-banner
        $newsBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->one();

        //重点新闻
        $news = FronArticle::find()
                ->joinWith('fronFiles')
                ->joinWith('fronCategorys')
                ->andWhere(['=','cid','4'])
                ->limit(4)
                ->orderBy(['id'=>SORT_DESC])
                ->all();

        return $this->render('news',['news'=>$news, 'newsBanner'=>$newsBanner,]);

    }

    //重点新闻load
    public function actionNews_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->joinWith('fronCategorys')
                ->where(['cid' => '4']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    /**
     * 创业资讯
     */
    public function actionInformation()
    {
        $this->layout = false;

        $this->getView()->title = "新闻动态-创业资讯";

        //创业资讯-banner
        $newsBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->one();

        //创业资讯
        $information = FronArticle::find()
            ->joinWith('fronFiles')
            ->joinWith('fronCategorys')
            ->andWhere(['=','cid','19'])
            ->orderBy(['id'=>SORT_DESC])
            ->limit(4)
            ->all();

        return $this->render('information',['information'=>$information, 'newsBanner'=>$newsBanner,]);

    }

    //创业资讯load
    public function actionInformation_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronFiles')
                ->joinWith('fronCategorys')
                ->where(['cid' => '19']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    /**
     * 浙文速递
     */
    public function actionReprint()
    {
        $this->layout = false;

        $this->getView()->title = "新闻动态-浙文速递";

        //浙文速递-banner
        $newsBanner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->one();

        //浙文速递
        $reprint = FronReprint::find()
            ->orderBy(['id'=>SORT_DESC])
            ->limit(4)
            ->all();

        return $this->render('reprint',['reprint'=>$reprint, 'newsBanner'=>$newsBanner,]);

    }

    //浙文速递load
    public function actionReprint_load(){
        if(yii::$app->request->isAjax){
            $pages = new Pagination(['totalCount' => FronReprint::find()->count(), 'pageSize' => 4]);
            $data = FronReprint::find()->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //新闻详细
    public function actionDetail()
    {
        $this->layout = false;
        $this->getView()->title = "新闻动态 - 详细内容";
        //详细新闻
        $model = FronArticle::find()
            ->joinWith('fronFiles')
            ->joinWith('fronCategorys')
            ->where(['{{%fron_article}}.id'=>$_GET['id']])
            ->one();

        //推荐阅读
        $recommend = FronArticle::find()
            ->joinWith('fronFiles')
            ->joinWith('fronCategorys')
            ->where(['{{%fron_article}}.rec'=>1])
            ->limit(2)
            ->all();

        return $this->render('detail',['model'=>$model, 'recommend'=>$recommend]);
    }

    //创业大赛
    public function actionVenture_competition(){
        $this->layout = false;

        $this->getView()->title = "创业大赛-全部比赛";

        //全部比赛
        $VentureAll = FronArticle::find()
            ->joinWith('fronCompetitions')
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','9'])
            ->limit(4)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('venture_competition',['VentureAll'=>$VentureAll]);
    }

    //创业大赛load
    public function actionVenture_competition_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronCompetitions')
                ->joinWith('fronFiles')
                ->andWhere(['=','cid','9']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //正在进行
    public function actionVenture_start(){
        $this->layout = false;

        $this->getView()->title = "创业大赛-正在进行";

        //正在进行
        $VentureAll = FronArticle::find()
            ->joinWith('fronCompetitions')
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','9'])
            ->andWhere(['=','{{%fron_competition}}.status','1'])
            ->limit(4)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('venture_start',['VentureAll'=>$VentureAll]);
    }

    //正在进行load
    public function actionVenture_start_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronCompetitions')
                ->joinWith('fronFiles')
                ->andWhere(['=','cid','9'])
                ->andWhere(['=','{{%fron_competition}}.status','1']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //已经结束
    public function actionVenture_end(){
        $this->layout = false;

        $this->getView()->title = "创业大赛-已经结束";

        //已经结束
        $VentureAll = FronArticle::find()
            ->joinWith('fronCompetitions')
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','9'])
            ->andWhere(['=','{{%fron_competition}}.status','0'])
            ->limit(2)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('venture_end',['VentureAll'=>$VentureAll]);
    }

    //已经结束load
    public function actionVenture_end_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronCompetitions')
                ->joinWith('fronFiles')
                ->andWhere(['=','cid','9'])
                ->andWhere(['=','{{%fron_competition}}.status','0']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }


    //最新文章-干货速递
    public function actionInfo(){
        $this->layout = false;
        $this->getView()->title = "创业干货-干货速递";

        //最新文章-banner
        $banner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','13'])
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->one();

        //最新文章-干货速递
        $model = FronArticle::find()
            ->joinWith('fronCompetitions')
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','13'])
            ->limit(4)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('info',['model'=>$model, 'banner'=>$banner,]);
    }

    //最新文章-干货速递load
    public function actionInfo_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronCompetitions')
                ->joinWith('fronFiles')
                ->andWhere(['=','cid','13']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

    //最新文章-合作媒体
    public function actionMedia(){
        $this->layout = false;
        $this->getView()->title = "创业干货-合作媒体";

        //最新文章-banner
        $banner = FronArticle::find()
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','28'])
            ->andWhere(['=','fron_article.top','1'])
            ->orderBy(['id'=>SORT_DESC])
            ->one();

        //最新文章-合作媒体
        $model = FronArticle::find()
            ->joinWith('fronCompetitions')
            ->joinWith('fronFiles')
            ->andWhere(['=','cid','28'])
            ->limit(4)
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('info_media',['model'=>$model, 'banner'=>$banner,]);
    }

    //最新文章-合作媒体load
    public function actionMedia_load(){
        if(yii::$app->request->isAjax){
            $model = FronArticle::find()
                ->joinWith('fronCompetitions')
                ->joinWith('fronFiles')
                ->andWhere(['=','cid','28']);
            $pages = new Pagination(['totalCount' => $model->count(), 'pageSize' => 4]);
            $data = $model->offset(($pages->offset)+4)->asArray()->limit($pages->limit)->orderBy(['id'=>SORT_DESC])->all();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return $data;
        }
    }

}
