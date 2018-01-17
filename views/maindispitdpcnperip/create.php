<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispitdpcnperip */

$this->title = 'Create IT (DPC/PPC) & Peripherals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitdpcnperip-create">



      <?= $this->render('_form', [
          'model' => $model,
          'modeltemp' => $modeltemp,
      ]) ?>


</div>
