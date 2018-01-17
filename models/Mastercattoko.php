<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mastercattoko".
 *
 * @property int $cattokoid
 * @property string $category
 */
class Mastercattoko extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mastercattoko';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category'], 'required'],
            [['category'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cattokoid' => 'Cattokoid',
            'category' => 'Category',
        ];
    }
}
