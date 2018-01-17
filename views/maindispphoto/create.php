<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispphoto */

$this->title = 'Create Photo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispphoto-create">



      <?= $this->render('_form', [
          'model' => $model,
          'modeltemp' => $modeltemp,
      ]) ?>


</div>
