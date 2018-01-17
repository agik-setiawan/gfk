<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindispphotoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispphoto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'photoid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'canon') ?>

    <?= $form->field($model, 'nikon') ?>

    <?php // echo $form->field($model, 'samsung') ?>

    <?php // echo $form->field($model, 'olympus') ?>

    <?php // echo $form->field($model, 'fujifilm') ?>

    <?php // echo $form->field($model, 'tamron') ?>

    <?php // echo $form->field($model, 'sony') ?>

    <?php // echo $form->field($model, 'others') ?>

    <?php // echo $form->field($model, 'totalunit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
