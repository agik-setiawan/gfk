<?php

namespace app\controllers;

use Yii;
use app\models\Masterkecamatan;
use app\models\Masterdati;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\MasterkecamatanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;

/**
 * MasterkecamatanController implements the CRUD actions for Masterkecamatan model.
 */
class MasterkecamatanController extends Controller
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
     * Lists all Masterkecamatan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterkecamatanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterkecamatan model.
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
     * Creates a new Masterkecamatan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterkecamatan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionKotamadya() {
  		$out = [];
  		if (isset($_POST['depdrop_parents'])) {
  			$parents = $_POST['depdrop_parents'];
		        $provinceid = empty($parents[0]) ? null : $parents[0];
		        $dati = empty($parents[1]) ? null : $parents[1];	
  			$model = Masterkotamadya::find()->asArray()->where(['provinceid'=>$provinceid])->andWhere(['dati'=>$dati])->all();
  			$selected  = null;
  			if ($parents != null && count($model) > 0 ) {
  				
  				$selected = '';
  				if (!empty($_POST['depdrop_params'])) {
  					$params = $_POST['depdrop_params'];
  					$id1 = $params[0]; // get the value of dati
  					$id2 = $params[1]; // get the value of kotmad
  					
  					
  					foreach ($model as $key => $value) {
  						$out[] = ['id'=>$value['kotamadyaid'],'name'=> $value['kotamadya']];
  						if($key == 0){
  						$aux = $value['kotamadyaid'];
  						}
  						($value['dati'] == $id1 ) ? $selected = $id2 : $selected = $aux;
  						}
  				}
  				echo Json::encode(['output'=>$out, 'selected'=>$selected]);
  				return;
  			}
  			
  			}
  		
  		echo Json::encode(['output'=>'', 'selected'=>'']);
  	}
  	
    /**
     * Updates an existing Masterkecamatan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Masterkecamatan model.
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
     * Finds the Masterkecamatan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masterkecamatan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterkecamatan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
