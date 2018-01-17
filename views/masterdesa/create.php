<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Masterdesa */

$this->title = 'Create Masterdesa';
$this->params['breadcrumbs'][] = ['label' => 'Masterdesas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterdesa-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
