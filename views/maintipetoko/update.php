<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Maintipetoko */

$this->title = 'Update';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = ['label' => $model->mtipetokoid, 'url' => ['view', 'id' => $model->questid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="maintipetoko-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
