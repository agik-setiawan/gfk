<?php
use app\models\Maindata;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\Mastertipetoko;


/* @var $this yii\web\View */

$this->title = 'GFK - Questionnaire';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1 class="text-red"><?php echo count($maindata); ?></h1>
        <p class="lead">Total Questionnaire Data.</p>
    </div>
    <div class="row">
	<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($maindatabprov);?></h3>

              <p>Province from <?php echo count(Masterprovince::find()->all()); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
            
          </div>
          <div class="box box-solid">
          <table class="table table-striped">
                <tbody>
                <?php foreach($maindatabprov as $no=>$data){?>
                <tr>
                  <td><?php echo $no+1; ?></td>
                  <td><?php
                  $provincename =  Masterprovince::findOne($data->provinceid);
                  echo $provincename->province; 
                  ?></td>
                  <td align="right"><b class="text-red">
                  <?php
                  $byprov =  Maindata::find()->where(['provinceid'=>$data->provinceid])->all();
                  echo count($byprov); 
                  ?>
                  </b></td>
                </tr>
               <?php }?>
              </tbody></table>
              </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($maindatabkota);?></h3>

              <p>District/City from <?php echo count(Masterkotamadya::find()->all()); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
          </div>
          <div class="box box-solid">
          <table class="table table-striped">
                <tbody>
                <?php foreach($maindatabkota as $no=>$data){?>
                <tr>
                  <td><?php echo $no+1; ?></td>
                  <td><?php
                  $kotamadname =  Masterkotamadya::findOne($data->kotamadyaid);
                  echo $kotamadname->kotamadya; 
                  ?></td>
                  <td align="right"><b class="text-red">
                  <?php
                  $bykota =  Maindata::find()->where(['kotamadyaid'=>$data->kotamadyaid])->all();
                  echo count($bykota); 
                  ?>
                  </b></td>
                </tr>
               <?php }?>
              </tbody></table>
              </div>
        </div>
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($maindatabtt);?></h3>

              <p>Shop Type from <?php echo count(Mastertipetoko::find()->all()); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
         </div>
         <div class="box box-solid">
          <table class="table table-striped">
                <tbody>
                <?php 
                $noindex == 0;
                foreach($maindatabtt as $data){
                if($data->tipetokoid != null){
                ?>
		<tr>
                <td><?php echo $noindex; ?></td>                
                  
                  <td><?php
                  $tipetoko =  Mastertipetoko::findOne($data->tipetokoid);
                  echo $tipetoko->tipetoko; 
                  ?></td>
                  <td align="right"><b class="text-red">
                  <?php
                  $bytipetk =  Maindata::find()->where(['tipetokoid'=>$data->tipetokoid])->all();
                  echo count($bytipetk); 
                  
                  ?>
                  </b></td>
                </tr>
               <?php }
               $noindex=$noindex+1;
               }?>
              </tbody></table>
              </div>     
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo count($maindatabde);?></h3>

              <p>Data Entry</p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
          </div>
          <div class="box box-solid">
          <table class="table table-striped">
                <tbody>
                <?php 
                $noindexa == 1;
                foreach($maindatabde as $data){
                $noindexa=$noindexa+1;
                ?>
		<tr>
                <td><?php echo $noindexa; ?></td>                
                  
                  <td><?php
                  
                  echo $data->dataentry; 
                  ?></td>
                  <td align="right"><b class="text-red">
                  <?php
                  $bydataentry =  Maindata::find()->where(['dataentry'=>$data->dataentry])->all();
                  echo count($bydataentry); 
                  
                  ?>
                  </b></td>
                </tr>
               <?php 
               
               }?>
              </tbody></table>
              </div>   
        </div>
        </div>
</div>
