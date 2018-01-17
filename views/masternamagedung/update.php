<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masternamagedung */

$this->title = 'Update Masternamagedung: ' . $model->nmgedungid;
$this->params['breadcrumbs'][] = ['label' => 'Masternamagedungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nmgedungid, 'url' => ['view', 'id' => $model->nmgedungid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masternamagedung-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
