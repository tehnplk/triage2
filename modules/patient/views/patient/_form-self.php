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

        <div class="col-md-3">
            <?=
            $form->field($model, 'cid', [
                'template' => '{label}<div class="input-group">{input}'
                . '<a href="#" class="input-group-addon btn btn-secondary btn-read-card"><i class="far fa-id-card"></i></a>'
                . '</div>{error}'
            ])->textInput(['maxlength' => 13, 'autocomplete' => 'off'])->label("เลขบัตรประชาชน");
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'prefix')->textInput(['maxlength' => true])->label('คำนำหน้า เช่น นาย นาง นางสาว') ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-3">
            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
        </div>

    </div>

    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'gender')->dropDownList(['ชาย' => 'ชาย', 'หญิง' => 'หญิง'], ['prompt' => '']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'nation')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'bdate')->dropDownList(MyLookUp::bdate(), ['prompt' => '']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'bmon')->dropDownList(MyLookUp::bmon(), ['prompt' => '']) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'byear')->dropDownList(MyLookUp::byear(), ['prompt' => '']) ?>
        </div>
    </div>

    <div class="row" style="display: none">
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
        <div class="col-md">*ที่อยู่ปัจจุบัน ไม่จำเป็นต้องตามบัตรประชาชน</div>
    </div>
    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'addr_chw')->dropDownList(MyLookUp::chw(), ['prompt' => '', 'id' => 'sel-chw']) ?>
        </div>
        <div class="col-md">
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
        <div class="col-md">
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
        <div class="col-md">
            <?= $form->field($model, 'addr_moo')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'addr_road')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'addr_no')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md">
            <?= $form->field($model, 'tel')->textInput(['maxlength' => true])->label('เบอร์โทรศัพท์') ?>
        </div>


    </div>
    <div class="row">
        <div class="col-md">*ข้อมูลสุขภาพ</div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="form-group field-patient-bw has-success">
                <label class="control-label" for="patient-bw">น้ำหนัก(กก)</label>
                <input type="number" id="patient-bw" class="form-control" name="bw" value="" maxlength="3" aria-invalid="false">
            </div>

        </div>

        <div class="col-md">
            <div class="form-group field-patient-bh has-success">
                <label class="control-label" for="patient-bh">ส่วนสูง(ซม)</label>
                <input type="number" id="patient-bh" class="form-control" name="bh" value="" maxlength="3" aria-invalid="false">
            </div>

        </div>




    </div>

    <div class="row">
        <div class="col-md">
            <?= $form->field($model, 'personal_disease')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-md">
            <div class="form-group field-patient-cc has-success">
                <label class="control-label" for="patient-cc">อาการป่วยจากโควิด เช่น ไข้ ไอ เจ็บคอ น้ำมูก</label>
                <textarea id="patient-cc" class="form-control" name="cc" value="" maxlength="100" aria-invalid="false" ></textarea>
            </div>

        </div>


    </div>

    <div class="row">
        <div class="col-md">
            *เลือกโรงพยาบาลที่ท่านต้องการให้ดูแล
        </div>
    </div>
    <div class="row">
        <div class="col-md">

            <div class="form-group field-sel-amp-hos required has-error">
                <label class="control-label" for="sel-amp-hos">ท่านอยู่ในพื้นที่อำเภอ</label>
                <select id="sel-amp-hos" class="form-control" name="sel-amp-hos" aria-required="true" aria-invalid="true">
                    <option value=""></option>
                    <option value="01">เมือง</option>
                    <option value="02">นครไทย</option>
                    <option value="03">ชาติตระการ</option>
                    <option value="04">บางระกำ</option>
                    <option value="05">บางกระทุ่ม</option>
                    <option value="06">พรหมพิราม</option>
                    <option value="07">วัดโบสถ์</option>
                    <option value="08">วังทอง</option>
                    <option value="09">เนินมะปราง</option>

                </select>

            </div>

        </div>
        <div class="col-md">
            <?php
            echo $form->field($model, 'hoscode')->widget(DepDrop::classname(), [
                //'data' => MyLookUp::tmb($model->addr_amp),
                'options' => ['id' => 'sel-hos'],
                'pluginOptions' => [
                    'depends' => ['sel-amp-hos'],
                    'placeholder' => '',
                    //'initialize' => TRUE,
                    'url' => yii\helpers\Url::to(['/patient/ajax/list-hos'])
                ]
            ])->label("โรงพยาบาลที่ต้องการให้ดูแล");
            ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
