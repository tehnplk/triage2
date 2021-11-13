<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Triage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="triage-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'triage_date')->textInput() ?>

    <?= $form->field($model, 'triage_time')->textInput() ?>

   

    <?= $form->field($model, 'spo2')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'lab_result')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'refer_to')->textInput(['maxlength' => true]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
