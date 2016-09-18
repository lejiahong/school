<?php

/**
 * Created by getpu on 16/9/6.
 */
 
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Competition;
use yii\web\Response;
use yii\helpers\Url;

class CompetitionController extends Controller
{

    public function actionIndex()
    {
        $model = new Competition;
        if(Yii::$app->request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            $items = $model->dataProvider(Yii::$app->request->post());
            $data = [];
            foreach($items->getModels() as $k => $item) {
                if($item->end_time < time()){
                    $item->status = 1;
                    $item->save(false);
                }
               $data[$k]['title'] = $item->article->title;
               $data[$k]['img']  = $item->article->files->host .DIRECTORY_SEPARATOR. $item->article->files->name;
               $data[$k]['str_time'] = date('Y-m-d', $item->str_time);
               $data[$k]['end_time'] = date('Y-m-d', $item->end_time);
               $data[$k]['url'] = Url::to(['news/detail', 'cid' => $item->article->category->id, 'id' => $item->aid]);
               $data[$k]['status'] = $item->status;
               $data[$k]['clicked'] = $item->article->clicked;
            }
            return [
              'data' => $data,
              'page' => $items->getPagination(),
            ];
        } else {
            return $this->render('index',[
                'data' => $model->dataProvider(Yii::$app->request->post()),
            ]);
        }
    }

}

