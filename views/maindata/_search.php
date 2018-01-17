<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaindataSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindata-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'quescode') ?>

    <?= $form->field($model, 'nopeta') ?>

    <?= $form->field($model, 'createdby') ?>

    <?= $form->field($model, 'createdon') ?>

    <?php // echo $form->field($model, 'lastmodifiedby') ?>

    <?php // echo $form->field($model, 'lastmodifiedon') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
