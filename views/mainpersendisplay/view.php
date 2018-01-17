<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\alert\AlertBlock;
/* @var $this yii\web\View */
/* @var $model app\models\Mainpersendisplay */

$this->title = $model->questid;
$this->params['breadcrumbs'][] = ['label' => 'Questionnaire', 'url' => ['maindata/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
echo AlertBlock::widget([
	'type' => AlertBlock::TYPE_ALERT,
	'useSessionFlash' => true,
  'delay' => 10000
]);
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
      <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Displays Category</th>
                    <th colspan="2">Persentase</th>
                    <!-- <th style="width: 40px">Label</th> -->
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>Audio Visual</td>
                    <td style="width: 60%">
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->audiovisual; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->audiovisual; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Home Entertaintment</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->homeentertaint; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->homeentertaint; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>SDA</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->sda; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->sda; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>MDA</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->mda; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->mda; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>Photo</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->photo; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->photo; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>IT</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->it; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->it; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>7.</td>
                    <td>Telecom</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->telecom; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->telecom; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>8.</td>
                    <td>Auto</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->auto; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->auto; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>9.</td>
                    <td>Lighting</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->lighting; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->lighting; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>10.</td>
                    <td>Others</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->other; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->other; ?>%</span></td>
                  </tr>
                </table>

</div>
</div>
<?php if ($model->it > 0){?>
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">IT Persentase Displays</h3>
      </div>
    <div class="box-body">
      <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Displays Category</th>
                    <th colspan="2">Persentase</th>
                    <!-- <th style="width: 40px">Label</th> -->
                  </tr>
                  <tr>
                    <td>1.</td>
                    <td>IT (DPC/PPC)</td>
                    <td style="width: 60%">
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->itdpcppc; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->itdpcppc; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>2.</td>
                    <td>Peripherals</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->peripherals; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->peripherals; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>3.</td>
                    <td>Accessories</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->accessories; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->accessories; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>4.</td>
                    <td>Component</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->component; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->component; ?>%</span></td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>Networking</td>
                    <td>
                      <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-primary" style="width:<?php echo $model->networking; ?>%"></div>
                      </div>
                    </td>
                    <td><span class="badge bg-blue"><?php echo $model->networking; ?>%</span></td>
                  </tr>

                </table>

</div>
</div>
<?php } ?>
