<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Mainshopinfo */

$this->title = $model->namatoko;
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
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
         [
       		'attribute' => 'photo',
                'format' => 'raw',
                'value' => //function($model) {
			//return Html::img('../uploads'.'/'.$model->photo, ['width' => '120']);
			
			// Html::img(Yii::$app->basePath.'/uploads/'.$model->photo, ['width' => '120']),
			Html::a(Html::img('fototoko/small_'.$model->photo),'fototoko/'.$model->photo,['target'=>'_blank']),
			
			//}
			],
			
		
            'namatoko',
            'merktunggal',
            'namagedung',
            'lantai',
            'blokgedung',
            'nogedung',
            'jalan',
            'blokjalan',
            'nojalan',
            'telp',
            'email:email',
            'lokasitoko',
            'bentuktoko',
            'luastokop',
            'luastokopl',
            'ukurantoko',
            'jumlahlantai',
            'jumlahpegawai',
            'hargasewa',
            'omzettoko',
            'buktikedatangan',
            //'photo',
            'usiatoko',
            'namaresponden',
            'statustoko',
            'gsnr',
            'longitude',
            'lat',
            'kasir',
            'software',
            'kendaraan',
        ],
    ]) ?>

</div>
</div>
