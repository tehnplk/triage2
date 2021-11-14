<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use app\components\MyLookUp;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TriageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Triages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="triage-index mt-2">



    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'hoscode',
            //'hosname',
            //'visit_id',
            //'patient_id',
            'triage_date:date:วันที่',
            'triage_time:time:เวลา',
            'patient_cid:text:เลข13หลัก',
            'patient_fullname:text:ชื่อ-สกุล',
            'patient_gender:text:เพศ',
            'patient_age:integer:อายุ(ปี)',
            //'inscl_code',
            //'claim_code',
            'spo2',
            //'lab_date',
            //'lab_kind',
            'lab_result:text:LAB',
            'risk:text:ปัจจัยเสี่ยง',
            'xray',
            [
                'attribute' => 'color',
                'filter' => MyLookUp::trigger_color()
            ],
            'doi',
            'family',
            'refer_to:text:ส่งต่อ',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'attribute' => 'id',
                'format' => 'raw',
                'label' => '',
                'value' => function($model) {
                    return Html::a('<i class="fas fa-pen"></i>', ['update-list', 'id' => $model->id], ['class' => 'btn-update']);
                }
            ]
        //['class' => 'yii\grid\ActionColumn', 'template' => "{update}"],
        //['class' => 'yii\grid\ActionColumn', 'template' => "{delete}"],
        ],
    ]);
    ?>


</div>
<?php
Modal::begin([
    'id' => 'modal-create',
    'title' => 'เพิ่มรายการ',
    'size' => 'modal-xl',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<?php
Modal::begin([
    'id' => 'modal-update',
    'title' => 'แก้ไขรายการ',
    'size' => 'modal-xl',
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>


<?php
$this->registerJsFile('@web/js/popup.js');

$js = <<<JS
    $(function(){
          
        $('.btn-create').click(function(e){
            e.preventDefault();
            a = $(this).attr('href');
            $('#modal-create').modal('show').find('#modalContent').load(a);
            //win = popup(a,85,75);
            return false;
        }); 
        
         $('.btn-update').click(function(e){ 
            e.preventDefault();
            a = $(this).attr('href');
            $('#modal-update').modal('show').find('#modalContent').load(a);
            //win = popup(a,85,75);
           return false;
        });
        
        $("a[title='ลบ']").click(function(e){   
            e.preventDefault();
            val = prompt('ระบุเหตุผล');
            if(!val || val==''){
                return false;
            }
            
        });
        
        
   
    }); 
       
        
JS;
$this->registerJs($js);

