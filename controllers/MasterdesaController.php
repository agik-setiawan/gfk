<?php

namespace app\controllers;

use Yii;
use app\models\Masterdesa;
use app\models\Masterkecamatan;
use app\models\Masterkotamadya;
use app\models\MasterdesaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;
/**
 * MasterdesaController implements the CRUD actions for Masterdesa model.
 */
class MasterdesaController extends Controller
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
     * Lists all Masterdesa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterdesaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterdesa model.
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
     * Creates a new Masterdesa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterdesa();

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
    public function actionKecamatan() {
  		$out = [];
  		if (isset($_POST['depdrop_parents'])) {
  			$parents = $_POST['depdrop_parents'];
		        $dati = empty($parents[0]) ? null : $parents[0];
        		$kotmadid = empty($parents[1])? null : $parents[1];
        		
  			$model = Masterkecamatan::find()->asArray()->where(['dati'=>$dati])->andWhere(['kotamadyaid'=>$kotmadid])->all();
  			$selected  = null;
  			if ($parents != null && count($model) > 0 ) {
  				//$client = $parents[0];
  				$selected ='';
  				if (!empty($_POST['depdrop_params'])) {
  					$params = $_POST['depdrop_params'];
  					
  					$id1 = $params[0]; // get the value of kotmad
  					$id2 = $params[1]; // get the value of kec
  					
  					foreach ($model as $key => $value) {
  						$out[] = ['id'=>$value['kecamatanid'],'name'=> $value['kecamatan']];
  						if($key == 0){
  						$aux = $value['kecamatanid'];
  						}
  						($value['kotamadyaid'] == $id1 ) ? $selected = $id2 : $selected = $aux;
  						}
  				}
  				
  				
  				echo Json::encode(['output'=>$out, 'selected'=>$selected]);
  				return;
  			}
  			
  			}
  		
  		echo Json::encode(['output'=>'', 'selected'=>'']);
  	}
    public function actionDesa() {
  		$out = [];
      // $resout = [];
  		if (isset($_POST['depdrop_parents'])) {
  			$parents = $_POST['depdrop_parents'];
  			
        		$kotmadid = empty($parents[0])? null : $parents[0];
  			$kecid = empty($parents[1]) ? null : $parents[1];
  			$model = Masterdesa::find()->asArray()->where(['kotamadyaid'=>$kotmadid])->andWhere(['kecamatanid'=>$kecid])->all();
                        $additem[] = ['id'=> 1, 'name'=>'Others'];
  			$selected  = null;
  			if ($parents != null && count($model) > 0 ) {
  				$selected = null;
				
  				if (!empty($_POST['depdrop_params'])) {
  					$params = $_POST['depdrop_params'];
  					
  					$id1 = $params[0]; // get the value of kec
  					$id2 = $params[1]; // get the value of desa
  					
  					foreach ($model as $key => $value) {
  						
  						$out[] = ['id'=>$value['desaid'],'name'=> $value['desa']];
             					 $resout = array_merge($out, $additem);
  						if($key == 0){
  						$aux = $value['desaid'];
  						
  						}
  						  ($value['kecamatanid'] == $id1) ? $selected = $id2 : $selected = $aux;
  						}
					}
					echo Json::encode(['output'=>$resout, 'selected'=>$selected]);
  					return;

  				
  			}
  			
  			}

  		
  		echo Json::encode(['output'=>'', 'selected'=>'']);
  	}
    public function actionKodepos($id) {
      if($id){
         $kodepos = Masterdesa::find()
                 ->where(['desaid' => $id])
                 ->one();
         $array = [
             'kodepos' => $kodepos->kodepos,

         ];
         echo json::encode($array);
         return;
      }
     }
    /**
     * Updates an existing Masterdesa model.
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
     * Deletes an existing Masterdesa model.
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
     * Finds the Masterdesa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masterdesa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterdesa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
