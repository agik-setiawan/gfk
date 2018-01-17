<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Masterkotamadya */

$this->title = $model->kotamadyaid;
$this->params['breadcrumbs'][] = ['label' => 'Masterkotamadyas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterkotamadya-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kotamadyaid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kotamadyaid], [
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
            'kotamadyaid',
            'provinceid',
            'datiid',
            'kotamadya',
        ],
    ]) ?>

</div>
