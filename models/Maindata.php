<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindata".
 *
 * @property int $questid
 * @property string $quescode
 * @property string $nopeta
 * @property string $date
 * @property string $interviewer
 * @property string $teamleader
 * @property string $dataentry
 * @property int $provinceid
 * @property int $dati
 * @property int $kotamadyaid
 * @property int $kecamatanid
 * @property int $desaid
 * @property int $kodepos
 * @property int $createdby
 * @property string $createdon
 * @property int $lastmodifiedby
 * @property string $lastmodifiedon
 * @property int $status
 * @property string $kettambahan
 */
class Maindata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
     public $datetemp;
     public $statusdata;
     public $tipetokorole;
     public $tipetoko;
     public $statusrole;
     public $tipetokoval;
    public static function tableName()
    {
        return 'maindata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quescode', 'interviewer', 'teamleader', 'dataentry', 'provinceid', 'dati', 'kotamadyaid', 'kecamatanid', 'desaid', 'kodepos', 'createdby', 'createdon', 'lastmodifiedby', 'lastmodifiedon','datetemp'], 'required','on'=>'original'],
            [['date', 'createdon', 'lastmodifiedon'], 'safe'],
            [['provinceid', 'kotamadyaid', 'kecamatanid', 'desaid', 'kodepos', 'createdby', 'lastmodifiedby', 'status','tipetokoid','statusrole'], 'integer'],
            [['quescode', 'nopeta'], 'string', 'max' => 50],
            [['namatoko'], 'string', 'max' => 500],
            [['interviewer', 'teamleader', 'dataentry', 'dati'], 'string', 'max' => 200],
            [['kettambahan'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'questid' => 'Questid',
            'quescode' => 'Questionnaire code',
            'nopeta' => 'No peta',
            'date' => 'Date',
            'datetemp' => 'Date',
            'interviewer' => 'Interviewer',
            'teamleader' => 'Teamleader',
            'dataentry' => 'Data entry',
            'provinceid' => 'Province',
            'dati' => 'Dati',
            'kotamadyaid' => 'Kotamadya',
            'kecamatanid' => 'Kecamatan',
            'desaid' => 'Desa/Kelurahan',
            'kodepos' => 'Kode pos',
            'createdby' => 'Createdby',
            'createdon' => 'Createdon',
            'lastmodifiedby' => 'Lastmodifiedby',
            'lastmodifiedon' => 'Lastmodifiedon',
            'status' => 'Status',
            'kettambahan' => 'Kettambahan',
            'Usercreate' => 'Created By',
            'Usermodif' => 'Last Modified By',
            'namatoko' => 'Nama Toko',
        ];
    }
    public function getProvince()
      {
          return $this->hasOne(Masterprovince::className(), ['provinceid' => 'provinceid']);
      }

    public function getKotamadya()
      {
          return $this->hasOne(Masterkotamadya::className(), ['kotamadyaid' => 'kotamadyaid']);
      }
    public function getKecamatan()
      {
          return $this->hasOne(Masterkecamatan::className(), ['kecamatanid' => 'kecamatanid']);
      }
    public function getDesa()
      {
          return $this->hasOne(Masterdesa::className(), ['desaid' => 'desaid']);
      }
    public function getUsercreate()
      {
          return $this->hasOne(User::className(), ['id' => 'createdby']);
      }
    public function getUsermodif()
      {
          return $this->hasOne(User::className(), ['id' => 'lastmodifiedby']);
      }
      public function getShopinfo()
        {
            return $this->hasOne(Mainshopinfo::className(), ['questid' => 'questid']);
        }
      public function getMaintoko()
        {
            return $this->hasOne(Mastertipetoko::className(), ['tipetokoid' => 'tipetokoid']);
        }
        public function getStatus()
          {
            return $this->statusrole;
          }
      public function getStatusresult($id)
        {
          $shopinfo = Mainshopinfo::find()->where(['questid'=>$id])->one();

          $persendisplay = Mainpersendisplay::find()->where(['questid'=>$id])->one();
          $tipetoko = Maintipetoko::find()->where(['questid'=>$id])->one();
          if($tipetoko){
          $tipetoko->checktipetoko();
          $tokorole = $tipetoko->statusok;
          if ($shopinfo && $persendisplay && $tokorole){
            $statusrole=1;
          }else{
            $statusrole=0;
          }
          }else{
          $statusrole = null;
          }
          $this->statusrole=$statusrole;
        }
    public function Updatestatus()
    {
    $maindata = maindata::find()->all();
    foreach($maindata as $data){
    $tipetoko = Maintipetoko::find()->where(['questid'=>$data->questid])->one();
    $maindatasave = maindata::find()->where(['questid'=>$data->questid])->one();
     $shopinfo = Mainshopinfo::find()->where(['questid'=>$data->questid])->one();
      // $modelcheck = new Maintipetoko();
      if($tipetoko){
      $tipetoko->checktipetoko();
      
      if($tipetoko->statusok && $shopinfo){
        $maindatasave->status=1;
        $maindatasave->save(false);
      }else{
      $maindatasave->status=0;
        $maindatasave->save(false);
      }
      }
    }
    }

}
