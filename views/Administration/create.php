<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Administration */

$this->title = 'Create Administration';
$this->params['breadcrumbs'][] = ['label' => 'Administrations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="administration-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
