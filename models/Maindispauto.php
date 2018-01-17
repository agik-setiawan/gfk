<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispauto".
 *
 * @property int $autoid
 * @property int $questid
 * @property string $description
 * @property int $dunlop
 * @property int $hankook
 * @property int $goodyear
 * @property int $bridgestone
 * @property int $accelera
 * @property int $gtradial
 * @property int $achilles
 * @property int $ahm
 * @property int $federal
 * @property int $pertamina
 * @property int $yamalube
 * @property int $castrol
 * @property int $shell
 * @property int $top1
 * @property string $others
 * @property int $totalunit
 */
class Maindispauto extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispauto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],

            [['questid', 'dunlop', 'hankook', 'goodyear', 'bridgestone', 'accelera', 'gtradial', 'achilles', 'ahm', 'federal', 'pertamina', 'yamalube', 'castrol', 'shell', 'top1', 'totalunit','totalunitcheck'], 'integer'],
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
            'autoid' => 'Autoid',
            'questid' => 'Questid',
            'description' => 'Description',
            'dunlop' => 'Dunlop',
            'hankook' => 'Hankook',
            'goodyear' => 'Goodyear',
            'bridgestone' => 'Bridgestone',
            'accelera' => 'Accelera',
            'gtradial' => 'Gtradial',
            'achilles' => 'Achilles',
            'ahm' => 'Ahm',
            'federal' => 'Federal',
            'pertamina' => 'Pertamina',
            'yamalube' => 'Yamalube',
            'castrol' => 'Castrol',
            'shell' => 'Shell',
            'top1' => 'Top1',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
