<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model \common\models\Post */

$this->title = 'Создать запись';
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>