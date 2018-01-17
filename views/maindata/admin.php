<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $admin app\models\Administration */


?>
<div class="administration-view">
<?php if ($admin){ ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $admin->admid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $admin->admid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $admin,
        'attributes' => [
            'admid',
            'questid',
            'date',
            'interviewer',
            'teamleader',
            'dataentry',
        ],
    ]) ?>
<?php }else{ echo '<div class="callout callout-info">
  <h4>No data found!</h4> </div>';
echo Html::a('Create new data', ['createadm', 'id' => $model->questid], ['class' => 'btn btn-primary']);
echo "</div>";} ?>
</div>
