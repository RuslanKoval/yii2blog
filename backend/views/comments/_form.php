<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <?php
        $list = common\models\Post::find()->all();
        $result = ArrayHelper::map($list, 'id', 'title');

    ?>
    <?=
    $form->field($model, 'post_id')->widget(Select2::classname(), [
        'data' => $result,
        'options' => ['placeholder' => 'Select a post ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'multiple' => false
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>