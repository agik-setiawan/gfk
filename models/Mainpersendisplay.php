<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mainpersendisplay".
 *
 * @property int $pdisplayid
 * @property int $questid
 * @property double $audiovisual
 * @property double $homeentertaint
 * @property double $sda
 * @property double $mda
 * @property double $photo
 * @property double $it
 * @property double $telecom
 * @property double $auto
 * @property double $lighting
 * @property double $other
 * @property double $itdpcppc
 * @property double $peripherals
 * @property double $accessories
 * @property double $component
 * @property double $networking
 * @property double $othersit
 */
class Mainpersendisplay extends \yii\db\ActiveRecord
{

    public $totaldisptmp;
    public $totaldispittmp;
    public $tipetokotemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mainpersendisplay';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid', 'audiovisual', 'homeentertaint', 'sda', 'mda', 'photo', 'it', 'telecom', 'auto', 'lighting', 'other', 'itdpcppc', 'peripherals', 'accessories', 'component', 'networking', 'othersit'], 'required'],
            [['questid','tipetokotemp'], 'integer'],
            [['audiovisual', 'homeentertaint', 'sda', 'mda', 'photo', 'it', 'telecom', 'auto', 'lighting', 'other', 'itdpcppc', 'peripherals', 'accessories', 'component', 'networking', 'othersit','totaldisptmp','totaldispittmp'], 'number'],
            [['totaldisptmp','totaldispittmp'], 'validatesumdisp'],

            
        ];
    }

    public function validatesumdisp($attribute, $params)
    {

        if ($this->totaldisptmp != 100 ) {
            $this->addError('totaldisptmp', 'summary of percentage total display must be 100%');
        }elseif ($this->it != 0 ) {
          if($this->totaldispittmp != 100){
          $this->addError('totaldispittmp', 'summary of percentage total display IT must be 100%');
        }
        }
    }
    // public function valcar($attribute, $params)
    // {
    //
    //     if($this->tipetokotemp == $params['tptoko'])
    //
    //     {
    //
    //       if(is_array($params['oneOf'])){
    //
    //       foreach ($params['oneOf'] as $attributes) {
    //         if($this->$attributes < $params['mv']){
    //           $modeltp = Mastertipetoko::find()->where(['tipetokoid'=>$this->tipetokotemp])->one();
    //           $messages = "Untuk tipe toko ".$modeltp->tipetoko.", minimal salah satu persentase product ini harus di atas ".$params['mv']."%";
    //           $this->addError($attributes, $messages);
    //
    //         }else
    //         {
    //           return false;
    //         }
    //       }
    //
    //     }
    //
    //
    //   }
    //
    // }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pdisplayid' => 'Pdisplayid',
            'questid' => 'Questid',
            'audiovisual' => 'Audio visual',
            'homeentertaint' => 'Home entertainment',
            'sda' => 'SDA',
            'mda' => 'MDA',
            'photo' => 'Photo',
            'it' => 'IT',
            'telecom' => 'Telecom',
            'auto' => 'Auto',
            'lighting' => 'Lighting',
            'other' => 'Other',
            'itdpcppc' => 'IT (DPC/PPC)',
            'peripherals' => 'Peripherals',
            'accessories' => 'Accessories',
            'component' => 'Component',
            'networking' => 'Networking',
            'othersit' => 'Others',
        ];
    }
}
