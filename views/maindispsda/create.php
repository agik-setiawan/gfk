<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispsda */

$this->title = 'Create SDA';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispsda-create">



      <?= $this->render('_form', [
          'model' => $model,
          'modeltemp' => $modeltemp,
      ]) ?>


</div>
