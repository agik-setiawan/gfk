<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Mastertipetoko;
use app\models\Maindispauto;
use yii\helpers\ArrayHelper;

class Dispcheck extends \yii\base\Model
{
    /**
     * @inheritdoc
     */
     public $tkid;
     public $questid;
     public $item;
     public $tptkrole;
     public $statusdisp;
     public $oppcond;
     public $breakmodel;
     public $flag;
     public $dispcheckresult;
     public $testtemp;
     public $modelrole;
     public $dispcat;
     public $dispcatname;
     public $dispcatarray;
     public $dispitemarray;


    // public static function tableName()
    // {
    //     return 'Mastertipetoko';
    // }
    //
    // /**
    //  * @inheritdoc
    //  */
    public function rules()
    {
        return [
          [['breakmodel','dispcheckresult','testtemp','modelrole'], 'string'],
          [['flag'], 'integer'],


        ];
    }

    /**
     * @inheritdoc
     */
     public function checkdispBytkid($tkid,$questid)
       {

         $rolemodel =  $this->getTptokoRole($tkid,$questid);
         return $this->dispcheckresult;
         return $this->dispcat;
         return $this->dispcatname;
         return $this->dispcatarray;
         return $this->dispitemarray;


       }
       public function getTptokoRole($tkid,$questid)
       {
         $model = Mastertipetoko::findOne($tkid);
         if ($model->modelitemlocheck != null) {
             return $this->validateMdispitem($model,$questid);
         } else {
             return $this->validateMdisp($model,$questid);
       }
     }

       public function validateMdispitem($model,$questid)
       {
            $modelattribute=$model->modelitemlocheck;
            
            
	         if(strchr($modelattribute,"&&")){
	
	             $modelattributeb = (explode("&&",$modelattribute));
	             $oppcond = "and";
	
	           }else if(strchr($modelattribute,"||")){
	
	              $modelattributeb = (explode("||",$modelattribute));
	              $oppcond = "or";
	
	            }else{
	              $modelattributeb = $modelattribute;
	              $oppcond = "or";
	
	            }
	          

            $this->dispitemarray = (array)$modelattributeb;
            $this->dispcat = $model->modellocheck;
            $this->dispcatname = $modelattribute;
            
            $modelname = '\\app\\models\\'.$model->modellocheck;
             if($oppcond == "and"){
           $flag=count($modelattributeb);
           foreach ((array)$modelattributeb as $key => $value) {
             $checkdata = $modelname::find()->where(['questid' => $questid])->andFilterWhere(['description'=>$value])->one();
            if($checkdata){
               $flag = $flag-1;

             }else{
               $flag=$flag;
             }
           }
           if($flag == 0){
             $this->dispcheckresult=true;
           }else{

             $this->dispcheckresult=false;
           }

         }else if($oppcond == "or" || $oppcond == "single"){

           foreach ((array)$modelattributeb as $key => $value) {
             
            $checkdataa = $modelname::find()->where(['questid' => $questid])->andFilterWhere(['description'=>$value])->one();
            
            if ($checkdataa){
             //if ($value=="Digital Still Camera – Compact"){
               $this->dispcheckresult = true;
               
              	break;
              	
             }
             
          }

       }else{
         $this->dispcheckresult=false;
       }
            
            
     }

       public function validateMdisp($model,$questid)
       {
         $modelattribute=$model->modelitemlocheck;
         $modelname = $model->modellocheck;
         if(!empty($modelname)){
         if(strchr($modelname,"&&")){

             $modelnameb = (explode("&&",$modelname));
             $oppcond = "and";

           }else if(strchr($modelname,"||")){

              $modelnameb = (explode("||",$modelname));
              $oppcond = "or";

            }else{
              $modelnameb = $modelname;
              $oppcond = "single";

            }
          }

            $this->dispcatarray = (array)$modelnameb;

         if($oppcond == "and"){
           $flag=count($modelnameb);
           foreach ((array)$modelnameb as $key => $models) {
             $modelname = '\\app\\models\\'.$models;
             $checkdata = $modelname::find()->where(['questid' => $questid])->one();
             if($checkdata){
               $flag = $flag-1;

             }else{
               $flag=$flag;
             }
           }
           if($flag == 0){
             $this->dispcheckresult=true;
           }else{

             $this->dispcheckresult=false;
           }

         }else if($oppcond == "or" || $oppcond == "single"){

           foreach ((array)$modelnameb as $key => $models) {
             $modelname = '\\app\\models\\'.$models;
             $checkdata = $modelname::find()->where(['questid' => $questid])->one();
             if ($checkdata){
               $this->dispcheckresult=true;
               break;
             }else{

               $this->dispcheckresult=false;
             }
           }


       }else{
         $this->dispcheckresult=false;
       }

       }






}
