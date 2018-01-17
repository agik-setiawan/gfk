<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindispphotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maindispphotos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispphoto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Maindispphoto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'photoid',
            'questid',
            'description',
            'canon',
            'nikon',
            // 'samsung',
            // 'olympus',
            // 'fujifilm',
            // 'tamron',
            // 'sony',
            // 'others',
            // 'totalunit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
