<?php

namespace app\controllers;

use Yii;
use app\models\Mainpersendisplay;
use app\models\Maintipetoko;
use app\models\Mainshopinfo;
use app\models\Maindata;
use app\models\MainpersendisplaySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainpersendisplayController implements the CRUD actions for Mainpersendisplay model.
 */
class MainpersendisplayController extends Controller
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
     * Lists all Mainpersendisplay models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainpersendisplaySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mainpersendisplay model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      
      $model = Mainpersendisplay::find()->where(['questid'=>$id])->one();
     
      
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Mainpersendisplay model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $modelmain = Maindata::find()->where(['questid'=>$id])->one();
        
        $model = new Mainpersendisplay();
        $model->questid = $id;

        $model->tipetokotemp=$modelmain->tipetokoid;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      
    }

    /**
     * Updates an existing Mainpersendisplay model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $modelmain = Maindata::find()->where(['questid'=>$id])->one();
     
        $model = Mainpersendisplay::find()->where(['questid'=>$id])->one();

        $model->tipetokotemp=$modelmain->tipetokoid;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
      
    }

    /**
     * Deletes an existing Mainpersendisplay model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = Mainpersendisplay::find()->where(['questid'=>$id])->one();
      $model->delete();

        return $this->redirect(['create', 'id' => $id]);
    }

    /**
     * Finds the Mainpersendisplay model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mainpersendisplay the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mainpersendisplay::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
