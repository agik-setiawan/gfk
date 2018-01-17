<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispitaccntel".
 *
 * @property int $itacctelid
 * @property int $questid
 * @property string $description
 * @property int $votre
 * @property int $genius
 * @property int $logitech
 * @property int $westerndigital
 * @property int $eyota
 * @property int $toshiba
 * @property int $vgen
 * @property int $hp
 * @property int $kingston
 * @property int $sandisk
 * @property int $advance
 * @property int $adata
 * @property string $others
 * @property int $totalunit
 * @property int $totalunitcheck
 */
class Maindispitaccntel extends \yii\db\ActiveRecord
{
  public $desctemp;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispitaccntel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'totalunit', 'totalunitcheck'], 'required'],
            [['questid', 'votre', 'genius', 'logitech', 'westerndigital', 'eyota', 'toshiba', 'seagate', 'vgen', 'hp', 'kingston', 'sandisk', 'advance', 'adata', 'totalunit', 'totalunitcheck'], 'integer'],
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
            'itacctelid' => 'Itacctelid',
            'questid' => 'Questid',
            'description' => 'Description',
            'desctemp' => 'Others Description',
            'votre' => 'Votre',
            'genius' => 'Genius',
            'logitech' => 'Logitech',
            'westerndigital' => 'Western digital',
            'eyota' => 'Eyota',
            'toshiba' => 'Toshiba',
            'seagate' => 'Seagate',
            'vgen' => 'V-gen',
            'hp' => 'HP',
            'kingston' => 'Kingston',
            'sandisk' => 'Sandisk',
            'advance' => 'Advance',
            'adata' => 'Adata',
            'others' => 'Others',
            'totalunit' => 'Total unit',
            'totalunitcheck' => 'Totalunitcheck',
        ];
    }
}
