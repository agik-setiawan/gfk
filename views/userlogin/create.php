<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Userlogin */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'User login', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userlogin-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
