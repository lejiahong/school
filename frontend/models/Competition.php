<?php

/**
 * Created by getpu on 16/9/6.
 */
 
namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class Competition extends \backend\modules\cms\models\FronCompetition
{
    public $active = null;
    public $over = null;

    public function rules()
    {
        return [
            [['active', 'over'], 'integer'],
        ];
    }

    public function dataProvider($params)
    {
        $query = self::find();

        $dataProvider =  new ActiveDataProvider([
           'query' => $query,
        ]);

        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;
        }

        if($this->active){
            $query->filterWhere(['>', 'end_time', time()]);
        }else if($this->over){
            $query->filterWhere(['<', 'end_time', time()]);
        }
        return $dataProvider;
    }

}
