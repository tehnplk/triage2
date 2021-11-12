<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\time\TimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Xray */
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
            echo $form->field($model, 'xray_date')->widget(DatePicker::classname(), [
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
            echo $form->field($model, 'xray_time')->widget(TimePicker::classname(), [
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

    <div style="display: none">
        <?= $form->field($model, 'xray_type')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'xray_result')->textInput(['maxlength' => true]) ?>
    </div>




    <div class="row">
        <div class="col">
            <?= $form->field($model, 'xray_cat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'covid19_pneumonia_cat')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'conclusion')->textInput(['maxlength' => true]) ?>
        </div>


    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'comparison')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'finding')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>
        </div>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
