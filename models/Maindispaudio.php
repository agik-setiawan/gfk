<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maindispaudio".
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
class Maindispaudio extends \yii\db\ActiveRecord
{
  public $desctemp;
  public $totalunit_repeat;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maindispaudio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'totalunit','totalunitcheck'], 'required'],
            [['questid', 'lg', 'sharp', 'panasonic', 'polytron', 'samsung', 'sony', 'gmc', 'totalunit','totalunitcheck','totalunit_repeat'], 'integer'],
            [['description', 'others','desctemp'], 'string', 'max' => 200],
            ['totalunit',function ($attribute, $params) {
            if($this->totalunit > 0){
            if ($this->totalunit < $this->totalunit_repeat) {
                $this->addError($attribute, 'Total Brand Unit Must ≥ Than Count of Brand Checklist');
              return false;
            }
            }
        }],
            //[['totalunit'], 'compareCheck', 'on' =>'scenario'],
             //['totalunit', 'validateMultiple', function ($model,$attribute, $params) {
             //if ($attribute < $model->totalunit_repeat){
             //$this->addError($attribute, 'Total Brand Unit Must ≥ Than Count of Brand Checklist');
             //}
             
             //}],
             [['desctemp'], 'required', 'when' => function ($model) {
                return $model->description == "Others";
            }, 'whenClient' => "function (attribute, value) {
                return;
            }"],
        ];
    }
	
	public function compareCheck($attribute, $params)
        {
        // add custom validation
    	if ($this->totalunit < $this->totalunit_repeat) 
        $this->addError($this->totalunit ,'Credit amount should less than Bill amount.');
        }
	
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pdisplayaudid' => 'Pdisplayaudid',
            'questid' => 'Questid',
            'description' => 'Description',
            'desctemp' => 'Description(others)',
            'lg' => 'Lg',
            'sharp' => 'Sharp',
            'panasonic' => 'Panasonic',
            'polytron' => 'Polytron',
            'samsung' => 'Samsung',
            'sony' => 'Sony',
            'gmc' => 'Gmc',
            'others' => 'Others',
            'totalunit' => 'Totalunit',
        ];
    }
}
