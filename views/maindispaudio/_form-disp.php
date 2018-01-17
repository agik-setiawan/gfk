<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\JuiAsset;
use yii\web\JsExpression;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Maindispaudio */
/* @var $form yii\widgets\ActiveForm */
?>
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
      'pdisplayaudid',
      'questid',
      'description',
      'lg',
      'sharp',
      'panasonic',
      'polytron',
      'samsung',
      'sony',
      'gmc',
      'others',
      'totalunit',
    ],
  ]); ?>

  <table class="table table-bordered table-striped margin-b-none">
    <thead>
      <tr>
        <th style="width: 450px; text-align: center">Description</th>
        <th style="width: 90px; text-align: center">LG</th>
        <th style="width: 200px; text-align: center">Sharp</th>
        <th style="width: 150px; text-align: center">Panasonic</th>
        <th style="width: 90px; text-align: center">Polytron</th>
        <th style="width: 90px; text-align: center">Samsung</th>
        <th style="width: 90px; text-align: center">Sony</th>
        <th style="width: 90px; text-align: center">GMC</th>
        <th style="width: 90px; text-align: center">Others</th>
        <th style="width: 90px; text-align: center">Totalunit</th>
        <th style="width: 90px; text-align: center">Action</th>
      </tr>
    </thead>
    <tbody class="form-options-body">
      <?php
      // echo  $form->field($model, 'total')->hiddenInput(["id"=>"total"])->label(false);
      foreach ($model as $index => $model): ?>
        <?php
        // necessary for update action.
        if (! $model->isNewRecord) {
          echo Html::activeHiddenInput($model, "[{$index}]pdisplayaudid");


        }

        ?>
        <tr class="form-options-item">
          <td class="vcenter">
            <?php
            echo   $form->field($model, "[{$index}]description")->label(false)->widget(Select2::classname(), [
              'data' => [
              'UHD TV'=>'UHD TV',
              'PTV (TV LCD / LED / PLASMA)'=>'PTV (TV LCD / LED / PLASMA)',
              'AHS (Mini Midi/Home Theater)'=>'AHS (Mini Midi/Home Theater)',
              'Headphone'=>'Headphone',
              'Radio/Recorder (Kaset) Player'=>'Radio/Recorder (Kaset) Player',
              'MP3/MP4 Player'=>'MP3/MP4 Player',
              'Clock Radio'=>'Clock Radio',
              'Speaker (Speaker Besar/Salon)'=>'Speaker (Speaker Besar/Salon)',
              'Sound Bar / Soundplate/ Lap341'=>'Sound Bar / Soundplate/ Lap341',
              'CRT-TV (TV Tabung)'=>'CRT-TV (TV Tabung)',
              'Camcorder (Handycam)'=>'Camcorder (Handycam)',
              'DVD/Blue-Ray Player'=>'DVD/Blue-Ray Player',
              'Car Navigation (GPS)'=>'Car Navigation (GPS)',
              'Projector'=>'Projector',
              'Others'=>'Others',
            ],
              'options' => ['placeholder' => '- Select Product -'],
              'pluginOptions' => [
                'allowClear' => true
              ],
            ]);
            ?>
          </td>

          <td class="vcenter">
            <?= $form->field($model, "[{$index}]lg")->label(false)->checkbox(['label'=>'']); ?>
          </td>
          <td class="vcenter">
          <?= $form->field($model, "[{$index}]sharp")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]panasonic")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]polytron")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]samsung")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]sony")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]gmc")->label(false)->checkbox(['label'=>'']) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]others")->label(false)->textInput(['maxlength' => true]) ?>
        </td>
        <td class="vcenter">
          <?= $form->field($model, "[{$index}]totalunit")->label(false)->textInput() ?>
        </td>



          <td class="text-center vcenter">
            <button type="button" class="delete-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
      <tr>
        <td colspan="10"></td>
        <td style="text-align: center"><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>
      </tr>
    </tfoot>
  </table>

  <?php DynamicFormWidget::end(); ?>







</div>
</div>
