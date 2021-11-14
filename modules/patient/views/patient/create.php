<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Create Patient';
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="d-flex justify-content-between mb-1">
    <span class="bg-primary text-light px-3"> ข้อมูลผู้ป่วย </span>
    <span><a href="http://plkprom.plkhealth.go.th/plkprom/web/index.php?r=regis/util/gen-cid" target="_blank">สร้าง13หลักคนต่างด้าว</a></span>
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
