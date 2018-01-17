<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaintipetokoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maintipetoko-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'mtipetokoid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'cattokoid') ?>

    <?= $form->field($model, 'tipetokoid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
