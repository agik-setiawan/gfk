<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispopsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispops';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispops-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dipsopsid',
            'questid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
