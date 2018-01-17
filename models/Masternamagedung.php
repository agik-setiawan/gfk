<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masternamagedung".
 *
 * @property int $nmgedungid
 * @property int $provinceid
 * @property string $namagedung
 */
class Masternamagedung extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masternamagedung';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceid', 'namagedung'], 'required'],
            [['provinceid'], 'integer'],
            [['namagedung'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nmgedungid' => 'Nmgedungid',
            'provinceid' => 'Provinceid',
            'namagedung' => 'Namagedung',
        ];
    }
    public function getProvince()
      {
          return $this->hasOne(Masterprovince::className(), ['provinceid' => 'provinceid']);
      }
}
