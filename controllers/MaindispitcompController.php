<?php

namespace app\controllers;

use Yii;
use app\models\Maindispitcomp;
use app\models\MaindispitcompSearch;
use app\models\Maindisp;
use app\models\Modeldisp;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * MaindispitcompController implements the CRUD actions for Maindispitcomp model.
 */
class MaindispitcompController extends Controller
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
     * Lists all Maindispitcomp models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaindispitcompSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maindispitcomp model.
     * @param integer $id
     * @return mixed
     */
     public function actionView($id)
     {
         $model = Maindispitcomp::find()->where(['questid'=>$id])->all();
         return $this->render('view', [
             'model' => $model,
             'id' => $id,
         ]);
     }

     /**
      * Creates a new Maindispitcomp model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionCreate($id)
     {
         $modeltemp = new Maindisp();
         $model = [new Maindispitcomp()];

         if ($modeltemp->load(Yii::$app->request->post())) {
           $model = Modeldisp::createMultiple(Maindispitcomp::classname());
           Modeldisp::loadMultiple($model, Yii::$app->request->post());
           if (Yii::$app->request->isAjax) {
             Yii::$app->response->format = Response::FORMAT_JSON;
             return ArrayHelper::merge(
             ActiveForm::validateMultiple($model)
           );
           }
           $valid = Modeldisp::validateMultiple($model);
           if ($valid) {
             $transaction = \Yii::$app->db->beginTransaction();
             try {

                 foreach ($model as $models) {
                   $models->questid = $id;
                   if($models->description=="Others"){
                     $models->description = $models->description." : ".$models->desctemp;
                   }
                   if (! ($flag = $models->save(false))) {
                     $transaction->rollBack();
                     break;
                   }
                 }

               if ($flag) {
                 $transaction->commit();
                 return $this->redirect(['view', 'id' => $id]);
               }
             } catch (Exception $e) {
               $transaction->rollBack();
             }
           }
         }
             return $this->render('create', [
                 'model' => (empty($model)) ? [new Maindispitcomp()] : $model,
                 'modeltemp' => $modeltemp,
             ]);

     }

     /**
      * Updates an existing Maindispitcomp model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      */
     public function actionUpdate($id)
     {
       $modeltemp = new Maindisp();
       $modeltemp->maindisp = $id;
       $oldIDs = Maindispitcomp::find()->select('itdcompid')->where(['questid' => $id])->asArray()->all();
       $oldIDs = ArrayHelper::getColumn($oldIDs, 'itdcompid');
       $models = Maindispitcomp::findAll(['itdcompid' => $oldIDs]);
       // $model = [new Maindispitcomp()];
       $model = (empty($models)) ? [new Maindispitcomp] : $models;
       if ($modeltemp->load(Yii::$app->request->post())) {


         $model = Modeldisp::createMultiple(Maindispitcomp::classname());
         Modeldisp::loadMultiple($model, Yii::$app->request->post());
         $newaudIds =ArrayHelper::getColumn($model,'itdcompid');
         // delete removed data

         $delaudIds = array_diff($oldIDs,$newaudIds);
         if (! empty($delaudIds)) Maindispitcomp::deleteAll(['itdcompid' => $delaudIds]);

         if (Yii::$app->request->isAjax) {
           Yii::$app->response->format = Response::FORMAT_JSON;
           return ArrayHelper::merge(
           ActiveForm::validateMultiple($model)
         );
         }
         $valid = Modeldisp::validateMultiple($model);
         if ($valid) {
           $transaction = \Yii::$app->db->beginTransaction();
           try {

               foreach ($model as $models) {
                 $models->questid = $id;
                 if($models->description=="Others"){
                   $models->description = $models->description." : ".$models->desctemp;
                 }
                 if (! ($flag = $models->save(false))) {
                   $transaction->rollBack();
                   break;
                 }
               }

             if ($flag) {
               $transaction->commit();
               return $this->redirect(['view', 'id' => $id]);
             }
           } catch (Exception $e) {
             $transaction->rollBack();
           }
         }
       }
           return $this->render('update', [
               'model' => (empty($model)) ? [new Maindispitcomp()] : $model,
               'modeltemp' => $modeltemp,
           ]);

     }

    /**
     * Deletes an existing Maindispitcomp model.
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
     * Finds the Maindispitcomp model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maindispitcomp the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maindispitcomp::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
