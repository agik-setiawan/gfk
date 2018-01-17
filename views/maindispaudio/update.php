<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispaudio */

$this->title = 'Update  ';
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindispaudio-update">


    <?= $this->render('_form', [
        'model' => $model,
        'modeltemp' => $modeltemp,
    ]) ?>

</div>
