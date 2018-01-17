<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masterkecamatan".
 *
 * @property int $kecamatanid
 * @property int $provinceid
 * @property int $dati
 * @property int $kotamadyaid
 * @property string $kecamatan
 */
class Masterkecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterkecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceid', 'dati', 'kotamadyaid', 'kecamatan'], 'required'],
            [['provinceid', 'kotamadyaid'], 'integer'],
            [['kecamatan','dati'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kecamatanid' => 'Kecamatanid',
            'provinceid' => 'Province',
            'dati' => 'Dati',
            'kotamadyaid' => 'Kotamadya',
            'kecamatan' => 'Kecamatan',
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
}
