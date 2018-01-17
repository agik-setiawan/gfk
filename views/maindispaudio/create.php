<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispaudio */

$this->title = 'Create Display Audio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispaudio-create">



    <?= $this->render('_form', [
        'model' => $model,
        'modeltemp' => $modeltemp,
    ]) ?>

</div>
