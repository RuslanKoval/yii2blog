<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 03.01.16
 * Time: 15:50
 */

namespace backend\controllers;

use common\models\Category;
use common\models\Coments;
use common\models\Post;
use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = "admin";

    public function actionIndex()
    {
        $this->layout = 'admin';

        $countPost = Post::find()->count();
        $countComments = Coments::find()->count();
        $countCategory = Category::find()->count();
        return $this->render('index', [
            'countPost' => $countPost,
            'countComments' => $countComments,
            'countCategory' => $countCategory,
        ]);
    }
}