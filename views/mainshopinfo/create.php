<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mainshopinfo */

$this->title = 'Create Shop Information';
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainshopinfo-create">



    <?= $this->render('_form', [
        'model' => $model,
        'modelmain' => $modelmain,
    ]) ?>

</div>
