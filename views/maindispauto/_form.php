<?php

use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
// use yii\jui\JuiAsset;
// use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispauto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-solid">
  <div class="box-body">

    <?php



    $form = ActiveForm::begin(['options' => [
      // 'enctype' => 'multipart/form-data',
      'id' => 'dynamic-form'
    ]
  ]); ?>
  <?= $form->field($modeltemp, 'maindisp')->label(false)->hiddenInput() ?>

  <div style="width:100%; overflow:scroll;">
    <div class="box-body">

      <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper',
        'widgetBody' => '.form-options-body',
        'widgetItem' => '.form-options-item',
        'min' => 1,
        'limit' => 10,
        'insertButton' => '.add-item',
        'deleteButton' => '.delete-item',
        'model' => $model[0],
        'formId' => 'dynamic-form',
        'formFields' => [
          'autoid',
          'questid',
          'description',
          'dunlop',
          'hankook',
          'goodyear',
          'bridgestone',
          'accelera',
          'gtradial',
          'achilles',
          'ahm',
          'federal',
          'pertamina',
          'yamalube',
          'castrol',
          'shell',
          'top1',
          'others',
          'totalunit',
        ],
      ]); ?>
      <p id="demo"></p>
      
            
      <table class="table table-striped margin-b-none">
        <thead>
          <tr>
            <th style="width: 450px; text-align: center">Description</th>
            <th style="width: 90px; text-align: center">Dunlop</th>
            <th style="width: 200px; text-align: center">Hankook</th>
            <th style="width: 150px; text-align: center">Goodyear</th>
            <th style="width: 90px; text-align: center">Bridgestone</th>
            <th style="width: 90px; text-align: center">Accelera</th>
            <th style="width: 90px; text-align: center">GT radial</th>
            <th style="width: 90px; text-align: center">Achilles</th>
            <th style="width: 90px; text-align: center">AHM</th>
            <th style="width: 90px; text-align: center">Federal</th>
            <th style="width: 90px; text-align: center">Pertamina</th>
            <th style="width: 90px; text-align: center">Yamalube</th>
            <th style="width: 90px; text-align: center">Castrol</th>
            <th style="width: 90px; text-align: center">Shell</th>
            <th style="width: 90px; text-align: center">Top 1</th>
            <th style="width: 90px; text-align: center">Others</th>  <th colspan="2" style="width: 12%; text-align: center">Totalunit</th>
            <th style="width: 90px; text-align: center">Action</th>
          </tr>
        </thead>
        <tbody class="form-options-body">
          <?php
          // echo  $form->field($model, 'total')->hiddenInput(["id"=>"total"])->label(false);
          foreach ($model as $index => $model): ?>

          <tr class="form-options-item">
            <?php


            // necessary for update action.
            if (! $model->isNewRecord) {

              echo Html::activeHiddenInput($model, "[{$index}]autoid");

            }

            ?>
            <td class="vcenter">
              <?php
              $modeldesc = $model->description;
              $checkval = strchr($modeldesc ,"Others");
              $checkvalo = strchr($modeldesc ,":");
              $checkvalof = str_replace(":","",$checkvalo);
              if($checkval != null ){
                $model->description ="Others";
                $hideoth = "inline;";
                $model->desctemp = $checkvalof;
              }else{
                $hideoth = "none;";
              }
              echo   $form->field($model, "[{$index}]description")->label(false)->widget(Select2::classname(), [
                'data' => [
                  'Car Tyre (Ban Mobil)'=>'Car Tyre (Ban Mobil)',
                  'Engine Oil - car (Oli Mobil)'=>'Engine Oil - car (Oli Mobil)',
                  'Engine Oil - motor cycle(Oli Mobil)'=>'Engine Oil - Motor cycle(Oli Mobil)',
                  'Engine Oil - motor cycle(Oli Mobil)'=>'Engine Oil - Motor cycle(Oli Mobil)',
                  'Automatic Transmission Fluid (ATF)'=>'Automatic Transmission Fluid (ATF)',
                  'Mesin Spooring'=>'Mesin Spooring',
                  'Spare Part'=>'Spare Part',
                  'Others'=>'Others',
                ],
                'options' => ['placeholder' => '- Select Product -','onChange'=>'
                var descdata = ["Car Tyre (Ban Mobil)","Engine Oil - car (Oli Mobil)","Engine Oil - motor cycle(Oli Mobil)","Automatic Transmission Fluid (ATF)","Car Navigation (GPS)","Mesin Spooring","Spare Part"];
                audcond($(this).attr("id"),descdata);'],
                'pluginOptions' => [
                  'allowClear' => true
                ],
              ]);
              ?>
              <?= $form->field($model, "[{$index}]desctemp")->label(false)->textInput(['style'=>'display:'.$hideoth, 'class'=>'nodefault']) ?>
            </td>

            <td class="vcenter">
              <?= $form->field($model, "[{$index}]dunlop")->label(false)->checkbox(['label'=>'']); ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]hankook")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]goodyear")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]bridgestone")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]accelera")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]gtradial")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]achilles")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]ahm")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]federal")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]pertamina")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]yamalube")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]castrol")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]shell")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]top1")->label(false)->checkbox(['label'=>'']) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]others")->label(false)->textInput(['maxlength' => true]) ?>
            </td>



            <td class="vcenter" >
              <?php
              if ($model->totalunit==0 && ! $model->isNewRecord)
              {
              $hides = "none;";
            }else{
              $hides = "inline";
            }
              echo $form->field($model, "[{$index}]totalunit")->label(false)->textInput(['style'=>'display:'.$hides]); 
              
              ?>
		
            </td>

            <td class="vcenter">
                <?php
                if ($model->totalunitcheck==0)
                {
                $hide = "none;";
              }else{
                $hide= "inline";
              }

                echo $form->field($model, "[{$index}]totalunitcheck")->label(false)->checkbox(['label'=>'','style'=>'display:'.$hide, 'class'=>'nodefault'])

                ?>
            </td>



            <td class="text-center vcenter">
              <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
            </td>
          </tr>

        <?php   endforeach; ?>
      </tbody>
      <tfoot>

        <tr>
          <td colspan="18"></td>
          <td style="text-align: center"><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>
        </tr>
      </tfoot>
    </table>

    <?php DynamicFormWidget::end(); ?>




    <div class="form-group">
      <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

  </div>
</div>
</div>
</div>
