<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maintipetoko */

$this->title = $model->tipetoko->tipetoko;
// $this->title = $model->tipetokoid;
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->questid], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->identity->groupuser !=2 ){ echo Html::a('Delete', ['delete', 'id' => $model->questid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]);} ?>
    </p>
    <div class="box box-solid">
    <div class="box-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'mtipetokoid',
            // 'questid',
            [                      // the owner name of the model
            'label' => 'Category Toko',
            'value' => $model->cattoko->category,
        ],
        [                      // the owner name of the model
            'label' => 'Tipe Toko',
            'value' => $model->tipetoko->tipetoko,
        ],
        ],
    ]) ?>

</div>


</div>
<?php if (!$model->statusok){?>
  <div class="callout callout-danger">
                  <h4>Warning!</h4>

                  <p><?php echo $model->message; ?></p>
                </div>


  <?php }?>
