<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maintipetoko */

$this->title = 'Create Tipe Toko';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maintipetoko-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
