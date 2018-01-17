<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispphoto */

$this->title = 'Product Display Photo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispphoto-view">

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
                <th style="width: 40px">Canon</th>
                <th style="width: 40px">Nikon</th>
                <th style="width: 40px">Samsung</th>
                <th style="width: 40px">Olympus</th>
                <th style="width: 40px">Fujifilm</th>
                <th style="width: 40px">Tamron</th>
                <th style="width: 40px">Sony</th>
                <th style="width: 40px">Others</th>
                <th style="width: 40px">Total Unit</th>
              </tr>
              <?php foreach ($model as $key => $value) {?>
                <tr>
                  <td><?php echo $key+1;?></td>
                  <td><?php echo $value->description;?></td>

                  <td><?php if ($value->canon ==1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)"; $color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->nikon == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  </td>
                  <td><?php if ($value->samsung == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->olympus == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->fujifilm == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->tamron == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                  ?><span class="badge <?php echo $color;?>"><?php
                  echo "<i class='".$res."'></i>"?></span>
                  </td>
                  <td><?php if ($value->sony == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
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
