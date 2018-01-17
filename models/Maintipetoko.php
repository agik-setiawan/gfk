<?php

namespace app\models;


use Yii;
use app\models\Dispcheck;

/**
 * This is the model class for table "maintipetoko".
 *
 * @property int $mtipetokoid
 * @property int $questid
 * @property int $cattokoid
 * @property int $tipetokoid
 */
class Maintipetoko extends \yii\db\ActiveRecord
{
  public $statusok;
  public $message;
  public $statusdispbarang;
  public $mandatoryname;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maintipetoko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid', 'cattokoid', 'tipetokoid'], 'required'],
            [['questid', 'cattokoid', 'tipetokoid','statusok'], 'integer'],
            [['mandatoryname'], 'string'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mtipetokoid' => 'Mtipetokoid',
            'questid' => 'Questid',
            'cattokoid' => 'Category Toko',
            'tipetokoid' => 'Tipe Toko',
            'tipetoko.tipetoko' => 'Tipe Toko',
        ];
    }
    public function getCattoko()
      {
          return $this->hasOne(Mastercattoko::className(), ['cattokoid' => 'cattokoid']);
      }
    public function getTipetoko()
      {
          return $this->hasOne(Mastertipetoko::className(), ['tipetokoid' => 'tipetokoid']);
      }
      public function menuCategory($modelname){
        $logicdisplay = new Dispcheck();
        $logicdisplay->checkdispBytkid($this->tipetokoid, $this->questid);
        $datanormal = $logicdisplay->dispcat;
        $datanormalatt = $logicdisplay->dispcatname;
        $dataarray = $logicdisplay->dispcatarray;
        $mandatoryname = " ";
        if ($datanormal == $modelname){
          // return $this->mandatoryname = "(".$datanormalatt." - Mandatory)";
          
          $mandatorynamep = str_replace("||"," / ",$datanormalatt);
          //$mandatorynamep = (explode("||",$datanormalatt));
        $mandatoryname = "(".$mandatorynamep." - Mandatory)";	
        }else{
        foreach ((array)$dataarray as $value) {
          if($modelname == $value){
            // return $this->mandatoryname ="(Mandatory)";
            $mandatoryname ="(Mandatory)";
            break;
          }else{
            $mandatoryname =" ";
          }
        }
        }
        return $this->mandatoryname=$mandatoryname;
      }
      
      public function checktipetoko(){
        $checkpdisp = Mainpersendisplay::find()->where(['questid'=>$this->questid])->one();
      if($checkpdisp){
        $logicdisplay = new Dispcheck();
        $logicdisplay->checkdispBytkid($this->tipetokoid, $this->questid);
        $statusdispbarang = $logicdisplay->dispcheckresult;
        $this->statusdispbarang = $statusdispbarang;
        return $this->locheck($this->questid,$this->statusdispbarang);
      }else{

        return $this->message = "percentage data display not yet completed";
      }
      }
      public function locheck($id,$statusdispb)
        {
          $model = Maintipetoko::find()->where(['questid'=>$id])->one();
          $mp = Mainpersendisplay::find()->where(['questid'=>$id])->one();

            switch ($model->tipetokoid)
                {
                    case 1:
                        if($mp->audiovisual < 75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   Audio Visual  product in Product Display and Audio Visual percentage => 75%";


                        }else{
                            $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 2:
                        if((($mp->audiovisual + $mp->sda + $mp->mda) < 75) || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Audio Visual / MDA / SDA product in Product Display and  Audio Visual / MDA / SDA product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 3:
                        if($mp->mda < 75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one    MDA product in Product Display and MDA product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 4:
                        if((($mp->audiovisual + $mp->photo) < 70)  || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   Audio Visual and Photo product in Product Display and Audio Visual /Photo product  percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 5:
                        if($mp->sda<75  || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  SDA product in Product Display and SDA product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 6:
                    //harusnya air
                        if($mp->sda<75  || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   AIR product in Product Display and AIR product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 7:
                        if((($mp->lighting + $mp->sda) <75) || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Lighting  product in Product Display and Lighting + SDA product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 8:
                        if($mp->sda<10 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  SDA  product in Product Display and SDA product percentage => 10%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 9:
                        if($mp->lighting<60 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  lighting  product in Product Display and lighting product percentage => 60%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 10:
                        if($mp->auto<70 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Auto  product in Product Display and Auto product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 11:
                        if($mp->auto<70 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Car tyre  product in Product Display and Auto product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 12:
                        if($mp->auto<70 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Engine Oil - Car  product in Product Display and Auto product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 13:
                        if($mp->telecom<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  Mobile/SmartPhone (new) product  product in Product Display and Telecom product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 14:
                        if($mp->telecom<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one Mobile/SmartPhone (2nd hand) product  product in Product Display and Telecom product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;

                    case 15:
                    //only productdisp
                        if(!$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one teleom product  product in Product Display";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 16:
                        if($mp->telecom<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one Mobile/SmartPhone (new) product  product in Product Display and Telecom product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 17:

                        if(!$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one USB Modem (Mobile broadband) product in product display";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 18:
                        if($mp->it<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one IT product (DPC/PPC)  and IT Accessories  product in Product Display and IT product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 19:
                        if($mp->it<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one Assembled PC product in Product Display and IT product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 20:
                        if($mp->it<50 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one Branded PC product in Product Display and IT product percentage => 50%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 21:
                        if($mp->it<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  PPC  product in Product Display and IT product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 22:
                        if($mp->it<75 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one  IT Accessories product in Product Display and IT product percentage => 75%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 23:
                        if($mp->it<60 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   PRT / MFD  product in Product Display and IT product percentage => 60%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 26:
                        if($mp->photo<70 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   Photo  product in Product Display and Photo product percentage => 70%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;
                    case 27:
                        if($mp->photo<10 || !$statusdispb){
                          $this->statusok=false;
                          $this->message = "At least one   DSC  product in Product Display and Photo product percentage => 10%";


                        }else{
                          $this->statusok=true;
                            $this->message = "";


                        }
                        break;


                    default:
                      $this->statusok=true;
                      $this->message = "";


                    break;
                }

              }

}
