<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispittelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispittel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ittelid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'oppo') ?>

    <?= $form->field($model, 'mi') ?>

    <?php // echo $form->field($model, 'lenovo') ?>

    <?php // echo $form->field($model, 'samsung') ?>

    <?php // echo $form->field($model, 'advan') ?>

    <?php // echo $form->field($model, 'nokia') ?>

    <?php // echo $form->field($model, 'asus') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <?php // echo $form->field($model, 'totalunitcheck') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
