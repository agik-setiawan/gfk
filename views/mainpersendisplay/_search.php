<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MainpersendisplaySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mainpersendisplay-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pdisplayid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'audiovisual') ?>

    <?= $form->field($model, 'homeentertaint') ?>

    <?= $form->field($model, 'sda') ?>

    <?php // echo $form->field($model, 'mda') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'it') ?>

    <?php // echo $form->field($model, 'telecom') ?>

    <?php // echo $form->field($model, 'auto') ?>

    <?php // echo $form->field($model, 'lighting') ?>

    <?php // echo $form->field($model, 'other') ?>

    <?php // echo $form->field($model, 'itdpcppc') ?>

    <?php // echo $form->field($model, 'peripherals') ?>

    <?php // echo $form->field($model, 'accessories') ?>

    <?php // echo $form->field($model, 'component') ?>

    <?php // echo $form->field($model, 'networking') ?>

    <?php // echo $form->field($model, 'othersit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
