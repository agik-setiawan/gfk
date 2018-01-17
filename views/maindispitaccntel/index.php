<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispitaccntelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispitaccntels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitaccntel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispitaccntel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'itacctelid',
            'questid',
            'description',
            'votre',
            'genius',
            // 'logitech',
            // 'westerndigital',
            // 'eyota',
            // 'toshiba',
            // 'vgen',
            // 'hp',
            // 'kingston',
            // 'sandisk',
            // 'advance',
            // 'adata',
            // 'others',
            // 'totalunit',
            // 'totalunitcheck',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
