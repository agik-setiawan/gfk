<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;

/* @var $this yii\web\View */
/* @var $model app\models\Masternamagedung */
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

    <?= $form->field($model, 'namagedung')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
