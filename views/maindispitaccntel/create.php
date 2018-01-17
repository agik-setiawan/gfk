<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispitaccntel */

$this->title = 'Create IT Acc & Telecom';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitaccntel-create">

    <?= $this->render('_form', [
      'model' => (empty($model)) ? [new Maindispitaccntel()] : $model,
      'modeltemp' => $modeltemp,
    ]) ?>

</div>
