<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispitcomp */

$this->title = 'Create IT Components';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitcomp-create">



      <?= $this->render('_form', [
          'model' => $model,
          'modeltemp' => $modeltemp,
      ]) ?>


</div>
