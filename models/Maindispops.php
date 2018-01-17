<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispops".
 *
 * @property int $dipsopsid
 * @property int $questid
 */
class Maindispops extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispops';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['dipsopsid', 'questid'], 'required'],
            [['dipsopsid', 'questid'], 'integer'],
            [['dipsopsid'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dipsopsid' => 'Dipsopsid',
            'questid' => 'Questid',
        ];
    }
}
