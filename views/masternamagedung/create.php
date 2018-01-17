<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Masternamagedung */

$this->title = 'Create Masternamagedung';
$this->params['breadcrumbs'][] = ['label' => 'Masternamagedungs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masternamagedung-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
