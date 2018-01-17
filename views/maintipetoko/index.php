<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintipetokoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maintipetokos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-solid">
<div class="box-body">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="pull-right">
    <p>
        <?= Html::a('Create new', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mtipetokoid',
            'questid',
            'cattokoid',
            'tipetokoid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
