<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masterdesa */

$this->title = $model->desaid;
$this->params['breadcrumbs'][] = ['label' => 'Masterdesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterdesa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->desaid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->desaid], [
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
            'desaid',
            'provinceid',
            'dati',
            'kotamadyaid',
            'kecamatanid',
            'desa',
            'kodepos',
        ],
    ]) ?>

</div>
