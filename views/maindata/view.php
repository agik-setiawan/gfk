<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindata */

$this->title = $model->quescode;
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
    <?= Html::a('Update', ['update', 'id' => $model->questid], ['class' => 'btn btn-primary']) ?>
    <?php if (Yii::$app->user->identity->groupuser !=2 ){ echo Html::a('Delete', ['delete', 'id' => $model->questid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);} ?>
</p>
<div class="box box-solid">
<div class="box-body">



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'questid',
            'quescode',
            'nopeta',
            'date',
            'interviewer',
            'teamleader',
            'dataentry',
            'province.province',
            'dati',
            'kotamadya.kotamadya',
            'kecamatan.kecamatan',
            [
              
              'label'=>'Desa',
              'format' => 'raw',
              'value' => function ($model) {
                return ($model->desa->desa) ? $model->desa->desa :'Others';
              }
            ],
            'kodepos',
            'usercreate.username',
            'createdon',
            'usermodif.username',
            'lastmodifiedon',
        ],
    ]) ?>

</div>
</div>
