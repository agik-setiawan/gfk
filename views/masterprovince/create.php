<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Masterprovince */

$this->title = 'Create new Province';
$this->params['breadcrumbs'][] = ['label' => 'Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterprovince-create">

    <!-- <h4><u><?= Html::encode($this->title) ?></u></h4> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
