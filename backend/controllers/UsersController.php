<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 06.01.16
 * Time: 18:20
 */

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class UsersController extends Controller
{
    public $layout = "admin";

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index');
    }


}