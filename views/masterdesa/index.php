<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\Masterkecamatan;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasterdesaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masterdesas';
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

            // 'desaid',
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
            [
              'attribute' => 'kecamatanid',
              'value' => 'kecamatan.kecamatan',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kecamatanid',
                'data' => ArrayHelper::map(Masterkecamatan::find()->all(), 'kecamatanid', 'kecamatan'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            'desa',
            'kodepos',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
</div>
