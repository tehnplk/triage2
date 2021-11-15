<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MyLookUp;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>


<div style="padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-1">
            <?= $form->field($model, 'hoscode')->textInput(['maxlength' => 5, 'placeholder' => 'รหัส5หลัก']) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'cid')->textInput(['maxlength' => 13]) ?>
        </div>

        <div class="col-2">
            <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'gender')->dropDownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง'], ['prompt' => '']) ?>
        </div>
        <div class="col-2">
            <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bdate')->dropDownList(MyLookUp::bdate(), ['prompt' => '']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bmon')->dropDownList(MyLookUp::bmon(), ['prompt' => '']) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'byear')->dropDownList(MyLookUp::byear(), ['prompt' => '']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'age_y')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'age_m')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'age_d')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'marital')->dropDownList(MyLookUp::marital(), ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'addr_chw')->dropDownList(MyLookUp::chw(), ['prompt' => '', 'id' => 'sel-chw']) ?>
        </div>
        <div class="col">
            <?php
            echo $form->field($model, 'addr_amp')->widget(DepDrop::classname(), [
                'data' => MyLookUp::amp($model->addr_chw),
                'options' => ['id' => 'sel-amp'],
                'pluginOptions' => [
                    'depends' => ['sel-chw'],
                    'placeholder' => '',
                    //'initialize' => TRUE,
                    'url' => yii\helpers\Url::to(['/patient/ajax/list-amp'])
                ]
            ]);
            ?>
        </div>
        <div class="col">
            <?php
            echo $form->field($model, 'addr_tmb')->widget(DepDrop::classname(), [
                'data' => MyLookUp::tmb($model->addr_amp),
                'options' => ['id' => 'sel-tmb'],
                'pluginOptions' => [
                    'depends' => ['sel-amp'],
                    'placeholder' => '',
                    //'initialize' => TRUE,
                    'url' => yii\helpers\Url::to(['/patient/ajax/list-tmb'])
                ]
            ]);
            ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_moo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_road')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_no')->textInput(['maxlength' => true]) ?>
        </div>


    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'personal_disease')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>


    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
