<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 06.01.16
 * Time: 18:20
 */

namespace backend\controllers;

use common\models\Coments;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
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
                        'actions' => ['index','view','update','delete'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        /** @var USER $model */
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post('User');
            if(!empty($post['username'])){
                $model->username = $post['username'];
            }
            if(!empty($post['email']) && $this->findModelMail($post['email'])){
                $model->email = $post['email'];
            }
            if(!empty($post['pass'])){
                $model->setPassword($post['pass']);
            }
            if(!empty($post['active'])){
                $model->active = $post['active'];
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        Coments::deleteAll(['create_as' => $id]);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModelMail($id)
    {
        if (($model = User::find()->where(['email'=>$id])->count()) == 0) {
            return true;
        } else {
            return false;
        }
    }
}