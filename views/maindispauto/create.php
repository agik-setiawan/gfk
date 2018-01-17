<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispauto */

$this->title = 'Create Auto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispauto-create">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>


</div>
