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
//            'id',
            'title',
//            'discription:ntext',
//            'createad_at',
            [
                'label' => 'Категории',
                'format' => 'raw',
                'value' => function(\common\models\Post $model){

                    $result = '' ;
                    foreach($model->categories  as $category ){
                            $result.=  Html::a($category->name, ['category/view', 'id' => $category->id]);
                            $result.='<br>';
                    }
                    return $result;
                }
            ],
            ['class' => 'yii\grid\ActionColumn','header'=>'Действие'],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
    ]); ?>


<!-- --><?php
//  echo Accordion::widget([
//
//
//      'items' => [
//          [
//              'header' => 'Section 1',
//             'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
//         ],
//          [
//              'header' => 'Section 2',
//              'headerOptions' => ['tag' => 'h3'],
//              'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
//              'options' => ['tag' => 'div'],
//          ],
//      ],
//
//
//
//
//      'options' => ['tag' => 'div'],
//      'itemOptions' => ['tag' => 'div'],
//      'headerOptions' => ['tag' => 'h3'],
//      'clientOptions' => ['collapsible' => false],
//  ]);
//?>
<!---->
<!--   --><?php
//
//  echo Tabs::widget([
//      'items' => [
//          [
//              'label' => 'Tab one',
//              'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
//          ],
//          [
//              'label' => 'Tab two',
//              'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
//              'options' => ['tag' => 'div'],
//              'headerOptions' => ['class' => 'my-class'],
//          ],
//          [
//              'label' => 'Tab with custom id',
//              'content' => 'Morbi tincidunt, dui sit amet facilisis feugiat...',
//              'options' => ['id' => 'my-tab'],
//          ],
//      ],
//      'options' => ['tag' => 'div'],
//      'itemOptions' => ['tag' => 'div'],
//      'headerOptions' => ['class' => 'my-class'],
//      'clientOptions' => ['collapsible' => false],
//  ]);
//?>


</div>