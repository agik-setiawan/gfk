<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispitaccntel */

$this->title = 'Product Display IT Acc & Telecom';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispitaccntel-view">

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
                <th style="width: 40px">Votre</th>
                <th style="width: 40px">Genius</th>
                <th style="width: 40px">Logitech</th>
                <th style="width: 40px">Western digital</th>
                <th style="width: 40px">Eyota</th>
                <th style="width: 40px">Toshiba</th>
                <th style="width: 40px">Vgen</th>
                <th style="width: 40px">Hp</th>
                <th style="width: 40px">Kingston</th>
                <th style="width: 40px">Sandisk</th>
                <th style="width: 40px">Advance</th>
                <th style="width: 40px">Adata</th>
                <th style="width: 40px">Others</th>
                <th style="width: 40px">Total Unit</th>
              </tr>
              <?php foreach ($model as $key => $value) {?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $value->description;?></td>

                  <td><?php if ($value->votre ==1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)"; $color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->genius == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  </td>
                  <td><?php if ($value->logitech == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->westerndigital == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->eyota == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->toshiba == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->vgen == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->hp == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->kingston == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->sandisk == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->advance == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->adata == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
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
