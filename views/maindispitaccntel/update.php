<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispitaccntel */

$this->title = 'Update IT Acc & Telecom';
?>
<div class="maindispitaccntel-update">
    <?= $this->render('_form', [
      'model' => (empty($model)) ? [new Maindispitaccntel()] : $model,
      'modeltemp' => $modeltemp,
    ]) ?>

</div>
