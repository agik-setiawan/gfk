<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masterkecamatan */

$this->title = $model->kecamatanid;
$this->params['breadcrumbs'][] = ['label' => 'Masterkecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterkecamatan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kecamatanid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kecamatanid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kecamatanid',
            'provinceid',
            'datiid',
            'kotamadyaid',
            'kecamatan',
        ],
    ]) ?>

</div>
