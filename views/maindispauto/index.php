<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispautoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispautos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispauto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispauto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'autoid',
            'questid',
            'description',
            'dunlop',
            'hankook',
            // 'goodyear',
            // 'bridgestone',
            // 'accelera',
            // 'gtradial',
            // 'achilles',
            // 'ahm',
            // 'federal',
            // 'pertamina',
            // 'yamalube',
            // 'castrol',
            // 'shell',
            // 'top1',
            // 'others',
            // 'totalunit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
