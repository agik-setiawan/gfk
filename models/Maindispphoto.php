<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispphoto".
 *
 * @property int $photoid
 * @property int $questid
 * @property string $description
 * @property int $canon
 * @property int $nikon
 * @property int $samsung
 * @property int $olympus
 * @property int $fujifilm
 * @property int $tamron
 * @property int $sony
 * @property string $others
 * @property int $totalunit
 */
class Maindispphoto extends \yii\db\ActiveRecord
{
    public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispphoto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'description','totalunit','totalunitcheck'], 'required'],
            [['questid', 'canon', 'nikon', 'samsung', 'olympus', 'fujifilm', 'tamron', 'sony', 'totalunit','totalunitcheck'], 'integer'],
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
            'photoid' => 'Photoid',
            'questid' => 'Questid',
            'description' => 'Description',
            'canon' => 'Canon',
            'nikon' => 'Nikon',
            'samsung' => 'Samsung',
            'olympus' => 'Olympus',
            'fujifilm' => 'Fujifilm',
            'tamron' => 'Tamron',
            'sony' => 'Sony',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
