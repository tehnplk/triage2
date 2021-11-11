<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\MyLookUp;

/* @var $this yii\web\View */
/* @var $model app\models\Lab */
/* @var $form yii\widgets\ActiveForm */
?>

<div style="margin: 5px;padding: 15px;background-color: #CCFFFF;border: solid rosybrown 1px">

    <?php $form = ActiveForm::begin(); ?>
    <div style="display: none">
        <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'visit_id')->textInput() ?>

        <?= $form->field($model, 'patient_id')->textInput() ?>

        <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>
    </div>


    <?= $form->field($model, 'lab_date')->textInput() ?>

    <?= $form->field($model, 'lab_time')->textInput() ?>

    <?= $form->field($model, 'lab_place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lab_kind')->dropDownList(['ATK' => 'ATK', 'PCR' => 'PCR'], ['prompt' => '']) ?>

    <?= $form->field($model, 'lab_result')->dropDownList(MyLookUp::covid_test_result(), ['prompt' => '']) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
