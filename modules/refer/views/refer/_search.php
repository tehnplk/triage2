<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ReferSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="refer-search">

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

    <?php // echo $form->field($model, 'refer_date') ?>

    <?php // echo $form->field($model, 'refer_time') ?>

    <?php // echo $form->field($model, 'refer_to') ?>

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
