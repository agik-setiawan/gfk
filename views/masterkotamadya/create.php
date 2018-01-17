<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Masterkotamadya */

$this->title = 'Create Masterkotamadya';
$this->params['breadcrumbs'][] = ['label' => 'Masterkotamadyas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterkotamadya-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
