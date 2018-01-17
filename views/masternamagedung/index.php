<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MasternamagedungSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nama Gedung';
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

            // 'nmgedungid',
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
            'namagedung',

            ['class' => 'yii\grid\ActionColumn','template'=>'{update} {delete}'],
        ],
    ]); ?>
</div>
</div>
