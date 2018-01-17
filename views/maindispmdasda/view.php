<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Maindispmdasda */

$this->title = 'Product Display MDA';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="maindispmdasda-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>

    </p>

    <div class="box box-solid">
    <div class="box-body">
      <table class="table">
                <tr>
                  <th style="width: 10px">#</th>
                  <th style="width: 100px">Product Displays</th>
                  <th style="width: 40px">LG</th>
                  <th style="width: 40px">Sharp</th>
                  <th style="width: 40px">Panasonic</th>
                  <th style="width: 40px">Polytron</th>
                  <th style="width: 40px">Samsung</th>
                  <th style="width: 40px">Aqua</th>
                  <th style="width: 40px">Rinai</th>
                  <th style="width: 40px">Others</th>
                  <th style="width: 40px">Total Unit</th>
                </tr>
                <?php foreach ($model as $key => $value) {?>
                  <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $value->description;?></td>

                    <td><?php if ($value->lg ==1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)"; $color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    <td><?php if ($value->sharp == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    </td>
                    <td><?php if ($value->panasonic == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    <td><?php if ($value->polytron == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    <td><?php if ($value->samsung == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    <td><?php if ($value->aqua == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
                    ?><span class="badge <?php echo $color;?>"><?php
                    echo "<i class='".$res."'></i>"?></span>
                    </td>
                    <td><?php if ($value->rinai == 1){ $res = "fa fa-check-square-o";$color="bg-green"; }else{ $res = "fa fa-remove (alias)";$color="bg-red";}
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
