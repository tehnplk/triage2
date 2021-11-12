<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\XraySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Xrays';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mt-2"></div>
<div class="xray-index">



    <p class="text-center">
        <?= Html::a('<i class="far fa-plus"></i> เพิ่ม X-RAY', ['create', 'patient_id' => $searchModel->patient_id], ['class' => 'btn btn-warning btn-create']) ?>
    </p>

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
            'xray_date',
            'xray_time',
            'xray_type',
            'xray_result',
            'xray_cat',
            'covid19_pneumonia_cat',
            'conclusion',
            'comparison',
            'finding',
            'note',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>

<?php
$this->registerJsFile('@web/js/popup.js');

$js = <<<JS
    $(function(){
          
        $('.btn-create').click(function(e){
            e.preventDefault();
            a = $(this).attr('href');
            //$('#modal-create').modal('show').find('#modalContent').load(a);
            win = popup(a,85,75);
            return false;
        }); 
        
         $("a[title='ปรับปรุง']").click(function(e){ 
            e.preventDefault();
            a = $(this).attr('href');
            //$('#modal-update').modal('show').find('#modalContent').load(a);
             win = popup(a,85,75);
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

