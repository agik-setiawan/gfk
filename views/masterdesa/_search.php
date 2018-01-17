<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MasterdesaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="masterdesa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'desaid') ?>

    <?= $form->field($model, 'provinceid') ?>

    <?= $form->field($model, 'datiid') ?>

    <?= $form->field($model, 'kotamadyaid') ?>

    <?= $form->field($model, 'kecamatanid') ?>

    <?php // echo $form->field($model, 'desa') ?>

    <?php // echo $form->field($model, 'kodepos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
