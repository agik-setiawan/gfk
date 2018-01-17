<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindisphomeent".
 *
 * @property int $homeenid
 * @property int $questid
 * @property string $description
 * @property int $display
 */
class Maindisphomeent extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindisphomeent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'totalunit','totalunitcheck'], 'required'],
            [['questid', 'totalunitcheck','totalunit'], 'integer'],
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
            'homeenid' => 'Homeenid',
            'questid' => 'Questid',
            'description' => 'Description',
            'totalunitcheck' => 'Display',
            'totalunit' => 'Total Unit',
        ];
    }
}
