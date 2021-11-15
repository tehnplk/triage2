<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
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

<div class="patient-index">


    <p class="text-center">
        <?= Html::a('<i class="far fa-plus"></i> เพิ่มรายชื่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?=
    GridView::widget([
        'responsiveWrap' => false,
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'hoscode',
                'filter' => !app\components\MyRole::is_reg()
            ],
            // 'hosname',
            [
                'attribute' => 'cid',
                'format' => 'raw',
                'value' => function($model) {
                    $link1 = Html::a($model->cid, ['update', 'id' => $model->id], []);
                    $link2 = Html::a('<i class="far fa-external-link-alt"></i>', ['update', 'id' => $model->id], ['class' => 'text-dark', 'target' => '_blank']);
                    return "<a class='d-flex justify-content-between'>" . $link1 . "</a>";
                }
            ],
            'prefix',
            'first_name',
            'last_name',
            'gender',
            //'bdate',
            //'bmon',
            //'byear',
            //'birth',
            'age_y',
            //'age_m',
            //'age_d',
            //'marital',
            //'nation',
            //'personal_disease',
            //'addr_no',
            //'addr_road',
            //'addr_moo',
            //'addr_tmb_name',
            'addr_amp_name',
            'addr_chw_name',
            [
                'label' => 'สี',
                'format' => 'raw',
                'value' => function($model) {
                    $patient_id = $model->id;
                    $sql = "select color from triage where patient_id = '$patient_id' order by id DESC limit 1 ";
                    $color = \Yii::$app->db->createCommand($sql)->queryScalar();
                    if ($color == 'ฟ้า') {
                        return "<div class='blue'><div>";
                    }
                    if ($color == 'เขียว') {
                        return "<div class='green'><div>";
                    }
                    if ($color == 'เหลือง') {
                        return "<div class='yellow'><div>";
                    }
                    if ($color == 'แดง') {
                        return "<div class='red'><div>";
                    }
                    return "<div>-<div>";
                },
                'contentOptions' => function ($model, $key, $index, $column) {
                    return ['style' => 'text-align:center'];
                }
            ],
            [
                'label' => 'ส่งต่อ',
                'format' => 'raw',
                'value' => function($model) {
                    $patient_id = $model->id;
                    $sql = "select refer_to from triage where patient_id = '$patient_id' order by id DESC limit 1 ";
                    $refer_to = \Yii::$app->db->createCommand($sql)->queryScalar();
                    return '<span style="font-size:8px">' . $refer_to . '</span>';
                }
            ],
            //'family',
            //'tel',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => "{delete}",
            //'visible' => app\components\MyRole::can_adm()
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
            win = popup(a,65,90);
            return false;
        }); 
        
         $("a[title='ปรับปรุง']").click(function(e){ 
            e.preventDefault();
            a = $(this).attr('href');
            //$('#modal-update').modal('show').find('#modalContent').load(a);
             win = popup(a,65,90);
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

