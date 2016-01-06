<?php

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $cat yii\data\ActiveDataProvider */

?>


<div class="row">
    <div class="col-sm-3">
        <h2>Категории</h2>

        <?= ListView::widget([
            'dataProvider' => $cat,
            'itemView' => function($category) {
                return $this->render('categoryItem', [
                    'model' => $category,
                ]);
            }
        ]); ?>
    </div>
    <div class="col-sm-8">
        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function($post) {
                return $this->render('categoryPostItem', [
                    'model' => $post
                ]);
            }
        ]); ?>
    </div>
</div>
