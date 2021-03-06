<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Drug */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="margin: 5px;padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>

    <div style="display: none">
        <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'visit_id')->textInput() ?>

        <?= $form->field($model, 'patient_id')->textInput() ?>

        <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <div class="col">
            <?php
            echo $form->field($model, 'drug_date')->widget(DatePicker::classname(), [
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
            echo $form->field($model, 'drug_time')->widget(TimePicker::classname(), [
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
            <?= $form->field($model, 'drug_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'drug_amount')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'drug_unit')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'drug_usage')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'drug_dispenser')->textInput(['maxlength' => true]) ?>
        </div>
    </div>





    <div class="form-group">
        <?= Html::submitButton('??????????????????', ['class' => 'btn btn-success']) ?>
    </div>
    <div>
        <span></span>
    </div>

    <?php ActiveForm::end(); ?>

</div>
