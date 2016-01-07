<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'active',
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