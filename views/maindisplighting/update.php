<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindisplighting */

$this->title = 'Update';

$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindisplighting-update">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>
</div>
