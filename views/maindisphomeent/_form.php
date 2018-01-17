<?php

use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
// use yii\jui\JuiAsset;
// use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispitcomp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-solid">
<div class="box-body">

    <?php $form = ActiveForm::begin(['options' => [
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
          'homeenid',
          'questid',
          'description',
          'display',
        ],
      ]); ?>

      <table class="table table-striped margin-b-none">
        <thead>
          <tr>
            <th style="width: 450px; text-align: center">Description</th>
            <th colspan="2" style="width: 90px; text-align: center">Display(<i class="fa fa-check"></i>)</th>
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
                echo Html::activeHiddenInput($model, "[{$index}]homeenid");


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
                  'CD/DVD Music/Film'=>'CD/DVD Music/Film',
                  'Video Game Console (player)'=>'Video Game Console (player)',
                  'Video Game Software(CD Game)'=>'Video Game Software(CD Game)',
                  'HE/VGC Accessories'=>'HE/VGC Accessories',
                  'Others'=>'Others',
                ],
                'options' => ['placeholder' => '- Select Product -','onChange'=>'
                var descdata = ["CD/DVD Music/Film","Video Game Software(CD Game)","HE/VGC Accessories"];
                audcond($(this).attr("id"),descdata);'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],
                ]);
                ?>
                <?= $form->field($model, "[{$index}]desctemp")->label(false)->textInput(['style'=>'display:'.$hideoth, 'class'=>'nodefault']) ?>
              </td>

              <td class="vcenter" >
                <?php
                if ($model->totalunit==0 && ! $model->isNewRecord)
                {
                $hides = "none;";
              }else{
                $hides = "inline";
              }
                echo $form->field($model, "[{$index}]totalunit")->label(false)->textInput(['style'=>'display:'.$hides]) ?>

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
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="3"></td>
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
