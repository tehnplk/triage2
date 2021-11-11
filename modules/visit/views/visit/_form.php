<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Visit */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="margin: 5px;padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row" style="display: none">
        <div class="col-2">
            <?= $form->field($model, 'hoscode')->textInput(['disabled' => true]) ?>
        </div>

        <div class="col-2">
            <?= $form->field($model, 'patient_id')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'patient_cid')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'patient_fullname')->textInput(['disabled' => true]) ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <?php
            echo $form->field($model, 'visit_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => ''],
                'type' => DatePicker::TYPE_COMPONENT_APPEND,
                //'pickerButton' => false,
                'pluginOptions' => [
                    'autoclose' => true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
            ?>
        </div>
        <div class="col">
            <?php
            echo $form->field($model, 'visit_time')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showSeconds' => TRUE,
                    'showMeridian' => FALSE,
                    'minuteStep' => 5,
                    'secondStep' => 5,
                ]
            ]);
            ?>
        </div>
    </div>


    <div class="row">

        <div class="col">
            <?= $form->field($model, 'bw')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bh')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bmi')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'temperature')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'spo2')->textInput() ?>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <?= $form->field($model, 'bps')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bpd')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'pulse')->textInput() ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'cc')->textInput(['maxlength' => true]) ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
