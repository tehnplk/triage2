<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MyLookUp;
use kartik\select2\Select2;
use kartik\depdrop\DepDrop;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>
<style>



    input[type=checkbox]
    {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        padding: 10px;
        margin-right: 10px;
        margin-left: 10px;
    }  

    input[type=radio]
    {
        /* Double-sized Checkboxes */
        -ms-transform: scale(1.5); /* IE */
        -moz-transform: scale(1.5); /* FF */
        -webkit-transform: scale(1.5); /* Safari and Chrome */
        -o-transform: scale(1.5); /* Opera */
        padding: 10px;
        margin-right: 10px;
        margin-left: 10px;
    }  


    .chk{
        font-size: 14px;
    }


</style>

<h4>โปรดกรอกข้อมูลที่เป็นจริง</h4>
<div style="padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    ข้อมูลส่วนตัว

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
    <hr>
    ที่อยู่ปัจจุบัน (ไม่จำเป็นต้องตรงตามบัตรประชาชน)

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
    <hr>
    ข้อมูลสุขภาพ    

    <div class="row">
        <div class="col-md">
            <div class="form-group field-patient-bw has-success">
                <label class="control-label" for="patient-bw">น้ำหนัก(กก)</label>
                <input type="number" id="patient-bw" class="form-control" name="bw" value="" maxlength="3" aria-invalid="false" required>
            </div>

        </div>

        <div class="col-md">
            <div class="form-group field-patient-bh has-success">
                <label class="control-label" for="patient-bh">ส่วนสูง(ซม)</label>
                <input type="number" id="patient-bh" class="form-control" name="bh" value="" maxlength="3" aria-invalid="false" required>
            </div>

        </div>




    </div>
    <hr>
    อาการเจ็บป่วยในขณะนี้ (เลือกได้มากกว่า 1 ข้อ)
    <div class="row">
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="หายใจหอบเหนื่อย"> หายใจหอบเหนื่อย</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="แน่นหน้าอก">แน่นหน้าอก</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="ไข้">ไข้</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="ไอ">ไอ</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="มีน้ำมูก">มีน้ำมูก</label>         
        </div>


    </div>
    <div class="row">
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="เจ็บคอ">เจ็บคอ</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="จมูกไม่ได้กลิ่น">จมูกไม่ได้กลิ่น</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="ถ่ายเหลว">ถ่ายเหลว</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="cc[]" value="อื่นๆ">อื่นๆ ระบุ <input type="text" name="cc_other"/></label>         
        </div>
    </div>
    <hr>
    ตรวจพบเชื้อโควิดด้วยวิธี  
    <div class="row">
        <div class="col-md">
            <label class="chk" style="margin-right: 15px"><input type="radio"  name="lab_kind" value="ATK-Positive" required> ATK</label> 
            <label class="chk"><input type="radio"  name="lab_kind" value="PCR-Positive" required> RT-PCR</label> 
        </div>
        <div class="col-md">
            เมื่อวันที่ <input type="date" name="lab_date" class="" required/>
        </div>
        <div class="col-md">
            <label style="margin-top: 3px">ภาพถ่ายผลตรวจคู่บัตรประชาชน <input type="file"  name="lab_pic" accept="image/*"></label> 
        </div>
    </div>
    <div class="row">
        <div class="col-md" style="font-size: 12px">
            <span style="margin-right: 15px"><a href="#" data-toggle="modal" data-target="#modal-pic-atk">ตัวอย่างภาพถ่าย ATK</a></span>  
            <span><a href="#" data-toggle="modal" data-target="#modal-pic-pcr">ตัวอย่างภาพถ่าย RT-PCR</a></span></div>

    </div>
    <hr>
    ปัจจัยเสี่ยงของท่าน (เลือกได้มากกว่า 1 ข้อ)

    <div class="row">
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="vac"> ไม่ฉีดวัคซีน/ฉีดไม่ครบ2เข็ม</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="old"> อายุ 60 ปีขึ้นไป</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="child"> อายุ 0-5 ปี</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="bed"> ผู้ป่วยติดเตียง</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="bmi"> น้ำหนักมากกว่า 90</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="dm"> เป็นโรคเบาหวาน</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="copd"> เป็นโรคหลอดลมอุดกั้นเริ้อรัง</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="liver"> เป็นโรคตับแข็ง</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="stroke"> เป็นโรคหลอดเลือดสมอง</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="ihd"> เป็นโรคหัวใจขาดเลือด</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="hiv"> เป็นโรคภูมิคุ้มกันบกพร่อง(HIV)</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="cancer"> เป็นโรคมะเร็ง</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="ckd"> เป็นโรคไต/กำลังฟอกไต</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="preg"> กำลังตั้งครรภ์</label>         
        </div>

        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk[]" value="suppress"> กินยากดภูมิคุ้มกัน</label>         
        </div>
        <div class="col-md">
            <label class="chk"><input type="checkbox"  name="risk_refuse" value="refuse"> ไม่มีปัจจัยเสี่ยง</label>         
        </div>



    </div>
    <hr>
    ท่านแพ้ยาหรือไม่
    <div class="row">
        <div class="col-md">
            <label class="chk"><input type="radio"  name="Patient[drug_allergy]" value="ปฏิเสธ" required> ไม่</label> 
        </div>
        <div class="col-md">
            <label class="chk"><input type="radio"  name="Patient[drug_allergy]" value="แพ้" required> แพ้</label> 
            <label>ชื่อยาที่แพ้ <input type="text" name="drug_allergy_name" /></label>
        </div>

    </div>

    <hr>
    เลือกรับบริการกับโรงพยาบาลใกล้บ้านท่าน

    <div class="row">
        <div class="col-md">

            <div class="form-group field-sel-amp-hos required has-error">
                <label class="control-label" for="sel-amp-hos">อำเภอ</label>
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
            ])->label("โรงพยาบาล");
            ?>
        </div>
    </div>

    <div class="form-group text-center">
        <?= Html::submitButton('บันทึก', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
Modal::begin([
    'id' => 'modal-pic-atk',
    'title' => 'ตัวอย่างภาพถ่ายผลตรวจ ATK',
    'size' => 'modal-xl',
]);
?>
<div>
    <?= Html::img('@web/icon/atk_pic.jpg', ['style' => 'width:100%;height: auto']) ?>
</div>
<?php
Modal::end();
?>

<?php
Modal::begin([
    'id' => 'modal-pic-pcr',
    'title' => 'ตัวอย่างภาพถ่ายผลตรวจ PCR',
    'size' => 'modal-xl',
]);
?>
<div>
    <?= Html::img('@web/icon/pcr_pic.jpg', ['style' => 'width:100%;height: auto']) ?>
</div>
<?php
Modal::end();
?>
