<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserloginSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Userlogins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-solid">
<div class="box-body">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="pull-right">
    <p>
        <?= Html::a('Create new', ['site/signup'], ['class' => 'btn btn-success']) ?>
    </p>
</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
            
            [
              'attribute' => 'groupuser',
              'format' => 'html',
              'value' => function ($model) {
                return ($model->groupuser==1)?'Administrator':(($model->groupuser==2)?'Admin Lev 2':'DE');
              },
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'groupuser',
                'data' => ['1'=>'Administrator', '2'=>'Admin Lev 2', '3'=>'DE'],
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{update} {delete} {changepass}',
            'buttons' => [
                'changepass' => function($url, $model, $key) {     // render your custom button
                    return Html::a('', ['changepass', 'id'=>$model->id],['class'=>'fa fa-key']);
                }
            ]
            
            ],
        ],
    ]); ?>
</div>
</div>
