<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindisphomeent */

$this->title = 'Pruduct Display Home Entertaintment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindisphomeent-view">

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
                <th style="width: 40px">Display</th>
              </tr>
              <?php foreach ($model as $key => $value) {?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $value->description;?></td>


                  <td><?php if ($value->totalunitcheck == 1){ $res = "fa fa-check-square-o";$color="bg-green";
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span><?php }else{echo $value->totalunit;}?>
                  </td>


                </tr>
              <?php } ?>


            </table>


</div>
</div>
</div>
