<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LabSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Labs';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mt-2"></div>
<div class="lab-index">


    <p>
        <?= Html::a('เพิ่มผลตรวจ', ['create'], ['class' => 'btn btn-success btn-create']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            // 'hoscode',
            // 'hosname',
            // 'visit_id',
            // 'patient_id',
            //'patient_cid',
            //'patient_fullname',
            'lab_date',
            'lab_time',
            'lab_place',
            'lab_kind',
            'lab_result',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => 'yii\grid\ActionColumn', 'template' => "{update}"
            ],
            [
                'class' => 'yii\grid\ActionColumn', 'template' => "{delete}"
            ],
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
