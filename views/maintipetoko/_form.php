<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mastercattoko;
use app\models\Mastertipetoko;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Maintipetoko */
/* @var $form yii\widgets\ActiveForm */
$cattoko = ArrayHelper::map(Mastercattoko::find()->asArray()->all(), 'cattokoid', 'category');
$tipetoko = ArrayHelper::map(Mastertipetoko::find()->asArray()->where(['cattokoid'=>$model->cattokoid])->all(), 'tipetokoid', 'tipetoko');
?>

<div class="box box-solid">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    echo   $form->field($model, 'cattokoid')->widget(Select2::classname(), [
      'data' => $cattoko,
      'options' => ['placeholder' => '- select -', 'id'=>'cattokoid'],
      'pluginOptions' => [
        'allowClear' => true
      ],
    ]);
    ?>
    <?= Html::hiddenInput('model_id2', $model->tipetokoid, ['id'=>'model_id2']) ?>
    <?= $form->field($model, 'tipetokoid')->widget(DepDrop::classname(), [
        'data'=> $tipetoko,
        'type' => DepDrop::TYPE_SELECT2,
        'options' => ['id'=>'tipetokoid'],
        'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
              'pluginOptions'=>[
          'depends'=>['cattokoid'],
          'placeholder'=>'Select Tipe Toko',
          'url'=>Url::to(['/maintipetoko/tipetoko']),
          'loadingText' => 'Loading ...',
          'params'=>['model_id2']
          ],


          ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
