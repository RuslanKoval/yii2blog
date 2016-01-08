<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $cat yii\data\ActiveDataProvider */
?>


<div class="row">
    <div class="col-sm-3">
        <h2>Категории</h2>
        <?=

        ListView::widget([
            'dataProvider' => $cat,
            'itemView' => function($category) {
                return $this->render('categoryItem', [
                    'model' => $category,
                ]);
            }
        ]); ?>
    </div>
    <div class="col-sm-9">
        <div class="row">

            <div class="col-sm-12">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => function($post) {
                        return $this->render('commentsItem', [
                            'model' => $post,
                            'comments' => $post->allComments()
                        ]);
                    }
                ]); ?>
            </div>
        </div>

        <?php
        if (!Yii::$app->user->isGuest) {
            ?>
            <div class="row">

                <div class="col-md-12 post-form">
                    <?php $form = ActiveForm::begin(); ?>
                    <?= $form->field($commentModel, 'description')->widget(CKEditor::className(), [
                        'options' => ['rows' => 4],
                        'preset' => 'basic'
                    ]) ?>
                    <div class="form-group">
                        <?= Html::submitButton($commentModel->isNewRecord ? 'Добавить' : 'Update', ['class' => $commentModel->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>

            <?php
        }else{ ?>
            <div class="row">
                <div class="col-md-12">
                    <p>Что-бы оставить коментарий нужно <?= Html::a('зарегистрироваться', ['site/login']);?>!</p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
