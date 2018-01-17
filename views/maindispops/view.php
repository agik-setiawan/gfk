<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispops */

$this->title = $model->dipsopsid;
$this->params['breadcrumbs'][] = ['label' => 'Maindispops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispops-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dipsopsid], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dipsopsid',
            'questid',
        ],
    ]) ?>

</div>
