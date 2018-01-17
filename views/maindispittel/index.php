<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispittelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispittels';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispittel-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispittel', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ittelid',
            'questid',
            'description',
            'oppo',
            'mi',
            // 'lenovo',
            // 'samsung',
            // 'advan',
            // 'nokia',
            // 'asus',
            // 'others',
            // 'totalunit',
            // 'totalunitcheck',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
