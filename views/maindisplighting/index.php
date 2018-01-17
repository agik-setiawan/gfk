<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindisplightingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindisplightings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindisplighting-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindisplighting', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lightingid',
            'questid',
            'omi',
            'philips',
            'hannochs',
            // 'panasonic',
            // 'osram',
            // 'atama',
            // 'others',
            // 'totalunit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
