<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Maindispothers */

$this->title = 'Create Others ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispothers-create">


        <?= $this->render('_form', [
            'model' => $model,
            'modeltemp' => $modeltemp,
        ]) ?>

</div>
