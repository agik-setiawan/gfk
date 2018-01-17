<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispitaccntelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispitaccntel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itacctelid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'votre') ?>

    <?= $form->field($model, 'genius') ?>

    <?php // echo $form->field($model, 'logitech') ?>

    <?php // echo $form->field($model, 'westerndigital') ?>

    <?php // echo $form->field($model, 'eyota') ?>

    <?php // echo $form->field($model, 'toshiba') ?>

    <?php // echo $form->field($model, 'vgen') ?>

    <?php // echo $form->field($model, 'hp') ?>

    <?php // echo $form->field($model, 'kingston') ?>

    <?php // echo $form->field($model, 'sandisk') ?>

    <?php // echo $form->field($model, 'advance') ?>

    <?php // echo $form->field($model, 'adata') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <?php // echo $form->field($model, 'totalunitcheck') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
