<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masterkotamadya".
 *
 * @property int $kotamadyaid
 * @property int $provinceid
 * @property int $dati
 * @property string $kotamadya
 */
class Masterkotamadya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterkotamadya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceid', 'dati', 'kotamadya'], 'required'],
            [['provinceid'], 'integer'],
            [['kotamadya','dati'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kotamadyaid' => 'Kotamadyaid',
            'provinceid' => 'Province',
            'dati' => 'Dati',
            'kotamadya' => 'Kotamadya',
        ];
    }
    public function getProvince()
      {
          return $this->hasOne(Masterprovince::className(), ['provinceid' => 'provinceid']);
      }

}
