<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispmdasda */

$this->title = 'Create MDA';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispmdasda-create">

  <?= $this->render('_form', [
      'model' => $model,
      'modeltemp' => $modeltemp,
  ]) ?>
</div>
