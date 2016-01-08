<?php

namespace backend\controllers;

use Yii;
use common\models\Post;
use common\models\Category;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'delete', 'update', 'setactivity'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(),
            'sort' => [
                'defaultOrder' => ['date_added' => SORT_DESC],
            ]
        ]);

        $post =  Post::find()->all();


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'post' => $post,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        /** @var Post $data */
        $data = $this->findModel($id);

        $cat = $data->categories;

        $string = "";
        foreach($cat as $value) {
            $string.=  Html::a($value->name, ['category/view', 'id' => $value->id]);
            $string.='<br>';
        }
        return $this->render('view', [
            'model' => $data,
            'string' => $string,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if (\Yii::$app->user->can('createPost')) {
            $model = new Post();
            if ($model->load(Yii::$app->request->post())) {
                $model->createad_at = time();
                $model->save();

                $data = Category::find()
                    ->where(['id' => $model->categoriesId])
                    ->all();

                foreach($data as $category) {
                    $category->link('posts', $model);

                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model
                ]);
            }
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        /** @var Post $data */

        $model->categoriesId = ArrayHelper::getColumn( $model->categories, 'id');

        if ($model->load(Yii::$app->request->post())) {
            $data = Category::find()
                ->where(['id' => $model->categoriesId])
                ->all();
            $model->unlinkAll('categories', true);
            foreach($data as $category) {
                $category->link('posts', $model);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->unlinkAll('categories', true);
        $model->delete();
        return $this->redirect(['index']);
    }


    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionSetactivity($id)
    {
        $model = $this->findModel($id);
        if ($model) {
            $model->active = !$model->active;
            $model->save();
        }
        return $this->redirect('/post');
    }


    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}