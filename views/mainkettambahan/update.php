<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mainkettambahan */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = ['label' => $model->kettambahanid, 'url' => ['view', 'id' => $model->questid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mainkettambahan-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
