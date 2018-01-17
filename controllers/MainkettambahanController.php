<?php

namespace app\controllers;

use Yii;
use app\models\Mainkettambahan;
use app\models\MainkettambahanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainkettambahanController implements the CRUD actions for Mainkettambahan model.
 */
class MainkettambahanController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mainkettambahan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainkettambahanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mainkettambahan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = Mainkettambahan::find()->where(['questid'=>$id])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Mainkettambahan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Mainkettambahan();
        $model->questid = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mainkettambahan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Mainkettambahan::find()->where(['questid'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mainkettambahan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = Mainkettambahan::find()->where(['questid'=>$id])->one();
      $model->delete();

      return $this->redirect(['create', 'id' => $id]);
    }

    /**
     * Finds the Mainkettambahan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mainkettambahan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mainkettambahan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
