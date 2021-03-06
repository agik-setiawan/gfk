<?php

namespace app\controllers;

use Yii;
use app\models\Maindispmdasda;
use app\models\MaindispmdasdaSearch;
use app\models\Maindisp;
use app\models\Modeldisp;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * MaindispmdasdaController implements the CRUD actions for Maindispmdasda model.
 */
class MaindispmdasdaController extends Controller
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
     * Lists all Maindispmdasda models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaindispmdasdaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maindispmdasda model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = Maindispmdasda::find()->where(['questid'=>$id])->all();
      return $this->render('view', [
          'model' => $model,
          'id' => $id,
      ]);
    }

    /**
     * Creates a new Maindispmdasda model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
      $modeltemp = new Maindisp();
      $model = [new Maindispmdasda()];

      if ($modeltemp->load(Yii::$app->request->post())) {
        $model = Modeldisp::createMultiple(Maindispmdasda::classname());
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
              'model' => (empty($model)) ? [new Maindispmdasda()] : $model,
              'modeltemp' => $modeltemp,
          ]);
    }

    /**
     * Updates an existing Maindispmdasda model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
      $modeltemp = new Maindisp();
      $modeltemp->maindisp = $id;
      $oldIDs = Maindispmdasda::find()->select('mdasdaid')->where(['questid' => $id])->asArray()->all();
      $oldIDs = ArrayHelper::getColumn($oldIDs, 'mdasdaid');
      $models = Maindispmdasda::findAll(['mdasdaid' => $oldIDs]);
      // $model = [new Maindispmdasda()];
      $model = (empty($models)) ? [new Maindispmdasda] : $models;
      if ($modeltemp->load(Yii::$app->request->post())) {


        $model = Modeldisp::createMultiple(Maindispmdasda::classname());
        Modeldisp::loadMultiple($model, Yii::$app->request->post());
        $newaudIds =ArrayHelper::getColumn($model,'mdasdaid');
        // delete removed data

        $delaudIds = array_diff($oldIDs,$newaudIds);
        if (! empty($delaudIds)) Maindispmdasda::deleteAll(['mdasdaid' => $delaudIds]);

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
              'model' => (empty($model)) ? [new Maindispmdasda()] : $model,
              'modeltemp' => $modeltemp,
          ]);

    }

    /**
     * Deletes an existing Maindispmdasda model.
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
     * Finds the Maindispmdasda model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maindispmdasda the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maindispmdasda::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
