<?php
use kartik\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username') ?>
    <?= $form->field($model, 'email')->input('email') ?>
    <?= $form->field($model, 'pass')->passwordInput() ?>

    <?= $form->field($model, 'active')->radioList(array(true=>'да', false=>'нет')); ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>