<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispmdasda".
 *
 * @property int $mdasdaid
 * @property int $questid
 * @property string $description
 * @property int $lg
 * @property int $sharp
 * @property int $panasonic
 * @property int $polytron
 * @property int $samsung
 * @property int $aqua
 * @property int $rinai
 * @property string $others
 * @property int $totalunit
 */
class Maindispmdasda extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispmdasda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],
            [['questid', 'lg', 'sharp', 'panasonic', 'polytron', 'samsung', 'aqua', 'rinai', 'totalunit','totalunitcheck'], 'integer'],
            [['description','desctemp'], 'string', 'max' => 200],
            [['others'], 'string', 'max' => 100],
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
            'mdasdaid' => 'Mdasdaid',
            'questid' => 'Questid',
            'description' => 'Description',
            'lg' => 'Lg',
            'sharp' => 'Sharp',
            'panasonic' => 'Panasonic',
            'polytron' => 'Polytron',
            'samsung' => 'Samsung',
            'aqua' => 'Aqua',
            'rinai' => 'Rinai',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
