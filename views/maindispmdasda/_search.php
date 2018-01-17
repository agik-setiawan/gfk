<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispmdasdaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispmdasda-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mdasdaid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'lg') ?>

    <?= $form->field($model, 'sharp') ?>

    <?php // echo $form->field($model, 'panasonic') ?>

    <?php // echo $form->field($model, 'polytron') ?>

    <?php // echo $form->field($model, 'samsung') ?>

    <?php // echo $form->field($model, 'aqua') ?>

    <?php // echo $form->field($model, 'rinai') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
