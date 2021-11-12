<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Triage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="triage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_age')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'triage_date')->textInput() ?>

    <?= $form->field($model, 'triage_time')->textInput() ?>

    <?= $form->field($model, 'inscl_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'claim_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_date')->textInput() ?>

    <?= $form->field($model, 'lab_kind')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
