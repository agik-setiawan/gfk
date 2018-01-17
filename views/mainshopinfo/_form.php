<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\widgets\TouchSpin;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masternamagedung;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Mainshopinfo */
/* @var $form yii\widgets\ActiveForm */
$namagedung = ArrayHelper::map(Masternamagedung::find()->asArray()->where(['provinceid'=> $modelmain->provinceid])->all(), 'namagedung', 'namagedung');
$additem = ['others'=>'Others'];
$resout = array_merge($namagedung, $additem);
?>

<div class="box box-solid">
  <div class="box-body">

    <?php $form = ActiveForm::begin([
      'options' => ['enctype' => 'multipart/form-data',
      'id' => 'maindata'],

    ]); ?>
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-6">

          <?= $form->field($model, 'namatoko')->textInput(['maxlength' => true]) ?>

        </div>
        <div class="col-sm-6">
          <?= $form->field($model, 'merktunggal')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?php
          echo   $form->field($model, 'namagedung')->widget(Select2::classname(), [
            'data' => $resout,
            'options' => ['placeholder' => '- select -','id'=>'namagedung'],
            'pluginOptions' => [
              'allowClear' => true

            ],
            'pluginEvents' => [

              "change"=>'function() {
                var val = $("#namagedung").val();


                if(val=="others"){
                   $("#gedungothers").show();
                   $("#labelnmgedung").show();

                }else{
                   $("#gedungothers").hide();
                   $("#labelnmgedung").hide();

                }

              }',


            ],
          ]);
          ?>
        </div>

        <div class="col-sm-2">
          <?= $form->field($model, 'lantai')->textInput() ?>
        </div>
        <div class="col-sm-2">
          <?= $form->field($model, 'blokgedung')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2">
          <?= $form->field($model, 'nogedung')->textInput() ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <?= Html::activeLabel($model, 'gedungothers', ['label'=>'Nama Gedung (Others)','id'=>'labelnmgedung']) ?>
          <?= $form->field($model, 'gedungothers',['showLabels'=>false])->textArea(['id'=>'gedungothers']) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model, 'jalan')->textInput(['maxlength' => true,'id'=>'jalan']) ?>
        </div>
        <div class="col-sm-3">
          <?= $form->field($model, 'blokjalan')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
          <?= $form->field($model, 'nojalan')->textInput() ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
          <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
        <?php
                    echo   $form->field($model, 'lokasitoko')->widget(Select2::classname(), [
                      'data' => ['Jalan' => 'Jalan', 'Mall' => 'Mall', 'Pasar' => 'Pasar', 'Ruko' => 'Ruko', 'S.I.S' => 'S.I.S'],
                      'options' => ['placeholder' => '- select -', 'id'=>'lokasitoko'],
                      'pluginOptions' => [
                        'allowClear' => true
                      ],
                    ]);
                    ?>
           </div>
        <div class="col-sm-6">
          <?= $form->field($model, 'bentuktoko')->radioList(['Toko' => 'Toko', 'Counter' => 'Counter'],['inline'=>true]); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <?= $form->field($model, 'luastokop')->widget(
            TouchSpin::className(),[
              'name' => 't2',
              'pluginOptions' => [
                'postfix' => 'm',
                'verticalbuttons' => true,
                'initval' => 0,
                'min' => 0,
                'max' => 100,
                'step' => 0.1,
                'decimals' => 1,
              ]
            ]); ?>
          </div>
          <div class="col-sm-3">
            <?= $form->field($model, 'luastokopl')->widget(
              TouchSpin::className(),[
                'name' => 't2',
                'pluginOptions' => [
                  'postfix' => 'm',
                  'verticalbuttons' => true,
                  'initval' => 0,
                  'min' => 0,
                  'max' => 100,
                  'step' => 0.1,
                  'decimals' => 1,
                ]
              ]); ?>
            </div>


            <div class="col-sm-6">
              <?= $form->field($model, 'jumlahlantai')->widget(
                TouchSpin::className(),[
                  'name' => 't2',
                  'pluginOptions' => [
                    'postfix' => 'lantai',
                    'verticalbuttons' => true,
                    'initval' => 1,
                    'min' => 1,
                    'max' => 100,
                    'step' => 1,
                  ]
                ]); ?>
              </div>

            </div>
            <div class="row">
              <div class="col-sm-6">
                <?= $form->field($model, 'ukurantoko')->radioList(['XL' => 'XL', 'L' => 'L', 'M' => 'M', 'S' => 'S', 'XS' => 'XS'],['inline'=>true]); ?>
              </div>
              <div class="col-sm-6">
                <?= $form->field($model, 'jumlahpegawai')->widget(
                  TouchSpin::className(),[
                    'name' => 't2',
                    'pluginOptions' => [
                      'postfix' => 'Orang',
                      'verticalbuttons' => true,
                      'initval' => 1,
                      'min' => 0,
                      'max' => 100,
                      'step' => 1,
                    ]
                  ]); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <?= $form->field($model, 'hargasewa', [
                    'addon' => [
                      'prepend' => ['content' => 'Rp', 'options'=>['class'=>'alert-success']],
                      'append' => ['content' => '/ Year'],
                    ]
                    ])->textInput() ?>
                  </div>
                  <div class="col-sm-6">
                    <?php
                    echo   $form->field($model, 'omzettoko')->widget(Select2::classname(), [
                      'data' => [
                        '< Rp 10.000.000'=>'< Rp 10.000.000',
                        'Rp 10.000.001 - Rp 25.000.000'=>'Rp 10.000.001 - Rp 25.000.000', 'Rp 25.000.001 - Rp 50.000.000'=>'Rp 25.000.001 - Rp 50.000.000', 'Rp 50.000.001 - Rp 75.000.000'=>'Rp 50.000.001 - Rp 75.000.000',
                        'Rp 75.000.001 - Rp 100.000.000'=>'Rp 75.000.001 - Rp 100.000.000',
                        'Rp 100.000.001 - Rp 250.000.000'=>'Rp 100.000.001 - Rp 250.000.000',
                        'Rp 250.000.001 - Rp 500.000.000'=>'Rp 250.000.001 - Rp 500.000.000',
                        'Rp 500.000.001 - Rp 750.000.000'=>'Rp 500.000.001 - Rp 750.000.000',
                        'Rp 750.000.001 - Rp 1.500.000.000'=>'Rp 750.000.001 - Rp 1.500.000.000',
                        '> Rp 1.500.000.001'=>'> Rp 1.500.000.001',
                      ],
                      'options' => ['placeholder' => '- select -', 'id'=>'provinceid'],
                      'pluginOptions' => [
                        'allowClear' => true
                      ],
                    ]);
                    ?>


                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6" style="font-size=8px;">
                    <?= $form->field($model, 'buktikedatangan')->radioList(['Kartu Nama' => 'Kartu Nama', 'Stampel' => 'Stampel', 'Kwitansi' => 'Kwitansi', 'Brosur' => 'Brosur', 'Photo' => 'Photo'],['inline'=>true, 'class'=>'form-size']); ?>
                  </div>
                  <div class="col-sm-6">
                    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                      'options'=>['accept'=>'image/*'],
                      'pluginOptions'=>[
                        'allowedFileExtensions'=>['jpg','gif','png'],
                        'initialPreview'=>[
                                $model->photo ? Html::img(Yii::$app->basePath.'/uploads/'.$model->photo,['width' => '200px']):null
                				],
                        'showPreview' => false,
                        'showRemove' => false,
                				'showUpload' => false,
                      ]
                    ]); ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3">

                    <?= $form->field($model, 'usiatoko')->widget(
                      TouchSpin::className(),[
                        'name' => 't2',
                        'pluginOptions' => [
                          'postfix' => 'Year',
                          'verticalbuttons' => true,
                          'initval' => 0,
                          'min' => 0,
                          'max' => 100,
                          'step' => 0.1,
                          'decimals' => 1,
                        ]
                      ]); ?>

                    </div>
                    <div class="col-sm-3">
                      <?= $form->field($model, 'namaresponden')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-sm-6">
                      <?= $form->field($model, 'longitude')->textInput() ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <?php
		          echo   $form->field($model, 'statustoko')->widget(Select2::classname(), [
		            'data' => ['Panel' => 'Panel', 'Non Panel' => 'Non Panel'],
		            'options' => ['placeholder' => '- select -','id'=>'statustoko'],
		            'pluginOptions' => [
		              'allowClear' => true],
		            
		          ]);
		          ?>
                    </div>

                    <div class="col-sm-3">
                      <?= $form->field($model, 'gsnr')->textInput(['id'=>'gnsr']) ?> 
		
                    </div>

                    <div class="col-sm-6">
                      <?= $form->field($model, 'lat')->textInput() ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <?= $form->field($model, 'kasir')->widget(
                        TouchSpin::className(),[
                          'name' => 't2',
                          'pluginOptions' => [
                            'postfix' => 'Unit',
                            'verticalbuttons' => true,
                            'initval' => 0,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                            'decimals' => 1,
                          ]
                        ]); ?>

                    </div>
                    <div class="col-sm-3">
                      <?= $form->field($model, 'software')->radioList(['Yes' => 'Yes', 'No' => 'No'],['inline'=>true]); ?>
                    </div>
                    <div class="col-sm-6">
                      <?= $form->field($model, 'kendaraan')->widget(
                        TouchSpin::className(),[
                          'name' => 't2',
                          'pluginOptions' => [
                            'postfix' => 'Unit',
                            'verticalbuttons' => true,
                            'initval' => 0,
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                            'decimals' => 1,
                          ]
                        ]); ?>

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
