<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispitcomp".
 *
 * @property int $itdcompid
 * @property int $questid
 * @property string $description
 * @property int $display
 */
class Maindispitcomp extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispitcomp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'display'], 'required'],
            [['questid', 'display'], 'integer'],
            [['description','desctemp'], 'string', 'max' => 200],
            [['desctemp'], 'required', 'when' => function ($model) {
                return $model->description == "Others";
            }, 'whenClient' => "function (attribute, value) {
                return $(this).val() == 'Others';
            }"],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itdcompid' => 'Itdcompid',
            'questid' => 'Questid',
            'description' => 'Description',
            'display' => 'Display',
        ];
    }
}
