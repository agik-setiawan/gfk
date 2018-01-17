<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masterdesa".
 *
 * @property int $desaid
 * @property int $provinceid
 * @property int $dati
 * @property int $kotamadyaid
 * @property int $kecamatanid
 * @property string $desa
 * @property int $kodepos
 */
class Masterdesa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterdesa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceid', 'dati', 'kotamadyaid', 'kecamatanid', 'desa', 'kodepos'], 'required'],
            [['provinceid', 'kotamadyaid', 'kecamatanid', 'kodepos'], 'integer'],
            [['desa', 'dati'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'desaid' => 'Desaid',
            'provinceid' => 'Province',
            'dati' => 'Dati',
            'kotamadyaid' => 'Kotamadya',
            'kecamatanid' => 'Kecamatan',
            'desa' => 'Desa',
            'kodepos' => 'Kodepos',
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
}
