<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindisphomeent */

$this->title = 'Create Home Entertaintment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindisphomeent-create">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>


</div>
