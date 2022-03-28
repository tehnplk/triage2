<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Risk */
/* @var $form yii\widgets\ActiveForm */
?>

<style>

    .control-label{
        font-size: 12px
    }
    .help-block{
        font-size: 11px;
        color: tomato !important;
    }

    input[type=checkbox]
    {
        /* Double-sized Checkboxes */
        -ms-transform: scale(2); /* IE */
        -moz-transform: scale(2); /* FF */
        -webkit-transform: scale(2); /* Safari and Chrome */
        -o-transform: scale(2); /* Opera */
        padding: 10px;
        margin-right: 10px;
    }  


</style>

<div style="margin: 5px;padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row" style="display: none">
        <div class="col">
            <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>
        </div>       

        <div class="col">
            <?= $form->field($model, 'patient_id')->textInput() ?>
        </div>

        <div class="col">
            <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>
        </div>

    </div>
    <div class="row" style="display: none">
        <div class="col">
            <?= $form->field($model, 'risk_date')->textInput() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'risk_time')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'non_risk')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'aging')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'bmi')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'dm')->checkbox() ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'copd')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'cirrhosis')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'stroke')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'ihd')->checkbox() ?>
        </div>

    </div>

    <div class="row">
        <div class="col">
            <?= $form->field($model, 'hiv')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'cancer')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'suppress')->checkbox() ?>
        </div>
        <div class="col">
            <?= $form->field($model, 'preg')->checkbox() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'kidney')->checkbox() ?></div>
        <div class="col-md-3"><?= $form->field($model, 'vacless')->checkbox() ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
