<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispitdpcnperipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispitdpcnperip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itdpcid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'hp') ?>

    <?= $form->field($model, 'acer') ?>

    <?php // echo $form->field($model, 'samsung') ?>

    <?php // echo $form->field($model, 'advan') ?>

    <?php // echo $form->field($model, 'lenovo') ?>

    <?php // echo $form->field($model, 'asus') ?>

    <?php // echo $form->field($model, 'canon') ?>

    <?php // echo $form->field($model, 'fujixerox') ?>

    <?php // echo $form->field($model, 'panasonic') ?>

    <?php // echo $form->field($model, 'brother') ?>

    <?php // echo $form->field($model, 'epson') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
