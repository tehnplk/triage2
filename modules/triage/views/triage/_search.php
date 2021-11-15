<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\components\MyRole;

/* @var $this yii\web\View */
/* @var $model app\models\TriageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="triage-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['list'],
                'method' => 'get',
    ]);
    ?>


    <div class="row">
        <div class="col-3">
            <?php //echo $form->field($searchModel, 'triage_date') ?>
            <?php
            echo $form->field($searchModel, 'triage_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'วันที่คัดกรอง'],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                //'pickerButton' => false,
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ],
                'pluginEvents' => ['changeDate' => "function(e){
                                        $(e.target).closest('form').submit();
                    }"]
            ])->label(false);
            ?>
        </div>

        <div class="col" style="display: <?= MyRole::can_tri() ? '' : 'none' ?>">

            <button type="button" class="btn btn-primary btn-auto"><i class="far fa-check-circle"></i> จัดกลุ่มผู้ป่วยอัตโนมัติ</button>

        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
