<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispitdpcnperip".
 *
 * @property int $itdpcid
 * @property int $questid
 * @property string $description
 * @property int $hp
 * @property int $acer
 * @property int $samsung
 * @property int $advan
 * @property int $lenovo
 * @property int $asus
 * @property int $canon
 * @property int $fujixerox
 * @property int $panasonic
 * @property int $brother
 * @property int $epson
 * @property string $others
 * @property int $totalunit
 */
class Maindispitdpcnperip extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispitdpcnperip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],
            [['questid', 'hp', 'acer', 'samsung', 'advan', 'lenovo', 'asus', 'canon', 'fujixerox', 'panasonic', 'brother', 'epson', 'totalunit','totalunitcheck'], 'integer'],
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
            'itdpcid' => 'Itdpcid',
            'questid' => 'Questid',
            'description' => 'Description',
            'hp' => 'Hp',
            'acer' => 'Acer',
            'samsung' => 'Samsung',
            'advan' => 'Advan',
            'lenovo' => 'Lenovo',
            'asus' => 'Asus',
            'canon' => 'Canon',
            'fujixerox' => 'Fujixerox',
            'panasonic' => 'Panasonic',
            'brother' => 'Brother',
            'epson' => 'Epson',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
