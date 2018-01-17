<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\Masterkecamatan;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Masterdesa */
/* @var $form yii\widgets\ActiveForm */
$province = ArrayHelper::map(Masterprovince::find()->asArray()->all(), 'provinceid', 'province');

$kotmad = ArrayHelper::map(Masterkotamadya::find()->asArray()->where(['kotamadyaid'=>$model->kotamadyaid])->all(), 'kotamadyaid', 'kotamadya');
$kecamatan = ArrayHelper::map(Masterkecamatan::find()->asArray()->where(['kecamatanid'=>$model->kecamatanid])->all(), 'kecamatanid', 'kecamatan');
?>

<div class="box box-solid">
<div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        
        echo   $form->field($model, 'provinceid')->widget(Select2::classname(), [
          'data' => $province,
          'options' => ['placeholder' => '- select -', 'id'=>'provinceid'],
          'pluginOptions' => [
            'allowClear' => false,
            //'initialize' =>true,
          ],
        ]);
        ?>
        <?= Html::hiddenInput('model_dati', $model->dati, ['id'=>'model_dati']) ?>
        <?php
        echo   $form->field($model, 'dati')->widget(Select2::classname(), [
          'data' => ['Kotamadya'=>'Kotamadya', 'Kabupaten'=>'Kabupaten'],
          'options' => ['placeholder' => '- select -', 'id'=>'dati'],
          'pluginOptions' => [
            'allowClear' => false,
            
            //'depends'=>['dati'],
            //'initialize' =>true,
          ],
        ]);
        ?>

        <?= Html::hiddenInput('model_id2', $model->kotamadyaid, ['id'=>'model_id2']) ?>
        <?= $form->field($model, 'kotamadyaid')->widget(DepDrop::classname(), [
          'data'=> $kotmad,
          'type' => DepDrop::TYPE_SELECT2,
          'options' => ['id'=>'kotamadyaid'],
          'select2Options'=>['pluginOptions'=>['allowClear'=>false]],
          'pluginOptions'=>[
          	
            'depends'=>['provinceid','dati'],
            'placeholder'=>'Select Kotamadya',
            'url'=>Url::to(['/masterdesa/kotamadya']),
            'loadingText' => 'Loading ...',
            'params'=>['model_dati','model_id2'],
            'initialize' =>true,
          ],


        ]); ?>

        <?= Html::hiddenInput('model_id3', $model->kecamatanid, ['id'=>'model_id3']) ?>
        <?= $form->field($model, 'kecamatanid')->widget(DepDrop::classname(), [
          'data'=> $kecamatan,
          'type' => DepDrop::TYPE_SELECT2,
          'options' => ['id'=>'kecamatanid'],
          'select2Options'=>['pluginOptions'=>['allowClear'=>false]],
          'pluginOptions'=>[
          
            'depends'=>['dati','kotamadyaid'],
            'placeholder'=>'Select Kecamatan',
            'url'=>Url::to(['/masterdesa/kecamatan']),
            'loadingText' => 'Loading ...',
            'params'=>['model_id2','model_id3'],
            //'initialize' =>true,
          ],


        ]); ?>



    <?= $form->field($model, 'desa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kodepos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
