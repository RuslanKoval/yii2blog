<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 06.01.16
 * Time: 11:05
 */

namespace frontend\controllers;


use common\models\Category;
use common\models\Coments;
use common\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class BlogController  extends Controller
{


    public function actionIndex()
    {
        $dataCategory = new ActiveDataProvider([
            'query' => Category::find()->where(['active' => true]),
        ]);
        $dataPost = new ActiveDataProvider([
            'query' => Post::find()->where(['active' => true]),
            'sort' => [
                'defaultOrder' => ['date_added' => SORT_DESC],
            ],
            'pagination' => [
               'pageSize' => 5,
             ],
        ]);

        return $this->render('index', [
            'cat' => $dataCategory,
            'dataProvider' => $dataPost,
        ]);
    }


    public function actionCat($id)
    {
        $dataCategory = new ActiveDataProvider([
            'query' => Category::find()->where(['active' => true]),
        ]);
        $category = Category::find()
            ->where(['id' => $id])
            ->one();
        $dataPost = new ActiveDataProvider([
            'query' => $category->getPosts()->where(['active' => true]),
            'sort' => [
                'defaultOrder' => ['date_added' => SORT_DESC],
            ],
        ]);

        return $this->render('categoryPost', [
            'cat' => $dataCategory,
            'dataProvider' => $dataPost,
        ]);
    }

    public function actionPost($id)
    {
        $dataCategory = new ActiveDataProvider([
            'query' => Category::find()->where(['active' => true]),
        ]);
        $dataPost = new ActiveDataProvider([
            'query' => Post::find()
                ->where(['id' => $id,  'active' => true]),
            'sort' => [
                'defaultOrder' => ['date_added' => SORT_DESC],
            ],
        ]);

        $commentModel = new Coments();
        if (!Yii::$app->user->isGuest) {
            if ($commentModel->load(Yii::$app->request->post())) {
                $commentModel->post_id = $id;
                $commentModel->create_as = Yii::$app->user->identity->getId();
                $commentModel->save();
                return $this->redirect(['post', 'id' => $id]);
            }
        }
        return $this->render('post', [
            'cat' => $dataCategory,
            'dataProvider' => $dataPost,
            'commentModel' => $commentModel,
        ]);
    }



}