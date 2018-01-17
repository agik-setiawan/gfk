<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Masterkecamatan */

$this->title = 'Update Masterkecamatan: ' . $model->kecamatanid;
$this->params['breadcrumbs'][] = ['label' => 'Masterkecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kecamatanid, 'url' => ['view', 'id' => $model->kecamatanid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="masterkecamatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
