<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindisphomeentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindisphomeents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindisphomeent-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindisphomeent', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'homeenid',
            'questid',
            'description',
            'display',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
