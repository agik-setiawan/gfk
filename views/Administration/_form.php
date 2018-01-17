<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Administration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="administration-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'questid')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'interviewer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teamleader')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataentry')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
