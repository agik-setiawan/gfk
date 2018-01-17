<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Masterkecamatan */
/* @var $form yii\widgets\ActiveForm */
$province = ArrayHelper::map(Masterprovince::find()->asArray()->all(), 'provinceid', 'province');

$kotmad = ArrayHelper::map(Masterkotamadya::find()->asArray()->where(['kotamadyaid'=>$model->kotamadyaid])->all(), 'kotamadyaid', 'kotamadya');
?>

<div class="box box-solid">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    echo   $form->field($model, 'provinceid')->widget(Select2::classname(), [
      'data' => $province,
      'options' => ['placeholder' => '- select -', 'id'=>'provinceid'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);
    ?>
    <?php
    echo   $form->field($model, 'dati')->widget(Select2::classname(), [
      'data' => ['Kotamadya'=>'Kotamadya', 'Kabupaten'=>'Kabupaten'],
      'options' => ['placeholder' => '- select -', 'id'=>'dati'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);
    ?>

    <?= Html::hiddenInput('model_id2', $model->kotamadyaid, ['id'=>'model_id2']) ?>
    <?= $form->field($model, 'kotamadyaid')->widget(DepDrop::classname(), [
  			'data'=> $kotmad,
  			'type' => DepDrop::TYPE_SELECT2,
  			'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
              'pluginOptions'=>[
  				'depends'=>['provinceid','dati'],
  				'placeholder'=>'Select Kotamadya',
  				'url'=>Url::to(['/masterkecamatan/kotamadya']),
  				'loadingText' => 'Loading ...',
  				'params'=>['model_id2']
  				],


          ]); ?>



    <?= $form->field($model, 'kecamatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
