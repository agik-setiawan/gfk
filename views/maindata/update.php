<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindata */

$this->title = 'Update Questionnaire: ' . $model->quescode;
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->quescode, 'url' => ['view', 'id' => $model->questid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindata-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
