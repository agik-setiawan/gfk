<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispitnet */

$this->title = 'Create IT Networking';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitnet-create">


      <?= $this->render('_form', [
          'model' => $model,
          'modeltemp' => $modeltemp,
      ]) ?>


</div>
