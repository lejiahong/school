<?php

/**
 * @var $dataProvider array
 * @var $this         yii\web\View
 * @var $filterModel  getpu\rbac\models\Search
 */

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = Yii::t('rbac', 'Permissions');
$this->params['breadcrumbs'][] = $this->title;

?>

<?= Html::a(Yii::t('rbac','Update permission'),['route'],['class' => 'fa fa-plus-circle btn btn-success']) ?>

<?php $this->beginContent('@getpu/rbac/views/layout.php') ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $filterModel,
    'layout'       => "{items}\n{pager}",
    'columns'      => [
        [
            'attribute' => 'name',
            'header'    => Yii::t('rbac', 'Name'),
            'options'   => [
                'style' => 'width: 20%'
            ],
        ],
        [
            'attribute' => 'description',
            'header'    => Yii::t('rbac', 'Description'),
            'options'   => [
                'style' => 'width: 55%'
            ],
        ],
        [
            'attribute' => 'rule_name',
            'header'    => Yii::t('rbac', 'Rule name'),
            'options'   => [
                'style' => 'width: 20%'
            ],
        ],
        [
            'class'      => ActionColumn::className(),
            'template'   => '{update} {delete}',
            'urlCreator' => function ($action, $model) {
                return Url::to(['/rbac/permission/' . $action, 'name' => $model['name']]);
            },
            'options'   => [
                'style' => 'width: 5%'
            ],
        ]
    ],
]) ?>

<?php $this->endContent() ?>