<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "masterprovince".
 *
 * @property int $provinceid
 * @property string $province
 */
class Masterprovince extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'masterprovince';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['province'], 'required'],
            [['province'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'provinceid' => 'Provinceid',
            'province' => 'Province',
        ];
    }
}
