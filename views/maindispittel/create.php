<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispittel */

$this->title = 'Create Telecom';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispittel-create">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>

</div>
