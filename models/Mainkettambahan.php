<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mainkettambahan".
 *
 * @property int $kettambahanid
 * @property int $questid
 * @property string $kettambbahan
 */
class Mainkettambahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mainkettambahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid'], 'required'],
            [['questid'], 'integer'],
            [['kettambbahan'], 'string', 'max' => 4000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kettambahanid' => 'Kettambahanid',
            'questid' => 'Questid',
            'kettambbahan' => 'Keterangan Tambahan',
        ];
    }
}
