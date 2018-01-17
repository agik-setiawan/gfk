<?php

use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\select2\Select2;
// use yii\jui\JuiAsset;
// use yii\web\JsExpression;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Maindispaudio */
/* @var $form yii\widgets\ActiveForm */

?>


    <?php $form = ActiveForm::begin(['options' => [
      // 'enctype' => 'multipart/form-data',
      'id' => 'dynamic-form'
    ]
    ]); ?>
    <?= $form->field($modeltemp, 'maindisp')->label(false)->hiddenInput() ?>



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
          'desctemp',
          'lg',
          'sharp',
          'panasonic',
          'polytron',
          'samsung',
          'sony',
          'gmc',
          'others',
          'totalunit',
          'totalunitcheck',
        ],
      ]); ?>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="box box-solid">
        <div class="box-body">
          <div style="width:100%; overflow:scroll;">
      <div class="container-items"><!-- widgetBody -->
        <p id="demo"></p>
      <table class="table  table-striped margin-b-none">
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
            <th colspan="2" style="width: 12%; text-align: center">Totalunit</th>
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
                echo Html::activeHiddenInput($model, "[{$index}]pdisplayaudid");


              }
              // echo $form->field($model, "[{$index}]pdisplayaudid")->label(false)->textInput(['maxlength' => true]); ?>
              <td class="vcenter">
                <?php
                $modeldesc = $model->description;
                $checkval = strchr($modeldesc ,"Others");
                $checkvalo = strchr($modeldesc ,":");
                $checkvalof = str_replace(":","",$checkvalo);
                if($checkval != null){
                  $model->description ="Others";
                  $hideoth = "inline;";
                  $model->desctemp = $checkvalof;
                }else{
                  $hideoth = "none;";
                }
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
                  'options' => ['placeholder' => '- Select Product -','onChange'=>'
                  var descdata = ["Headphone","MP3/MP4 Player","Clock Radio","Speaker (Speaker Besar/Salon)","Car Navigation (GPS)","Projector"];
                  audcond($(this).attr("id"),descdata);'],
                  'pluginOptions' => [
                    'allowClear' => true
                  ],

                ]);
                ?>
                <?= $form->field($model, "[{$index}]desctemp")->label(false)->textInput(['style'=>'display:'.$hideoth, 'class'=>'nodefault']) ?>
              </td>

              <td class="vcenter">
                <?= $form->field($model, "[{$index}]lg")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]); ?>
              </td>
              <td class="vcenter">
              <?= $form->field($model, "[{$index}]sharp")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]panasonic")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]polytron")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]samsung")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]sony")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))" ]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]gmc")->label(false)->checkbox(['label'=>'','class'=>'unchk', onclick=>"valdisp($(this).attr('id'))"]) ?>
            </td>
            <td class="vcenter">
              <?= $form->field($model, "[{$index}]others")->label(false)->textInput(['maxlength' => true]) ?>
             
              <?= $form->field($model, "[{$index}]totalunit_repeat")->label(false)->textInput()?>
              
            </td>
            <td class="vcenter" >

              <?php
              if ($model->totalunit==0 && !$model->isNewRecord && empty($model->totalunit))
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
          <?php endforeach; ?>
        </tbody>
        </div>
        <tfoot>
          <tr>
            <td colspan="11"></td>
            <td style="text-align: center"><button type="button" class="add-item btn btn-success btn-sm"><span class="fa fa-plus"></span> New</button></td>
          </tr>
        </tfoot>
      </table>
      </div>
    </div>
    </div>

    </div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
      </div><!-- .panel -->
      <?php DynamicFormWidget::end(); ?>






    <?php ActiveForm::end(); ?>
