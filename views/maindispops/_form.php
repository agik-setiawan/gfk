<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispops */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maindispops-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dipsopsid')->textInput() ?>

    <?= $form->field($model, 'questid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
