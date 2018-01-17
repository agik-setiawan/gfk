<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindisplightingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindisplighting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'lightingid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'omi') ?>

    <?= $form->field($model, 'philips') ?>

    <?= $form->field($model, 'hannochs') ?>

    <?php // echo $form->field($model, 'panasonic') ?>

    <?php // echo $form->field($model, 'osram') ?>

    <?php // echo $form->field($model, 'atama') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
