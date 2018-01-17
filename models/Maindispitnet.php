<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispitnet".
 *
 * @property int $itdnetid
 * @property int $questid
 * @property string $description
 * @property int $display
 */
class Maindispitnet extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispitnet';
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
            'itdnetid' => 'Itdnetid',
            'questid' => 'Questid',
            'description' => 'Description',
            'display' => 'Display',
        ];
    }
}
