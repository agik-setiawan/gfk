<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispops */

$this->title = 'Update Maindispops: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Maindispops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dipsopsid, 'url' => ['view', 'id' => $model->dipsopsid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maindispops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
