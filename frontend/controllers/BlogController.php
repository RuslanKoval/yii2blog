<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 06.01.16
 * Time: 11:05
 */

namespace frontend\controllers;


use common\models\Category;
use common\models\Post;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class BlogController  extends Controller
{


    public function actionIndex()
    {
        $dataCategory = new ActiveDataProvider([
            'query' => Category::find(),
        ]);
        $dataPost = new ActiveDataProvider([
            'query' => Post::find(),
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
            'query' => Category::find(),
        ]);
        $category = Category::find()
            ->where(['id' => $id])
            ->one();
        $dataPost = new ActiveDataProvider([
            'query' => $category->getPosts(),
        ]);


        return $this->render('categoryPost', [
            'cat' => $dataCategory,
            'dataProvider' => $dataPost,
        ]);
    }

    public function actionPost($id)
    {
        $cat = Category::find()->all();
        $data2 = ArrayHelper::toArray($cat, [
            'common\models\Category' => [
                'id',
                'name'
            ],
        ]);

        $data = Post::find()
            ->where(['id' => $id])
            ->one();
        $postComents = $data->comments;
        $comentStr = "";
        foreach($postComents as $key => $value) {
            $comentStr.= "<p>".$value->description."</p>";
            $comentStr.= "<h6> leave a comment : ".$value->create_as."</h6><hr>";
        }
        return $this->render('post', [
            'cat' => $data2,
            'post' => $data,
            'comment' => $comentStr
        ]);
    }



}