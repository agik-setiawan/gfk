<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masternamagedung */

$this->title = $model->nmgedungid;
$this->params['breadcrumbs'][] = ['label' => 'Masternamagedungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masternamagedung-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nmgedungid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nmgedungid], [
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
            'nmgedungid',
            'provinceid',
            'namagedung',
        ],
    ]) ?>

</div>
