<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispothers".
 *
 * @property int $othersid
 * @property int $questid
 * @property string $description
 * @property int $display
 */
class Maindispothers extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispothers';
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
            'othersid' => 'Othersid',
            'questid' => 'Questid',
            'description' => 'Description',
            'display' => 'Display',
        ];
    }
}
