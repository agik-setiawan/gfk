<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use app\models\Masterprovince;
use app\models\Masterkotamadya;
use app\models\Mainshopinfo;
use app\models\Maintipetoko;
use app\models\Mastertipetoko;
use app\models\Mainpersendisplay;
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
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaindataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questionnaire';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$defaultExportConfig = [


    GridView::EXCEL => [
        'label' => Yii::t('kvgrid', 'Excel'),
        // 'icon' => $isFa ? 'file-excel-o' : 'floppy-remove',
        'iconOptions' => ['class' => 'text-success'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'grid-export'),
        'alertMsg' => Yii::t('kvgrid', 'The EXCEL export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Microsoft Excel 95+')],
        'mime' => 'application/vnd.ms-excel',
        'config' => [
            'worksheet' => Yii::t('kvgrid', 'ExportWorksheet'),
            'cssFile' => ''
        ]
    ],
    GridView::PDF => [
        'label' => Yii::t('kvgrid', 'PDF'),
        // 'icon' => $isFa ? 'file-pdf-o' : 'floppy-disk',
        'iconOptions' => ['class' => 'text-danger'],
        'showHeader' => true,
        'showPageSummary' => true,
        'showFooter' => true,
        'showCaption' => true,
        'filename' => Yii::t('kvgrid', 'grid-export'),
        'alertMsg' => Yii::t('kvgrid', 'The PDF export file will be generated for download.'),
        'options' => ['title' => Yii::t('kvgrid', 'Portable Document Format')],
        'mime' => 'application/pdf',
        'config' => [
            'mode' => 'c',
            'format' => 'A4-L',
            'destination' => 'D',
            'marginTop' => 20,
            'marginBottom' => 20,
            'cssInline' => '.kv-wrap{padding:20px;}' .
                '.kv-align-center{text-align:center;}' .
                '.kv-align-left{text-align:left;}' .
                '.kv-align-right{text-align:right;}' .
                '.kv-align-top{vertical-align:top!important;}' .
                '.kv-align-bottom{vertical-align:bottom!important;}' .
                '.kv-align-middle{vertical-align:middle!important;}' .
                '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
            'methods' => [
                'SetHeader' => [
                    ['odd' => 'Questionnaire', 'even' => 'Questionnaire']
                ],
                'SetFooter' => [
                    ['odd' => 'GFK- Report', 'even' => 'GFK- Report']
                ],
            ],
            'options' => [
                'title' => 'GFK- Report',
                'subject' => Yii::t('kvgrid', 'PDF export generated by kartik-v/yii2-grid extension'),
                'keywords' => Yii::t('kvgrid', 'krajee, grid, export, yii2-grid, pdf')
            ],
            'contentBefore'=>'',
            'contentAfter'=>''
        ]
    ],

];
 ?>

<div class="maindata-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create new', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'panel'=>[
       'type'=>GridView::TYPE_INFO,
       'heading'=>'Questionnaire',
   ],
        'toolbar'=> [
            ['content'=>
                Html::a('Create new', ['createmain'], ['class' => 'btn btn-success'])
                // Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>'add', 'class'=>'btn btn-success'])
                 . ' '.'{export}',
            ],

            // '{toggleData}',
        ],
        // set export properties

        'exportConfig' => $defaultExportConfig,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            // 'questid',
            'quescode',
            'namatoko',
            [
              'attribute' => 'tipetokoid',
              'value' => 'maintoko.tipetoko',
              // 'filter'=>'',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'tipetokoid',
                'data' => ArrayHelper::map(Mastertipetoko::find()->all(), 'tipetokoid', 'tipetoko'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            [
              'attribute' => 'provinceid',
              'value' => 'province.province',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'provinceid',
                'data' => ArrayHelper::map(Masterprovince::find()->all(), 'provinceid', 'province'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            [
              'attribute' => 'kotamadyaid',
              'value' => 'kotamadya.kotamadya',
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'kotamadyaid',
                'data' => ArrayHelper::map(Masterkotamadya::find()->all(), 'kotamadyaid', 'kotamadya'),
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],

            // 'status',
            //[
              //'attribute' => 'statusrole',
              //'label'=>'Status',
              //'format' => 'html',
              // 'value' => 'status.statusdata',
              //'value' => function ($model) {
                //$model->getStatusresult($model->questid);
                //return $model->getStatus()?'<span style="color:green;">Completed</span>':'<span style="color:red;">Not Completed</span>';
              //}
            //],
            [
              'attribute' => 'status',
              'label'=>'Status',
              'format' => 'html',
              // 'value' => 'status.statusdata',
              'value' => function ($model) {
                return ($model->status==1)?'<span style="color:green;">Completed</span>':'<span style="color:red;">Not Completed</span>';
              },
              'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'status',
                'data' => ['1'=>'Completed', '0'=>'Not Completed'],
                'pluginOptions'=>['allowClear'=>true],
                'options' => ['placeholder'=>'- Select  -'],
              ]),
            ],
            // 'lastmodifiedby',
            // 'lastmodifiedon',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>