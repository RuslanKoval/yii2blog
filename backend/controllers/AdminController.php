<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 03.01.16
 * Time: 15:50
 */

namespace backend\controllers;

use Yii;
use yii\web\Controller;

class AdminController extends Controller
{
    public $layout = "admin";

    public function actionIndex()
    {
        $this->layout = 'admin';

        return $this->render('index');
    }
}