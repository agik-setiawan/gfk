<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masterdesa */

$this->title = 'Update Masterdesa: ' . $model->desaid;
$this->params['breadcrumbs'][] = ['label' => 'Masterdesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->desaid, 'url' => ['view', 'id' => $model->desaid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterdesa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
