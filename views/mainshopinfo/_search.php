<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MainshopinfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mainshopinfo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'shopinfoid') ?>

    <?= $form->field($model, 'questid') ?>

    <?= $form->field($model, 'namatoko') ?>

    <?= $form->field($model, 'merktunggal') ?>

    <?= $form->field($model, 'namagedung') ?>

    <?php // echo $form->field($model, 'lantai') ?>

    <?php // echo $form->field($model, 'blokgedung') ?>

    <?php // echo $form->field($model, 'nogedung') ?>

    <?php // echo $form->field($model, 'jalan') ?>

    <?php // echo $form->field($model, 'blokjalan') ?>

    <?php // echo $form->field($model, 'nojalan') ?>

    <?php // echo $form->field($model, 'telp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'lokasitoko') ?>

    <?php // echo $form->field($model, 'bentuktoko') ?>

    <?php // echo $form->field($model, 'luastokop') ?>

    <?php // echo $form->field($model, 'luastokopl') ?>

    <?php // echo $form->field($model, 'ukurantoko') ?>

    <?php // echo $form->field($model, 'jumlahlantai') ?>

    <?php // echo $form->field($model, 'jumlahpegawai') ?>

    <?php // echo $form->field($model, 'hargasewa') ?>

    <?php // echo $form->field($model, 'omzettoko') ?>

    <?php // echo $form->field($model, 'buktikedatangan') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'usiatoko') ?>

    <?php // echo $form->field($model, 'namaresponden') ?>

    <?php // echo $form->field($model, 'statustoko') ?>

    <?php // echo $form->field($model, 'gsnr') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'kasir') ?>

    <?php // echo $form->field($model, 'software') ?>

    <?php // echo $form->field($model, 'kendaraan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
