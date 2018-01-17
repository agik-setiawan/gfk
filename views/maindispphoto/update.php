<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispphoto */

$this->title = 'Update';
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindispphoto-update">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>
</div>
