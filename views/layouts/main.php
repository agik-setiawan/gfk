<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use kartik\widgets\SideNav;
use yii\helpers\Url;
use app\models\Mainshopinfo;
use app\models\Mainpersendisplay;
use app\models\Maintipetoko;
use app\models\Mainkettambahan;
use app\models\Maindispaudio;
use app\models\Maindisplighting;
use app\models\Maindispmdasda;
use app\models\Maindispsda;
use app\models\Maindispauto;
use app\models\Maindispphoto;
use app\models\Maindispitdpcnperip;
use app\models\Maindispitcomp;
use app\models\Maindispitnet;
use app\models\Maindispitaccntel;
use app\models\Maindispittel;
use app\models\Maindisphomeent;
use app\models\Maindispothers;
use app\models\Maindata;
use app\models\Dispcheck;
use app\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#317EFB"/>
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>
<body>
  <?php $this->beginBody() ?>

  <div class="wrap" style="background-color:#d2d6de;">
    <?php
    NavBar::begin([
      'brandLabel' => 'UC 2017',
      'brandUrl' => Yii::$app->homeUrl,
      'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
      ],
    ]);
    echo Nav::widget([
      'options' => ['class' => 'navbar-nav navbar-right'],
      'items' => [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Questionnaire Data', 'url' => ['/maindata']],
        (Yii::$app->user->identity->groupuser == 1 || Yii::$app->user->identity->groupuser == 2)?(
        ['label' => 'Setup',
        'items' => [
          ['label' => 'Area UC', 'url' => ['/masterprovince']],
          //['label' => 'Add User', 'url' => ['/site/signup']],
          ['label' => 'User Login', 'url' => ['/userlogin']]
        ],
      ]):(''),
      
      
      Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' => ['/site/login']]
        ) : (
          '<li>'
          . Html::beginForm(['/site/logout'], 'post')
          . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
            )
          ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
          <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?php $potong = substr(Yii::$app->controller->id,0,6); //current controller id
            $potong2 = substr(Yii::$app->controller->id,0,4); //current controller id
            if ($potong === 'master') { ?>
            
              <div class="col-sm-3">
                <?php
                $type =SideNav::TYPE_INFO;
                $item = Yii::$app->controller->id;
                echo SideNav::widget([
                  'type' => $type,
                  'encodeLabels' => false,
                  'heading' => "Area UC",
                  'items' => [

                    ['label' => 'Province','url' => Url::to(['/masterprovince', 'type'=>$type]), 'active' => ($item == 'masterprovince')],
                    // ['label' => 'Dati','url' => Url::to(['/masterdati', 'type'=>$type]), 'active' => ($item == 'masterdati')],
                    ['label' => 'Kotamadya/Kabupaten','url' => Url::to(['/masterkotamadya', 'type'=>$type]), 'active' => ($item == 'masterkotamadya')],
                    ['label' => 'Kecamatan','url' => Url::to(['/masterkecamatan', 'type'=>$type]), 'active' => ($item == 'masterkecamatan')],
                    ['label' => 'Desa/Kelurahan','url' => Url::to(['/masterdesa', 'type'=>$type]), 'active' => ($item == 'masterdesa')],
                    ['label' => 'Nama Gedung','url' => Url::to(['/masternamagedung', 'type'=>$type]), 'active' => ($item == 'masternamagedung')],
                  ],
                ]);
                ?>
              </div>
              
              <div class="col-sm-9">
                <?php echo  $content ?>
              </div>
              <?php  }elseif ($potong2 === 'main' && Yii::$app->controller->action->id != 'index' && Yii::$app->controller->action->id != 'createmain') {
                ?>
                <div class="col-sm-3">

                  <!-- <?= Html::a('Create new', ['create'], ['class' => 'btn btn-success']) ?>
                </br> -->
                  <?php

                  $type =SideNav::TYPE_INFO;
                  $item = Yii::$app->controller->id;
                  $url = Yii::$app->request->url;
                  // $idmain = stristr($url,"id=");
                  $idmainistr = stristr($url ,"id=");
                  $idmain = str_replace("id=","",$idmainistr);
                  // $idmain = $url;

                  $shopinfo = Mainshopinfo::find()->where(['questid'=>$idmain])->one();
                  $persendisplay = Mainpersendisplay::find()->where(['questid'=>$idmain])->one();
                  $tipetoko = Maintipetoko::find()->where(['questid'=>$idmain])->one();
                  $maindata = maindata::find()->where(['questid'=>$idmain])->one();
                  if($tipetoko){
                  $tipetoko->checktipetoko();
                  if($tipetoko->statusok && $shopinfo){
		        $maindata->status=1;
		        $maindata->save(false);
		      }else{
		      	$maindata->status=0;
		        $maindata->save(false);
		      }
		     
                  $dispmodelaud = $tipetoko->menuCategory("Maindispaudio");
                  $dispmodellight = $tipetoko->menuCategory("Maindisplighting");
                  $dispmodelmdasda = $tipetoko->menuCategory("Maindispmdasda");
                  $dispmodelsda = $tipetoko->menuCategory("Maindispsda");
                  $dispmodelauto = $tipetoko->menuCategory("Maindispauto");
                  $dispmodelphoto = $tipetoko->menuCategory("Maindispphoto");
                  $dispmodelitdpcperip = $tipetoko->menuCategory("Maindispitdpcnperip");
                  $dispmodelitcomp = $tipetoko->menuCategory("Maindispitcomp");
                  $dispmodelitnet = $tipetoko->menuCategory("Maindispitnet");
                  $dispmodelitaccntel = $tipetoko->menuCategory("Maindispitaccntel");
                  $dispmodelittel = $tipetoko->menuCategory("Maindispittel");
                  $dispmodelhomeent = $tipetoko->menuCategory("Maindisphomeent");
                  $dispmodelothers = $tipetoko->menuCategory("Maindispothers");
		}else{
		$dispmodelaud = "";
                  $dispmodellight = "";
                  $dispmodelmdasda = "";
                  $dispmodelsda = "";
                  $dispmodelauto = "";
                  $dispmodelphoto = "";
                  $dispmodelitdpcperip = "";
                  $dispmodelitcomp = "";
                  $dispmodelitnet = "";
                  $dispmodelitaccntel = "";
                  $dispmodelittel = "";
                  $dispmodelhomeent = "";
                  $dispmodelothers = "";
		}


                  $keterangan = Mainkettambahan::find()->where(['questid'=>$idmain])->one();
                  $dispaud = Maindispaudio::find()->where(['questid'=>$idmain])->one();
                  $displight = Maindisplighting::find()->where(['questid'=>$idmain])->one();
                  $dispmdasda = Maindispmdasda::find()->where(['questid'=>$idmain])->one();
                  $dispsda = Maindispsda::find()->where(['questid'=>$idmain])->one();
                  $dispauto = Maindispauto::find()->where(['questid'=>$idmain])->one();
                  $dispphoto = Maindispphoto::find()->where(['questid'=>$idmain])->one();
                  $dispitdpcperip = Maindispitdpcnperip::find()->where(['questid'=>$idmain])->one();
                  $dispitcomp = Maindispitcomp::find()->where(['questid'=>$idmain])->one();
                  $dispitnet = Maindispitnet::find()->where(['questid'=>$idmain])->one();
                  $dispitaccntel = Maindispitaccntel::find()->where(['questid'=>$idmain])->one();
                  $dispittel = Maindispittel::find()->where(['questid'=>$idmain])->one();
                  $disphomeent = Maindisphomeent::find()->where(['questid'=>$idmain])->one();
                  $dispothers = Maindispothers::find()->where(['questid'=>$idmain])->one();




                  if($shopinfo){
                    $link = '/view';
                    $iconshi = 'glyphicon glyphicon-ok';

                  }else {
                    $link = '/create';
                    $iconshi = 'glyphicon glyphicon-remove';

                  }
                  if($persendisplay){
                    $linkdisp = '/view';
                    $icondisp = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdisp = '/create';
                    $icondisp = 'glyphicon glyphicon-remove';
                  }
                  if($tipetoko && $tipetoko->statusok){
                    $linktoko = '/view';
                    $icontoko = 'glyphicon glyphicon-ok';
                  }elseif($tipetoko && !$tipetoko->statusok) {
                    $linktoko = '/view';
                    $icontoko = 'glyphicon glyphicon-remove';
                  }else {
                    $linktoko = '/create';
                    $icontoko = 'glyphicon glyphicon-remove';
                  }
                  if($keterangan){
                    $linkketerangan = '/view';
                    $iconketerangan = 'glyphicon glyphicon-ok';
                  }else {
                    $linkketerangan = '/create';
                    $iconketerangan = 'glyphicon glyphicon-remove';
                  }
                  if($dispaud){
                    $linkdispaud = '/view';
                    $icondispaud = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispaud = '/create';
                    $icondispaud = 'glyphicon glyphicon-remove';
                  }
                  if($displight){
                    $linkdisplight = '/view';
                    $icondisplight = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdisplight = '/create';
                    $icondisplight = 'glyphicon glyphicon-remove';
                  }
                  if($dispmdasda){
                    $linkdispmdasda = '/view';
                    $icondispmdasda = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispmdasda = '/create';
                    $icondispmdasda = 'glyphicon glyphicon-remove';
                  }
                  if($dispsda){
                    $linkdispsda = '/view';
                    $icondispsda = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispsda = '/create';
                    $icondispsda = 'glyphicon glyphicon-remove';
                  }
                  if($dispauto){
                    $linkdispauto = '/view';
                    $icondispauto = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispauto = '/create';
                    $icondispauto = 'glyphicon glyphicon-remove';
                  }
                  if($dispphoto){
                    $linkdispphoto = '/view';
                    $icondispphoto = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispphoto = '/create';
                    $icondispphoto = 'glyphicon glyphicon-remove';
                  }
                  if($dispitdpcperip){
                    $linkdispitdpc = '/view';
                    $icondispitdpc = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispitdpc = '/create';
                    $icondispitdpc = 'glyphicon glyphicon-remove';
                  }
                  if($dispitcomp){
                    $linkdispitcomp = '/view';
                    $icondispitcomp = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispitcomp = '/create';
                    $icondispitcomp = 'glyphicon glyphicon-remove';
                  }
                  if($dispitnet){
                    $linkdispitnet = '/view';
                    $icondispitnet = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispitnet = '/create';
                    $icondispitnet = 'glyphicon glyphicon-remove';
                  }
                  if($dispitaccntel){
                    $linkdispitaccntel = '/view';
                    $icondispitaccntel = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispitaccntel = '/create';
                    $icondispitaccntel = 'glyphicon glyphicon-remove';
                  }
                  if($dispittel){
                    $linkdispittel = '/view';
                    $icondispittel = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispittel = '/create';
                    $icondispittel = 'glyphicon glyphicon-remove';
                  }
                  if($disphomeent){
                    $linkdisphomeent = '/view';
                    $icondisphomeent = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdisphomeent = '/create';
                    $icondisphomeent = 'glyphicon glyphicon-remove';
                  }
                  if($dispothers){
                    $linkdispothers = '/view';
                    $icondispothers = 'glyphicon glyphicon-ok';
                  }else {
                    $linkdispothers = '/create';
                    $icondispothers = 'glyphicon glyphicon-remove';
                  }
                  // echo maindispaudio::getClassName();
                  

                  echo SideNav::widget([
                    'type' => $type,
                    'encodeLabels' => false,
                    'heading' => "Universe Count Questionnaire",
                    'items' => [

                      ['label' => ($maindata->status==1)?'Home <i class="text-green">(Completed)</i>':'Home <i class="text-red">(Not Completed)</i>', 'icon' => 'home','url' => Url::to(['/maindata/view', 'id'=>$idmain]), 'active' => ($item == 'maindata')],
                      ['label' => 'Shop Information', 'icon' => $iconshi,'url' => Url::to(['/mainshopinfo'.$link,'id'=>$idmain]), 'active' => ($item == 'mainshopinfo')],
                      ['label' => 'Persentase Display', 'icon' => $icondisp,'url' => Url::to(['/mainpersendisplay'.$linkdisp, 'id'=>$idmain]), 'active' => ($item == 'mainpersendisplay')],
                      ['label' => 'Tipe Toko', 'icon' => $icontoko,'url' => Url::to(['/maintipetoko'.$linktoko, 'id'=>$idmain]), 'active' => ($item == 'maintipetoko')],
                      ['label' => 'Keterangan Tambahan', 'icon' => $iconketerangan,'url' => Url::to(['/mainkettambahan'.$linkketerangan, 'id'=>$idmain]), 'active' => ($item == 'mainkettambahan')],
                      ['label' => 'Product Display & Brand', 'icon' => 'book', 'items' => [
                          ['label' => 'Audio Visual <i class="text-red">'.$dispmodelaud.'</i>', 'icon' => $icondispaud,'url' => Url::to(['/maindispaudio'.$linkdispaud, 'id'=>$idmain]), 'active' => ($item == 'maindispaudio')],
                          ['label' => 'Lighting <i class="text-red">'.$dispmodellight.'</i>', 'icon' => $icondisplight,'url' => Url::to(['/maindisplighting'.$linkdisplight, 'id'=>$idmain]), 'active' => ($item == 'maindisplighting')],
                          ['label' => 'MDA <i class="text-red">'.$dispmodelmdasda.'</i>', 'icon' => $icondispmdasda,'url' => Url::to(['/maindispmdasda'.$linkdispmdasda, 'id'=>$idmain]), 'active' => ($item == 'maindispmdasda')],
                          ['label' => 'SDA <i class="text-red">'.$dispmodelsda.'</i>', 'icon' => $icondispsda,'url' => Url::to(['/maindispsda'.$linkdispsda, 'id'=>$idmain]), 'active' => ($item == 'maindispsda')],
                          ['label' => 'Auto <i class="text-red">'.$dispmodelauto.'</i>', 'icon' => $icondispauto,'url' => Url::to(['/maindispauto'.$linkdispauto, 'id'=>$idmain]), 'active' => ($item == 'maindispauto')],
                          ['label' => 'Photo <i class="text-red">'.$dispmodelphoto.'</i>', 'icon' => $icondispphoto,'url' => Url::to(['/maindispphoto'.$linkdispphoto, 'id'=>$idmain]), 'active' => ($item == 'maindispphoto')],
                          ['label' => 'IT (DPC/PPC) & Peripheral <i class="text-red">'.$dispmodelitdpcperip.'</i>', 'icon' => $icondispitdpc,'url' => Url::to(['/maindispitdpcnperip'.$linkdispitdpc, 'id'=>$idmain]), 'active' => ($item == 'maindispitdpcnperip')],
                          ['label' => 'IT Components <i class="text-red">'.$dispmodelitcomp.'</i>', 'icon' => $icondispitcomp,'url' => Url::to(['/maindispitcomp'.$linkdispitcomp, 'id'=>$idmain]), 'active' => ($item == 'maindispitcomp')],
                          ['label' => 'IT Networking <i class="text-red">'.$dispmodelitnet.'</i>', 'icon' => $icondispitnet,'url' => Url::to(['/maindispitnet'.$linkdispitnet, 'id'=>$idmain]), 'active' => ($item == 'maindispitnet')],
                          ['label' => 'IT Acc & Telecom <i class="text-red">'.$dispmodelitaccntel.'</i>', 'icon' => $icondispitaccntel,'url' => Url::to(['/maindispitaccntel'.$linkdispitaccntel, 'id'=>$idmain]), 'active' => ($item == 'maindispitaccntel')],
                          ['label' => 'Telecom <i class="text-red">'.$dispmodelittel.'</i>', 'icon' => $icondispittel,'url' => Url::to(['/maindispittel'.$linkdispittel, 'id'=>$idmain]), 'active' => ($item == 'maindispittel')],
                          ['label' => 'Home Entertaintment <i class="text-red">'.$dispmodelhomeent.'</i>', 'icon' => $icondisphomeent,'url' => Url::to(['/maindisphomeent'.$linkdisphomeent, 'id'=>$idmain]), 'active' => ($item == 'maindisphomeent')],
                          ['label' => 'Others <i class="text-red">'.$dispmodelothers.'</i>', 'icon' => $icondispothers,'url' => Url::to(['/maindispothers'.$linkdispothers, 'id'=>$idmain]), 'active' => ($item == 'maindispothers')],


                  ]],

                    ],
                  ]);
			
                  ?>
                </div>
                <div class="col-sm-9">
			<?= Alert::widget() ?>
                  <?php echo  $content ?>
                </div>

              </div>
              <?php  }else {?>
		<?= Alert::widget() ?>
                <?php echo  $content ?>
                <?} ?>
              </div>
            </div>

            <footer class="footer">
              <div class="container">
                <p class="pull-left">&copy; GFK <?= date('Y') ?></p>

                <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->

              </div>
            </footer>

            <?php $this->endBody() ?>
          </body>
          </html>
          <?php $this->endPage() ?>
