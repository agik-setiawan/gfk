<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispaudioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispaudio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pdisplayaudid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'lg') ?>

    <?= $form->field($model, 'sharp') ?>

    <?php // echo $form->field($model, 'panasonic') ?>

    <?php // echo $form->field($model, 'polytron') ?>

    <?php // echo $form->field($model, 'samsung') ?>

    <?php // echo $form->field($model, 'sony') ?>

    <?php // echo $form->field($model, 'gmc') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
