<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RiskSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="risk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hoscode') ?>

    <?= $form->field($model, 'hosname') ?>

    <?= $form->field($model, 'visit_id') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?php // echo $form->field($model, 'patient_cid') ?>

    <?php // echo $form->field($model, 'patient_fullname') ?>

    <?php // echo $form->field($model, 'risk_date') ?>

    <?php // echo $form->field($model, 'risk_time') ?>

    <?php // echo $form->field($model, 'aging') ?>

    <?php // echo $form->field($model, 'bmi') ?>

    <?php // echo $form->field($model, 'dm') ?>

    <?php // echo $form->field($model, 'copd') ?>

    <?php // echo $form->field($model, 'cirrhosis') ?>

    <?php // echo $form->field($model, 'stroke') ?>

    <?php // echo $form->field($model, 'ihd') ?>

    <?php // echo $form->field($model, 'hiv') ?>

    <?php // echo $form->field($model, 'cancer') ?>

    <?php // echo $form->field($model, 'suppress') ?>

    <?php // echo $form->field($model, 'preg') ?>

    <?php // echo $form->field($model, 'non_risk') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
