<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'All Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'description:ntext',
            [
                'label' => 'Автор',
                'format' => 'raw',
                'value' => function(\common\models\Coments $model){
                    $user = \common\models\User::find()->where(['id' => $model->create_as])->one();
                    $result = $user->username;
                    return $result;
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete} ',
            ]
        ],

        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-hover'
        ],
    ]); ?>

</div>