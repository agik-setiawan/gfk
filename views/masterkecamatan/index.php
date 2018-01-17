<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterkecamatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masterkecamatans';
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

            [
              'attribute' => 'provinceid',
              'value' => 'province.province',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'provinceid',
                'data' => ArrayHelper::map(Masterprovince::find()->all(), 'provinceid', 'province'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            'dati',
            [
              'attribute' => 'kotamadyaid',
              'value' => 'kotamadya.kotamadya',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kotamadyaid',
                'data' => ArrayHelper::map(Masterkotamadya::find()->all(), 'kotamadyaid', 'kotamadya'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],

            'kecamatan',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
</div>
