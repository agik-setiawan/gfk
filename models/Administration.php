<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Administration".
 *
 * @property int $admid
 * @property int $questid
 * @property string $date
 * @property string $interviewer
 * @property string $teamleader
 * @property string $dataentry
 */
class Administration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Administration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['questid', 'date', 'interviewer', 'teamleader', 'dataentry'], 'required'],
            [['questid'], 'integer'],
            [['date'], 'safe'],
            [['interviewer', 'teamleader', 'dataentry'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admid' => 'Admid',
            'questid' => 'Questid',
            'date' => 'Date',
            'interviewer' => 'Interviewer',
            'teamleader' => 'Teamleader',
            'dataentry' => 'Dataentry',
        ];
    }
}
