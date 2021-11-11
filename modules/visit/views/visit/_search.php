<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hoscode') ?>

    <?= $form->field($model, 'hosname') ?>

    <?= $form->field($model, 'patient_id') ?>

    <?= $form->field($model, 'patient_cid') ?>

    <?php // echo $form->field($model, 'patient_fullname') ?>

    <?php // echo $form->field($model, 'visit_date') ?>

    <?php // echo $form->field($model, 'visit_time') ?>

    <?php // echo $form->field($model, 'bw') ?>

    <?php // echo $form->field($model, 'bh') ?>

    <?php // echo $form->field($model, 'bmi') ?>

    <?php // echo $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'spo2') ?>

    <?php // echo $form->field($model, 'bps') ?>

    <?php // echo $form->field($model, 'bpd') ?>

    <?php // echo $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'cc') ?>

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
