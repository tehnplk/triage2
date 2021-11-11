<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Risk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hoscode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hosname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'visit_id')->textInput() ?>

    <?= $form->field($model, 'patient_id')->textInput() ?>

    <?= $form->field($model, 'patient_cid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patient_fullname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'risk_date')->textInput() ?>

    <?= $form->field($model, 'risk_time')->textInput() ?>

    <?= $form->field($model, 'aging')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bmi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'copd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cirrhosis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stroke')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ihd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hiv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cancer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suppress')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'preg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'non_risk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'updated_by')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
