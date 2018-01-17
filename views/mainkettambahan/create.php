<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mainkettambahan */

$this->title = 'Create Keterangan Tambahan';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainkettambahan-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
