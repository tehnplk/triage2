<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Refer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_date')->textInput() ?>

    <?= $form->field($model, 'refer_time')->textInput() ?>

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
