<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispautoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispauto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'autoid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'dunlop') ?>

    <?= $form->field($model, 'hankook') ?>

    <?php // echo $form->field($model, 'goodyear') ?>

    <?php // echo $form->field($model, 'bridgestone') ?>

    <?php // echo $form->field($model, 'accelera') ?>

    <?php // echo $form->field($model, 'gtradial') ?>

    <?php // echo $form->field($model, 'achilles') ?>

    <?php // echo $form->field($model, 'ahm') ?>

    <?php // echo $form->field($model, 'federal') ?>

    <?php // echo $form->field($model, 'pertamina') ?>

    <?php // echo $form->field($model, 'yamalube') ?>

    <?php // echo $form->field($model, 'castrol') ?>

    <?php // echo $form->field($model, 'shell') ?>

    <?php // echo $form->field($model, 'top1') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
