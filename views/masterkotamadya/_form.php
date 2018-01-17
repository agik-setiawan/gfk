<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Masterkotamadya */
/* @var $form yii\widgets\ActiveForm */
$province = ArrayHelper::map(Masterprovince::find()->asArray()->all(), 'provinceid', 'province');

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
    <?= $form->field($model, 'dati')->radioList(['Kotamadya' => 'Kotamadya ', 'Kabupaten' => 'Kabupaten'])->label('Dati'); ?>


    <?= $form->field($model, 'kotamadya')->textInput(['maxlength' => true])->label('Kotamadya/Kabupaten') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
