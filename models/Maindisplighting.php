<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindisplighting".
 *
 * @property int $lightingid
 * @property int $questid
 * @property string $description
 * @property int $omi
 * @property int $philips
 * @property int $hannochs
 * @property int $panasonic
 * @property int $osram
 * @property int $atama
 * @property string $others
 * @property int $totalunit
 */
class Maindisplighting extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindisplighting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],
            [['questid', 'omi', 'philips', 'hannochs', 'panasonic', 'osram', 'atama', 'totalunit','totalunitcheck'], 'integer'],
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
            'lightingid' => 'Lightingid',
            'questid' => 'Questid',
            'description' => 'Description',
            'omi' => 'Omi',
            'philips' => 'Philips',
            'hannochs' => 'Hannochs',
            'panasonic' => 'Panasonic',
            'osram' => 'Osram',
            'atama' => 'Atama',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
