<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindata */

$this->title = 'Create Questionnaire';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindata-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
