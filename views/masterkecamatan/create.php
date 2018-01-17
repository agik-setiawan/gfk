<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Masterkecamatan */

$this->title = 'Create Masterkecamatan';
$this->params['breadcrumbs'][] = ['label' => 'Masterkecamatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="masterkecamatan-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
