<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mainpersendisplay */

$this->title = 'Create Persentase Display';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainpersendisplay-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
