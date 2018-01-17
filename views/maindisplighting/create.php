<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindisplighting */

$this->title = 'Create Lighting';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindisplighting-create">

    <?= $this->render('_form', [
        'model' => $model,
        'modeltemp' => $modeltemp,
    ]) ?>

</div>
