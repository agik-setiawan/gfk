<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userlogin-form">

    <?php $form = ActiveForm::begin(); ?>

     		<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>
                
                <?= $form->field($model, 'groupuser')-> dropDownList(['1'=>'administrator', '2'=>'Admin Lev 2', '3'=>'DE']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
