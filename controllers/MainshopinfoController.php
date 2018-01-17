<?php

namespace app\controllers;

use Yii;
use app\models\Mainshopinfo;
use app\models\Maindata;
use app\models\Masternamagedung;
use app\models\MainshopinfoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Compimg;


/**
 * MainshopinfoController implements the CRUD actions for Mainshopinfo model.
 */
class MainshopinfoController extends Controller
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
     * Lists all Mainshopinfo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainshopinfoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mainshopinfo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
      $model = Mainshopinfo::find()->where(['questid'=>$id])->one();
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Mainshopinfo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
      $check = Mainshopinfo::find()->where(['questid'=>$id])->one();
      if ($check){
        $model = $check;
      }else{
        $model = new Mainshopinfo(['scenario' => 'create']);
        $model->questid = $id;
    }


        $modelmain = Maindata::find()->where(['questid'=>$id])->one();
        if ($model->load(Yii::$app->request->post())) {
          if($model->namagedung == "others"){
            $model->namagedung = $model->gedungothers;
          }
          $model_image = UploadedFile::getInstance($model, 'image');
          if(!empty($model_image)){
          $image_name = str_replace(' ', '', $model_image->name);
          $model->avatar = $modelmain->questid.$image_name;
        }
          $path = 'fototoko/'.$model->avatar;
          $model->photo = $model->avatar;
          $modelmain->namatoko = $model->namatoko;
          if($model->save(false)){

            $modelmain->save(false);
            if(!empty($model_image)){
               	 $model_image->saveAs(($path));
            // Image
		$src = $path;
		
		// Begin
		$img = new Compimg;
		$img->set_img($src);
		$img->set_quality(80);
		
		// Small thumbnail
		$img->set_size(200);
		$img->save_img("fototoko/small_".$model->avatar);
		
		// Finalize
		$img->clear_cache();

           }

            return $this->redirect(['view', 'id' => $id]);
          }

        } else {
            return $this->render('create', [
                'model' => $model,
                'modelmain' => $modelmain,
            ]);
        }
    }

    /**
     * Updates an existing Mainshopinfo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = Mainshopinfo::find()->where(['questid'=>$id])->one();
        $modelmain = Maindata::find()->where(['questid'=>$id])->one();
        $mnamagedung = Masternamagedung::find()->where(['namagedung'=>$model->namagedung])->one();
        if(!$mnamagedung){
          $model->gedungothers = $model->namagedung;
          $model->namagedung = "others";
        }
        if ($model->load(Yii::$app->request->post())) {
          if($model->namagedung == "others"){
            $model->namagedung = $model->gedungothers;
          }
          $model_image = UploadedFile::getInstance($model, 'image');


          if(!empty($model_image)){
          $fileexist = Yii::$app->basePath.'/uploads/'.$model->photo;
          @unlink($fileexist);
          $image_name = str_replace(' ', '', $model_image->name);
          $model->avatar = $image_name;
          $model->photo = $model->avatar;
        }
          $path = 'fototoko/'.$model->avatar;


          $modelmain->namatoko = $model->namatoko;
          if($model->save(false)){

            $modelmain->save(false);
            if(!empty($model_image)){
            $model_image->saveAs(($path));
            // Image
		$src = $path;
		
		// Begin
		$img = new Compimg;
		$img->set_img($src);
		$img->set_quality(80);
		
		// Small thumbnail
		$img->set_size(200);
		$img->save_img("fototoko/small_".$model->avatar);
		
		// Finalize
		$img->clear_cache();
             

           }

            return $this->redirect(['view', 'id' => $id]);
          }

        } else {
            return $this->render('update', [
                'model' => $model,
                'modelmain' => $modelmain,
            ]);
        }
    }

    /**
     * Deletes an existing Mainshopinfo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = Mainshopinfo::find()->where(['questid'=>$id])->one();
        $model->delete();
        $fileexist = Yii::$app->basePath.'/uploads/'.$model->photo;
        @unlink($fileexist);

        return $this->redirect(['create', 'id' => $id]);
    }

    /**
     * Finds the Mainshopinfo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mainshopinfo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mainshopinfo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
   

}
