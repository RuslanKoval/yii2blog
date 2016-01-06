<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 06.01.16
 * Time: 18:20
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class UsersController extends Controller
{
    public $layout = "admin";

    public function actionIndex()
    {
        return $this->render('index');
    }


}