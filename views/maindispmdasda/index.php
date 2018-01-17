<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispmdasdaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispmdasdas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispmdasda-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispmdasda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mdasdaid',
            'questid',
            'description',
            'lg',
            'sharp',
            // 'panasonic',
            // 'polytron',
            // 'samsung',
            // 'aqua',
            // 'rinai',
            // 'others',
            // 'totalunit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
