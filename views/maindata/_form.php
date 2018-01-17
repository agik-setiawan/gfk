<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\Masterkecamatan;
use app\models\Masterdesa;
use kartik\widgets\DepDrop;
use yii\helpers\Json;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Maindata */
/* @var $form yii\widgets\ActiveForm */
$province = ArrayHelper::map(Masterprovince::find()->asArray()->all(), 'provinceid', 'province');

$kotmad = ArrayHelper::map(Masterkotamadya::find()->asArray()->where(['kotamadyaid'=>$model->kotamadyaid])->all(), 'kotamadyaid', 'kotamadya');
$kecamatan = ArrayHelper::map(Masterkecamatan::find()->asArray()->where(['kecamatanid'=>$model->kecamatanid])->all(), 'kecamatanid', 'kecamatan');
$desa = ArrayHelper::map(Masterdesa::find()->asArray()->where(['desaid'=>$model->desaid])->all(), 'desaid', 'desa');
?>

<div class="box box-solid">
  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-sm-12">
      <?= $form->field($model, 'quescode')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'nopeta')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-6">
      <h3>Administration</h3>
      <hr>
      <?= $form->field($model, 'datetemp')->widget(
        DatePicker::className(), [
          'type' => DatePicker::TYPE_COMPONENT_APPEND,
          'options' => ['placeholder' => 'Date'],
          'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd/mm/yyyy',
            'todayHighlight' => true
          ]
        ]);
        ?>

        <?= $form->field($model, 'interviewer')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'teamleader')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'dataentry')->textInput(['maxlength' => true]) ?>

      </div>
      <div class="col-sm-6">
        <h3>Area UC</h3>
        <hr>
        <?= Html::hiddenInput('model_id1', $model->provinceid, ['id'=>'model_id1']) ?>
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
        <?= Html::hiddenInput('model_id4', $model->desaid, ['id'=>'model_id4']) ?>
        <?= $form->field($model, 'desaid')->widget(DepDrop::classname(), [
          'data'=> $desa,
          'type' => DepDrop::TYPE_SELECT2,
          'options'=>['id'=>'desaid', 'onChange'=>'
          var dataku;
          var val = $(this).val();
          if (val == 1){
            $( "#kodepos" ).val(0);
            $( "#kodepos" ).removeAttr("readonly");

          }else{
            $( "#kodepos" ).attr("readonly",true);
            
            $.post( "'.Url::to(['/masterdesa/kodepos']).'&id="+val, function( data ) {
              if(!data){ 
            $( "#kodepos" ).val("");
             }else{
              dataku= $.parseJSON(data);
              $( "#kodepos" ).val( dataku.kodepos);
		}
            });
          }
          '],
          
          'select2Options'=>['pluginOptions'=>['allowClear'=>false]],
          'pluginOptions'=>[
	    'depends'=>['kotamadyaid', 'kecamatanid'],
            'placeholder'=>'Select Desa',
            'url'=>Url::to(['/masterdesa/desa']),
            'loadingText' => 'Loading ...',
            'params'=>['model_id3','model_id4'],
            'initialize' =>true,

          ],
          
	'pluginEvents' => [
            "depdrop:change"=>'function(event, id, value, count) {
              var val = $("#desaid").val();
              if (val){
                var dataku;
                if(val==1){
                  $( "#kodepos" ).val(0);
            	$( "#kodepos" ).removeAttr("readonly");
                }else{
                   $( "#kodepos" ).attr("readonly",true);
            
            	$.post( "'.Url::to(['/masterdesa/kodepos']).'&id="+val, function( data ) {
             	 if(!data){ 
            	$( "#kodepos" ).val("");
             	}else{
             	 dataku= $.parseJSON(data);
              	$( "#kodepos" ).val( dataku.kodepos);
			}
           	 });
                }
                

              }else{
                $( "#kodepos" ).val("");
                $( "#kodepos" ).attr("readonly",true);
              }

            }',


          ],	
        ]); ?>


        <?= $form->field($model, 'kodepos')->textInput(['id' => 'kodepos','readonly'=>true]) ?>


      </div>
    </div>
    <div class="box-footer">

      <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
      </div>
    </div>

    <?php ActiveForm::end(); ?>


  </div>
