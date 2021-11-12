<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Xray */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xray-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xray_date')->textInput() ?>

    <?= $form->field($model, 'xray_time')->textInput() ?>

    <?= $form->field($model, 'xray_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xray_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xray_cat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'covid19_pneumonia_cat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conclusion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comparison')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finding')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
