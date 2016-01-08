<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 04.01.16
 * Time: 14:21
 */

namespace backend\controllers;


use common\models\Coments;
use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;

use yii\web\NotFoundHttpException;



class CommentsController extends Controller
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
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Coments::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Coments();
        if ($model->load(Yii::$app->request->post())) {
            $model->create_as = Yii::$app->user->identity->getId();
            $model->post_id = $model->post_id;
            $model->save();

            $dataProvider = new ActiveDataProvider([
                'query' => Coments::find(),
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->create_as = Yii::$app->user->identity->getId();
            $model->post_id = $model->post_id;
            $model->save();
            $dataProvider = new ActiveDataProvider([
                'query' => Coments::find(),
            ]);
            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }

    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        $dataProvider = new ActiveDataProvider([
            'query' => Coments::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Coments::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}