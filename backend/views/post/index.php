<?php

use kartik\sidenav\SideNav;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\Accordion;
use yii\jui\Tabs;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'label'=>'Опубликовать',
                'format'=>'html',
                'value'=> function($model){
                    return $model->active ? 'Да' : 'Нет';
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {setactivity}',
                'buttons' => [
                    'setactivity' => function ($url, $model, $key) {
                        /** @var $model Post */
                        return $model->active ?
                            Html::a('<span class="glyphicon glyphicon-ban-circle"></span>', $url, ['title' => 'Deactivate']) :
                            Html::a('<span class="glyphicon glyphicon-ok-circle"></span>', $url, ['title' => 'Activate']);
                    },
                ]
            ]
        ],
    ]); ?>

</div>