<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Create Patient';
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex justify-content-between mb-1">


    <div class="mb-1">
        <span class="smc-status bg-primary text-light" id="smc-info" style="padding: 5px;">ข้อมูลผู้รับบริการ</span>
        <span class="smc-status px-5" id="smc-error" style="display:none;padding: 5px;background-color: tomato;color: white">**กรุณาเปิดโปรแกรมอ่านบัตร และตรวจสอบสายเชื่อมต่อเครื่องอ่านบัตร</span>
        <span class="smc-status px-5" id="smc-success" style="display:none;padding: 5px;background-color: lime;color: black">**อ่านบัตรประชาชนสำเร็จ</span>
        <span class="smc-status px-5" id="smc-warning" style="display:none;padding: 5px;background-color: orange;color: black">**กรุณาเสียบบัตร</span>
    </div>

    <div class="mr-1">
        <span><a href="http://plkvac.plkhealth.go.th/plkvac/web/patient/util/gen-cid" target="_blank">เลข13หลัก-คนต่างด้าว</a></span>
    </div>




</div>
<div class="patient-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

<?php
$js = <<<JS
        
        $('#sel-chw').val('65').trigger("change");
        console.log('js');
JS;
$this->registerJs($js);

$this->registerJsFile('@web/js/smartcard.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$js = <<<JS
        
        $('.btn-read-card').click(function(){
            initSmartCard();
        });
        
JS;
$this->registerJs($js);
