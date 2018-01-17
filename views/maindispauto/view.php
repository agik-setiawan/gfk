<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispauto */

$this->title = 'Product Display Auto';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispauto-view">

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
                <th style="width: 40px">Dunlop</th>
                <th style="width: 40px">Hankook</th>
                <th style="width: 40px">Goodyear</th>
                <th style="width: 40px">Bridgestone</th>
                <th style="width: 40px">Accelera</th>
                <th style="width: 40px">Gtradial</th>
                <th style="width: 40px">Achilles</th>
                <th style="width: 40px">AHM</th>
                <th style="width: 40px">Federal</th>
                <th style="width: 40px">Pertamina</th>
                <th style="width: 40px">Yamalube</th>
                <th style="width: 40px">Castrol</th>
                <th style="width: 40px">Shell</th>
                <th style="width: 40px">Top 1</th>
                <th style="width: 40px">Others</th>
                <th style="width: 40px">Total Unit</th>
              </tr>
              <?php foreach ($model as $key => $value) {?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $value->description;?></td>

                  <td><?php if ($value->dunlop ==1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)"; $color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->hankook == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  </td>
                  <td><?php if ($value->goodyear == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->bridgestone == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->accelera == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->gtradial == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->achilles == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->ahm == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->federal == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->pertamina == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->yamalube == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->castrol == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->shell == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->top1 == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php echo $value->others;?></td>
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
