<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispitdpcnperipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispitdpcnperips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitdpcnperip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispitdpcnperip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'itdpcid',
            'questid',
            'description',
            'hp',
            'acer',
            // 'samsung',
            // 'advan',
            // 'lenovo',
            // 'asus',
            // 'canon',
            // 'fujixerox',
            // 'panasonic',
            // 'brother',
            // 'epson',
            // 'others',
            // 'totalunit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
