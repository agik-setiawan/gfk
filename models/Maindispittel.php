<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispittel".
 *
 * @property int $ittelid
 * @property int $questid
 * @property string $description
 * @property int $oppo
 * @property int $mi
 * @property int $lenovo
 * @property int $samsung
 * @property int $advan
 * @property int $nokia
 * @property int $asus
 * @property string $others
 * @property int $totalunit
 * @property int $totalunitcheck
 */
class Maindispittel extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispittel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'totalunit', 'totalunitcheck'], 'required'],
            [['questid', 'oppo', 'mi', 'lenovo', 'samsung', 'advan', 'nokia', 'asus', 'totalunit', 'totalunitcheck'], 'integer'],
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
            'ittelid' => 'Ittelid',
            'questid' => 'Questid',
            'description' => 'Description',
            'oppo' => 'Oppo',
            'mi' => 'Mi',
            'lenovo' => 'Lenovo',
            'samsung' => 'Samsung',
            'advan' => 'Advan',
            'nokia' => 'Nokia',
            'asus' => 'Asus',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
            'totalunitcheck' => 'Totalunitcheck',
        ];
    }
}
