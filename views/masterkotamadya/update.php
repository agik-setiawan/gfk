<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masterkotamadya */

$this->title = 'Update Masterkotamadya: ' . $model->kotamadyaid;
$this->params['breadcrumbs'][] = ['label' => 'Masterkotamadyas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kotamadyaid, 'url' => ['view', 'id' => $model->kotamadyaid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterkotamadya-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
