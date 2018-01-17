<?php

namespace app\controllers;

use Yii;
use app\models\Maindata;
use app\models\MaindataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Mainshopinfo;
use app\models\Mainpersendisplay;
use app\models\Maintipetoko;
use app\models\Mainkettambahan;
use app\models\Maindispaudio;
use app\models\Maindisplighting;
use app\models\Maindispmdasda;
use app\models\Maindispsda;
use app\models\Maindispauto;
use app\models\Maindispphoto;
use app\models\Maindispitdpcnperip;
use app\models\Maindispitcomp;
use app\models\Maindispitnet;
use app\models\Maindispitaccntel;
use app\models\Maindispittel;
use app\models\Maindisphomeent;
use app\models\Maindispothers;

/**
 * MaindataController implements the CRUD actions for Maindata model.
 */
class MaindataController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','createmain','update','delete'],
          'rules' => [
            [
                'actions' => ['index','view'],
                'allow' => true,
                'roles' => ['@'],

            ],
            [
                'actions' => ['createmain','update'],
                'allow' => true,
                'roles' => ['@'],
                'matchCallback'=>function(){
                  return (
                  Yii::$app->user->identity->groupuser==1 || Yii::$app->user->identity->groupuser==3 
                );
              }
            ],
            [
                'actions' => ['delete'],
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
     * Lists all Maindata models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaindataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$update = new Maindata();
        //$update->Updatestatus();
	
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maindata model.
     * @param integer $id
     * @return mixed
     */
     
    public function actionView($id)
    {
      $tipetoko = Maintipetoko::find()->where(['questid'=>$id])->one();
      $maindata = maindata::find()->where(['questid'=>$id])->one();
      $shopinfo = Mainshopinfo::find()->where(['questid'=>$id])->one();
      // $modelcheck = new Maintipetoko();
      if($tipetoko){
      $tipetoko->checktipetoko();
      
      if($tipetoko->statusok=1 && $shopinfo){
        $maindata->status=1;
        $maindata->save(false);
      }else{
      $maindata->status=0;
        $maindata->save(false);
      }
      }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Maindata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreatemain()
    {
        $model = new Maindata();
        $model->scenario = 'original';
        $model->createdby = Yii::$app->user->identity->id;
    		$model->createdon = date('Y-m-d H:i:s');
    		$model->lastmodifiedby = Yii::$app->user->identity->id;
    		$model->lastmodifiedon = date('Y-m-d H:i:s');
    		$model->status = 0;

        if ($model->load(Yii::$app->request->post())) {
          $model->date = $model->datetemp != ''?date('Y-m-d', strtotime(str_replace('/', '-', $model->datetemp))):'';
          $model->save(false);
            return $this->redirect(['view', 'id' => $model->questid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Maindata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'original';
        $model->datetemp = $model->date != null ? date('d/m/Y', strtotime($model->date)):'';
        if ($model->load(Yii::$app->request->post())) {
          $model->date = $model->datetemp != ''?date('Y-m-d', strtotime(str_replace('/', '-', $model->datetemp))):'';
          $model->lastmodifiedby = Yii::$app->user->identity->id;
    	$model->lastmodifiedon = date('Y-m-d H:i:s');
          $model->save();
            return $this->redirect(['view', 'id' => $model->questid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Maindata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        	$shopinfo = Mainshopinfo::deleteAll(['questid'=>$id]);
                  $persendisplay = Mainpersendisplay::deleteAll(['questid'=>$id]);
                  $tipetoko = Maintipetoko::deleteAll(['questid'=>$id]);
                  $keterangan = Mainkettambahan::deleteAll(['questid'=>$id]);
                  $dispaud = Maindispaudio::deleteAll(['questid'=>$id]);
                  $displight = Maindisplighting::deleteAll(['questid'=>$id]);
                  $dispmdasda = Maindispmdasda::deleteAll(['questid'=>$id]);
                  $dispsda = Maindispsda::deleteAll(['questid'=>$id]);
                  $dispauto = Maindispauto::deleteAll(['questid'=>$id]);
                  $dispphoto = Maindispphoto::deleteAll(['questid'=>$id]);
                  $dispitdpcperip = Maindispitdpcnperip::deleteAll(['questid'=>$id]);
                  $dispitcomp = Maindispitcomp::deleteAll(['questid'=>$id]);
                  $dispitnet = Maindispitnet::deleteAll(['questid'=>$id]);
                  $dispitaccntel = Maindispitaccntel::deleteAll(['questid'=>$id]);
                  $dispittel = Maindispittel::deleteAll(['questid'=>$id]);
                  $disphomeent = Maindisphomeent::deleteAll(['questid'=>$id]);
                  $dispothers = Maindispothers::deleteAll(['questid'=>$id]);
        $this->findModel($id)->delete();
	
	
        return $this->redirect(['index']);
    }

    /**
     * Finds the Maindata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maindata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maindata::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
