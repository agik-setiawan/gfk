<?php

namespace app\controllers;

use Yii;
use app\models\Userlogin;
use app\models\UserloginSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ChangePass;

/**
 * UserloginController implements the CRUD actions for Userlogin model.
 */
class UserloginController extends Controller
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
     * Lists all Userlogin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserloginSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Userlogin model.
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
     * Creates a new Userlogin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Userlogin();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Userlogin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionChangepass($id)
    {
        
            $model = new ChangePass();
	    $userid = $this->findModel($id);
	    
        if ($model->load(Yii::$app->request->post())) {
        $userid->password_hash = Yii::$app->security->generatePasswordHash($model->password);
        if($userid->save(false)){
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->redirect(['index']);
            } 
             }else{
             return $this->render('resetPassword', [
            'model' => $model,
            'userid' => $userid,
        ]); 
     
}
        
    }

    /**
     * Deletes an existing Userlogin model.
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
     * Finds the Userlogin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Userlogin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userlogin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
