<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\TouchSpin;

/* @var $this yii\web\View */
/* @var $model app\models\Mainpersendisplay */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-solid">
  <div class="box-body">

    <?php $form = ActiveForm::begin([
					'id' => 'persendisplay',
          'enableAjaxValidation' => false,]); ?>
    <div class="col-sm-12">

      <div id="dispmain">
        <div class="row">
          <div class="col-sm-3">
            <?= $form->field($model, 'audiovisual')->widget(
              TouchSpin::className(),[
                'options' => ['class' => 'totaldisp'],
                'name' => 't2',
                'pluginOptions' => [
                  'postfix' => '%',
                  'verticalbuttons' => true,
                  'initval' => 0,
                  'min' => 0,
                  'max' => 100,
                  'step' => 1,
                ]
              ]); ?>
              <?= $form->field($model, 'tipetokotemp')->label(false)->hiddenInput() ?>
            </div>
            <div class="col-sm-3">
              <?= $form->field($model, 'homeentertaint')->widget(
                TouchSpin::className(),[
                  'options' => ['class' => 'totaldisp'],
                  'name' => 't2',
                  'pluginOptions' => [
                    'postfix' => '%',
                    'verticalbuttons' => true,
                    'initval' => 0,
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                  ]
                ]); ?>
              </div>
              <div class="col-sm-3">
                <?= $form->field($model, 'sda')->widget(
                  TouchSpin::className(),[
                    'options' => ['class' => 'totaldisp'],
                    'name' => 't2',
                    'pluginOptions' => [
                      'postfix' => '%',
                      'verticalbuttons' => true,
                      'initval' => 0,
                      'min' => 0,
                      'max' => 100,
                      'step' => 1,
                    ]
                  ]); ?>
                </div>
                <div class="col-sm-3">
                  <?= $form->field($model, 'mda')->widget(
                    TouchSpin::className(),[
                      'options' => ['class' => 'totaldisp'],
                      'name' => 't2',
                      'pluginOptions' => [
                        'postfix' => '%',
                        'verticalbuttons' => true,
                        'initval' => 0,
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                      ]
                    ]); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <?= $form->field($model, 'photo')->widget(
                      TouchSpin::className(),[
                        'options' => ['class' => 'totaldisp'],
                        'name' => 't2',
                        'pluginOptions' => [
                          'postfix' => '%',
                          'verticalbuttons' => true,
                          'initval' => 0,
                          'min' => 0,
                          'max' => 100,
                          'step' => 1,
                        ]
                      ]); ?>
                    </div>
                    <div class="col-sm-3">
                      <?= $form->field($model, 'lighting')->widget(
                        TouchSpin::className(),[
                          'options' => ['class' => 'totaldisp'],
                          'name' => 't2',
                          'pluginOptions' => [
                            'postfix' => '%',
                            'verticalbuttons' => true,
                            'initval' => 0,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                          ]
                        ]); ?>
                      </div>
                      <div class="col-sm-3">
                        <?= $form->field($model, 'telecom')->widget(
                          TouchSpin::className(),[
                            'options' => ['class' => 'totaldisp'],
                            'name' => 't2',
                            'pluginOptions' => [
                              'postfix' => '%',
                              'verticalbuttons' => true,
                              'initval' => 0,
                              'min' => 0,
                              'max' => 100,
                              'step' => 1,
                            ]
                          ]); ?>
                        </div>
                        <div class="col-sm-3">
                          <?= $form->field($model, 'auto')->widget(
                            TouchSpin::className(),[
                              'options' => ['class' => 'totaldisp'],
                              'name' => 't2',
                              'pluginOptions' => [
                                'postfix' => '%',
                                'verticalbuttons' => true,
                                'initval' => 0,
                                'min' => 0,
                                'max' => 100,
                                'step' => 1,
                              ]
                            ]); ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-3">
                            <?= $form->field($model, 'other')->widget(
                              TouchSpin::className(),[
                                'options' => ['class' => 'totaldisp'],
                                'name' => 't2',
                                'pluginOptions' => [
                                  'postfix' => '%',
                                  'verticalbuttons' => true,
                                  'initval' => 0,
                                  'min' => 0,
                                  'max' => 100,
                                  'step' => 1,
                                ]
                              ]); ?>
                            </div>
                            <div class="col-sm-3">
                              <?= $form->field($model, 'it')->widget(
                                TouchSpin::className(),[
                                  'options' => ['class' => 'totaldisp', 'id' => 'itdisp'],
                                  'name' => 't2',
                                  'pluginOptions' => [
                                    'postfix' => '%',
                                    'verticalbuttons' => true,
                                    'initval' => 0,
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                  ]
                                ]); ?>
                              </div>
                              <div class="col-sm-6">
                              <?= $form->field($model, 'totaldisptmp',['showLabels'=>false])->hiddenInput(['id'=>'totaldisptmp']) ?>
                            </div>
                              <div class="col-sm-6">
                                <div class="small-box bg-aqua">
                                  <div class="inner">
                                    <h3><span id="sumdisp">0<span><sup style="font-size: 20px">%</sup></h3>

                                      <p>Total Display</p>
                                    </div>
                                    <div class="icon">
                                      <i class=" fa fa-bar-chart-o (alias)"></i>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div id="dispit" class="hidden">
                            <div class="col-sm-12">
                              <hr>
                              <div class="row">
                                <div class="col-sm-3">
                                  <?= $form->field($model, 'itdpcppc')->widget(
                                    TouchSpin::className(),[
                                      'options' => ['class' => 'totaldispit'],
                                      'name' => 't2',
                                      'pluginOptions' => [
                                        'postfix' => '%',
                                        'verticalbuttons' => true,
                                        'initval' => 0,
                                        'min' => 0,
                                        'max' => 100,
                                        'step' => 1,
                                      ]
                                    ]); ?>
                            </div>
                            <div class="col-sm-3">
                              <?= $form->field($model, 'peripherals')->widget(
                                TouchSpin::className(),[
                                  'options' => ['class' => 'totaldispit'],
                                  'name' => 't2',
                                  'pluginOptions' => [
                                    'postfix' => '%',
                                    'verticalbuttons' => true,
                                    'initval' => 0,
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                  ]
                                ]); ?>
                            </div>
                            <div class="col-sm-3">
                              <?= $form->field($model, 'accessories')->widget(
                                TouchSpin::className(),[
                                  'options' => ['class' => 'totaldispit'],
                                  'name' => 't2',
                                  'pluginOptions' => [
                                    'postfix' => '%',
                                    'verticalbuttons' => true,
                                    'initval' => 0,
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                  ]
                                ]); ?>
                            </div>
                            <div class="col-sm-3">
                              <?= $form->field($model, 'component')->widget(
                                TouchSpin::className(),[
                                  'options' => ['class' => 'totaldispit'],
                                  'name' => 't2',
                                  'pluginOptions' => [
                                    'postfix' => '%',
                                    'verticalbuttons' => true,
                                    'initval' => 0,
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                  ]
                                ]); ?>
                            </div>
                            </div>
                            <div class="row">
                              <div class="col-sm-3">
                                <?= $form->field($model, 'networking')->widget(
                                  TouchSpin::className(),[
                                    'options' => ['class' => 'totaldispit'],
                                    'name' => 't2',
                                    'pluginOptions' => [
                                      'postfix' => '%',
                                      'verticalbuttons' => true,
                                      'initval' => 0,
                                      'min' => 0,
                                      'max' => 100,
                                      'step' => 1,
                                    ]
                                  ]); ?>
                            </div>
                            <div class="col-sm-3">
                              <?= $form->field($model, 'othersit')->widget(
                                TouchSpin::className(),[
                                  'options' => ['class' => 'totaldispit'],
                                  'name' => 't2',
                                  'pluginOptions' => [
                                    'postfix' => '%',
                                    'verticalbuttons' => true,
                                    'initval' => 0,
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 1,
                                  ]
                                ]); ?>
                            </div>
                            <div class="col-sm-6">
                            <?= $form->field($model, 'totaldispittmp',['showLabels'=>false])->hiddenInput(['id'=>'totaldispittmp']) ?>
                          </div>
                            <div class="col-sm-6">
                              <div class="small-box bg-aqua">
                                <div class="inner">
                                  <h3><span id="sumdispit">0<span><sup style="font-size: 20px">%</sup></h3>

                                    <p>Total Display</p>
                                  </div>
                                  <div class="icon">
                                    <i class=" fa fa-bar-chart-o (alias)"></i>
                                  </div>

                                </div>
                            </div>
                            </div>
                            </div>
                          </div>


                        </div>
                        <div class="box-footer">
                          <div class="form-group">
                            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
                          </div>
                        </div>

                        <?php ActiveForm::end(); ?>

                      </div>
