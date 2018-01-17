<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainpersendisplay */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = ['label' => $model->pdisplayid, 'url' => ['view', 'id' => $model->questid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainpersendisplay-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
