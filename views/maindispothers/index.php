<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispothersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispothers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispothers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispothers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'othersid',
            'questid',
            'description',
            'display',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
