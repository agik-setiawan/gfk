<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispops */

$this->title = 'Create Maindispops';
$this->params['breadcrumbs'][] = ['label' => 'Maindispops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
