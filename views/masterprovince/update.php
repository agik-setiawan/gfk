<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masterprovince */

$this->title = 'Update Masterprovince: ' . $model->provinceid;
$this->params['breadcrumbs'][] = ['label' => 'Masterprovinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->provinceid, 'url' => ['view', 'id' => $model->provinceid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterprovince-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
