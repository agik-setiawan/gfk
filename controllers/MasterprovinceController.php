<?php

namespace app\controllers;

use Yii;
use app\models\Masterprovince;
use app\models\MasterprovinceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * MasterprovinceController implements the CRUD actions for Masterprovince model.
 */
class MasterprovinceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete'],
          'rules' => [
            
            [
                'actions' => ['index','view','create'],
                'allow' => true,
                'roles' => ['@'],
                'matchCallback'=>function(){
                  return (
                  Yii::$app->user->identity->groupuser==1 || Yii::$app->user->identity->groupuser==2
                );
              }
            ],
            [
                'actions' => ['delete','update'],
                'allow' => true,
                'roles' => ['@'],
                'matchCallback'=>function(){
                  return (
                  Yii::$app->user->identity->groupuser==1
                );
              }
            ],
        ],
            ],
        ];
    }

    /**
     * Lists all Masterprovince models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterprovinceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterprovince model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Masterprovince model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterprovince();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Masterprovince model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->provinceid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Masterprovince model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Masterprovince model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masterprovince the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterprovince::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
