<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MyLookUp;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Triage */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'triage_date')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'triage_time')->textInput(['disabled' => true]) ?>
        </div>

    </div>


    <div class="row">
        <div class="col">
            <?= $form->field($model, 'spo2')->textInput(['disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'lab_result')->dropDownList(MyLookUp::covid_test_result(), ['prompt' => '', 'disabled' => true]) ?>
        </div>

    </div>


    <div class="row">
        <div class="col">
            <?= $form->field($model, 'risk')->dropDownList(['มี' => 'มี', 'ไม่มี' => 'ไม่มี'], ['prompt' => '', 'disabled' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'xray')->dropDownList(MyLookUp::covid19_pneumonia_cat(), ['prompt' => '', 'disabled' => true]) ?>
        </div>


    </div>
    <div>
        <div class="col">
            <?= $form->field($model, 'family')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">

        <div class="col">
            <?= $form->field($model, 'color')->dropDownList(MyLookUp::trigger_color(), ['prompt' => '']) ?>
        </div>
        <div class="col">
            <?php //$form->field($model, 'refer_to')->textInput(['maxlength' => true]) ?>
            <?php
            $items = MyLookUp::refer_place();
            echo $form->field($model, 'refer_to')->widget(Select2::className(), [
                'data' => $items,
                'options' => [
                    'placeholder' => 'ค้นหา...',
                ],
                'pluginOptions' => ['allowClear' => true]
            ]);
            ?>

        </div>

    </div>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
