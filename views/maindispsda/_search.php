<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispsdaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispsda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'sdaid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'kirin') ?>

    <?= $form->field($model, 'maspion') ?>

    <?php // echo $form->field($model, 'philips') ?>

    <?php // echo $form->field($model, 'panasonic') ?>

    <?php // echo $form->field($model, 'miyako') ?>

    <?php // echo $form->field($model, 'yongma') ?>

    <?php // echo $form->field($model, 'cosmos') ?>

    <?php // echo $form->field($model, 'unilever') ?>

    <?php // echo $form->field($model, 'ariston') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
