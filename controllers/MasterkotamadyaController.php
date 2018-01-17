<?php

namespace app\controllers;

use Yii;
use app\models\Masterkotamadya;
use app\models\Masterdati;
use app\models\Masterprovince;
use app\models\MasterkotamadyaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\filters\AccessControl;
/**
 * MasterkotamadyaController implements the CRUD actions for Masterkotamadya model.
 */
class MasterkotamadyaController extends Controller
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
     * Lists all Masterkotamadya models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MasterkotamadyaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Masterkotamadya model.
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
     * Creates a new Masterkotamadya model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Masterkotamadya();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionDati() {
  		$out = [];
  		if (isset($_POST['depdrop_parents'])) {
  			$parents = end($_POST['depdrop_parents']);
  			$model = Masterdati::find()->asArray()->where(['provinceid'=>$parents])->all();
  			$selected  = null;
  			if ($parents != null && count($model) > 0 ) {
  				//$client = $parents[0];
  				$selected = '';
  				//$id1=null;
  				if (!empty($_POST['depdrop_params'])) {
  					$params = $_POST['depdrop_params'];
  					$id1 = $params[0]; // get the value of model_id1
  					foreach ($model as $key => $value) {
  						$out[] = ['id'=>$value['datiid'],'name'=> $value['dati']];
  						if($key == 0){
  						$aux = $value['datiid'];
  						}
  						($value['datiid'] == $id1) ? $selected = $id1 : $selected = $aux;
  						}
  				}
  				echo Json::encode(['output'=>$out, 'selected'=>$selected]);
  				return;
  			}
  		}
  		echo Json::encode(['output'=>'', 'selected'=>'']);
  	}
    /**
     * Updates an existing Masterkotamadya model.
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
     * Deletes an existing Masterkotamadya model.
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
     * Finds the Masterkotamadya model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Masterkotamadya the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Masterkotamadya::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
