<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainshopinfo */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = ['label' => $model->namatoko, 'url' => ['view', 'id' => $model->questid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainshopinfo-update">


    <?= $this->render('_form', [
        'model' => $model,
        'modelmain' => $modelmain,
    ]) ?>

</div>
