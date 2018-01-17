<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mastertipetoko".
 *
 * @property int $tipetokoid
 * @property int $cattokoid
 * @property string $tipetoko
 */
class Mastertipetoko extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mastertipetoko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cattokoid', 'tipetoko'], 'required'],
            [['cattokoid'], 'integer'],
            [['tipetoko'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipetokoid' => 'Tipetokoid',
            'cattokoid' => 'Cattokoid',
            'tipetoko' => 'Tipetoko',
        ];
    }
}
