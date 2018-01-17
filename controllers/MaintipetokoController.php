<?php

namespace app\controllers;

use Yii;
use app\models\Maintipetoko;
use app\models\Mastertipetoko;
use app\models\Maindata;
use app\models\Mainpersendisplay;
use app\models\Mainshopinfo;
use app\models\MaintipetokoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * MaintipetokoController implements the CRUD actions for Maintipetoko model.
 */
class MaintipetokoController extends Controller
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
     * Lists all Maintipetoko models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaintipetokoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Maintipetoko model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = Maintipetoko::find()->where(['questid'=>$id])->one();
      $mp = Mainpersendisplay::find()->where(['questid'=>$id])->one();
      $maindata = maindata::find()->where(['questid'=>$id])->one();
      $shopinfo = Mainshopinfo::find()->where(['questid'=>$id])->one();
      // $modelcheck = new Maintipetoko();
      
      $model->checktipetoko();
      //if($model->statusok){
        //$maindata->status=1;
        //$maindata->save(false);
      //}else{
      	//$maindata->status=0;
        //$maindata->save(false);
      //}
      
      // $status = $locheck->status;
      // $message = $locheck->message;
        return $this->render('view', [
            'model' => $model,
            // 'locheck' => $locheck,
            // 'message' => $message,
        ]);
    }

    /**
     * Creates a new Maintipetoko model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $check = Maintipetoko::find()->where(['questid'=>$id])->one();
        if ($check){
          $model = $check;
        }else{
        $model = new Maintipetoko();
        $model->questid = $id;
      }
        $modelmain = Maindata::find()->where(['questid'=>$id])->one();



        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelmain->tipetokoid=$model->tipetokoid;
            $modelmain->save(false);
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = Maintipetoko::find()->where(['questid'=>$id])->one();
        $modelmain = Maindata::find()->where(['questid'=>$id])->one();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $modelmain->tipetokoid=$model->tipetokoid;
            $modelmain->save(false);
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionTipetoko() {
  		$out = [];
  		if (isset($_POST['depdrop_parents'])) {
  			$parents = end($_POST['depdrop_parents']);
  			$model = Mastertipetoko::find()->asArray()->where(['cattokoid'=>$parents])->all();
  			$selected  = null;
  			if ($parents != null && count($model) > 0 ) {
  				//$client = $parents[0];
  				$selected = '';
  				//$id1=null;
  				if (!empty($_POST['depdrop_params'])) {
  					$params = $_POST['depdrop_params'];
  					$id1 = $params[0]; // get the value of model_id1
  					foreach ($model as $key => $value) {
  						$out[] = ['id'=>$value['tipetokoid'],'name'=> $value['tipetoko']];
  						if($key == 0){
  						$aux = $value['tipetokoid'];
  						}
  						($value['tipetokoid'] == $id1) ? $selected = $id1 : $selected = $aux;
  						}
  				}
  				echo Json::encode(['output'=>$out, 'selected'=>$selected]);
  				return;
  			}
  		}
  		echo Json::encode(['output'=>'', 'selected'=>'']);
  	}
    /**
     * Updates an existing Maintipetoko model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */


    /**
     * Deletes an existing Maintipetoko model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
      $model = Maintipetoko::find()->where(['questid'=>$id])->one();
      $model->delete();
      $modelmain = Maindata::find()->where(['questid'=>$id])->one();
      $modelmain->tipetokoid=0;
      $modelmain->save(false);

      return $this->redirect(['create', 'id' => $id]);
    }

    /**
     * Finds the Maintipetoko model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Maintipetoko the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Maintipetoko::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
