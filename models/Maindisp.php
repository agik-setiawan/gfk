<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Maindispaudiotemp".
 *
 * @property int $pdisplayaudid
 * @property int $questid
 * @property string $description
 * @property int $lg
 * @property int $sharp
 * @property int $panasonic
 * @property int $polytron
 * @property int $samsung
 * @property int $sony
 * @property int $gmc
 * @property string $others
 * @property int $totalunit
 */
class Maindisp extends \yii\base\Model
{
  public $maindisp;
    /**
     * @inheritdoc
     */
    // public static function tableName()
    // {
    //     return 'Maindispaudiotemp';
    // }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['maindisp'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }
}
