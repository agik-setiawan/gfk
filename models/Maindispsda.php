<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispsda".
 *
 * @property int $sdaid
 * @property int $questid
 * @property string $description
 * @property int $kirin
 * @property int $maspion
 * @property int $philips
 * @property int $panasonic
 * @property int $miyako
 * @property int $yongma
 * @property int $cosmos
 * @property int $unilever
 * @property int $ariston
 * @property string $others
 * @property int $totalunit
 */
class Maindispsda extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispsda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],
            [[ 'description', 'totalunit'], 'required'],
            [['questid', 'kirin', 'maspion', 'philips', 'panasonic', 'miyako', 'yongma', 'cosmos', 'unilever', 'ariston','lg', 'sharp', 'polytron', 'samsung', 'aqua', 'rinai', 'totalunit'], 'integer'],
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
            'sdaid' => 'Sdaid',
            'questid' => 'Questid',
            'description' => 'Description',
            'kirin' => 'Kirin',
            'maspion' => 'Maspion',
            'philips' => 'Philips',
            'panasonic' => 'Panasonic',
            'miyako' => 'Miyako',
            'yongma' => 'Yongma',
            'cosmos' => 'Cosmos',
            'unilever' => 'Unilever',
            'ariston' => 'Ariston',
            'lg' => 'Lg',
            'sharp' => 'Sharp',
            'polytron' => 'Polytron',
            'samsung' => 'Samsung',
            'aqua' => 'Aqua',
            'rinai' => 'Rinai',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
