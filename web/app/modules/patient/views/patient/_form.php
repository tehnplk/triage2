<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prefix')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bmon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'byear')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birth')->textInput() ?>

    <?= $form->field($model, 'age_y')->textInput() ?>

    <?= $form->field($model, 'age_m')->textInput() ?>

    <?= $form->field($model, 'age_d')->textInput() ?>

    <?= $form->field($model, 'marital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'personal_disease')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_road')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_moo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_tmb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_amp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'addr_chw')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
