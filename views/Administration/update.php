<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Administration */

$this->title = 'Update Administration: ' . $model->admid;
$this->params['breadcrumbs'][] = ['label' => 'Administrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admid, 'url' => ['view', 'id' => $model->admid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="administration-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
