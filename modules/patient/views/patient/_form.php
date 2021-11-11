<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MyLookUp;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>


<div style="padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'hoscode')->textInput(['maxlength' => 5, 'placeholder' => 'รหัสหน่วยงาน 5 หลัก']) ?>
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
            <?= $form->field($model, 'age_y')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'age_m')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'age_d')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'marital')->dropDownList(MyLookUp::marital(), ['prompt' => '']) ?>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?= $form->field($model, 'addr_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_road')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_moo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_tmb')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_amp')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'addr_chw')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-3">
            <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'personal_disease')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
