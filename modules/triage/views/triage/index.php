<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap4\Modal;
use app\components\MyRole;
use app\components\MyLookUp;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TriageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Triages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<style>

    .blue {
        height: 22px;
        width: 22px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block;
    }

    .green {
        height: 22px;
        width: 22px;
        background-color: limegreen;
        border-radius: 50%;
        display: inline-block;
    }

    .yellow {
        height: 22px;
        width: 22px;
        background-color: yellow;
        border-radius: 50%;
        display: inline-block;
    }

    .red {
        height: 22px;
        width: 22px;
        background-color: #ff4500;
        border-radius: 50%;
        display: inline-block;
    }

</style>
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
            //'patient_cid',
            //'patient_fullname',
            //'patient_gender',
            'triage_date:date:วันที่',
            'triage_time:time:เวลา',
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
                'format' => 'raw',
                'filter' => MyLookUp::trigger_color(),
                'value' => function($model) {
                    if ($model->color == 'ฟ้า') {
                        return "<div class='blue'><div>";
                    }
                    if ($model->color == 'เขียว') {
                        return "<div class='green'><div>";
                    }
                    if ($model->color == 'เหลือง') {
                        return "<div class='yellow'><div>";
                    }
                    if ($model->color == 'แดง') {
                        return "<div class='red'><div>";
                    }
                    return "<div>-<div>";
                },
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'text-align:center'];
                }
            ],
            'doi',
            'family',
            'refer_to:text:ส่งต่อ',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{update}",
                'visible' => MyRole::can_tri()
            ],
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
        
         $("a[title='ปรับปรุง']").click(function(e){ 
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

