<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispitnet */

$this->title = 'Product Display IT Networking';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitnet-view">

  <h1><?= Html::encode($this->title) ?></h1>

  <p>
      <?= Html::a('Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>
      
  </p>
  <div class="box box-solid">
    <div style="width:100%; overflow:scroll;">
  <div class="box-body">
    <table class="table">
              <tr>
                <th style="width: 10px">#</th>
                <th style="width: 100px">Product Displays</th>
                <th style="width: 40px">Displays</th>
              </tr>
              <?php foreach ($model as $key => $value) {?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $value->description;?></td>

                  <td><?php if ($value->display ==1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)"; $color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>


                </tr>
              <?php } ?>


            </table>


</div>
</div>
</div>
