<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\XraySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="xray-search">

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

    <?php // echo $form->field($model, 'xray_date') ?>

    <?php // echo $form->field($model, 'xray_time') ?>

    <?php // echo $form->field($model, 'xray_type') ?>

    <?php // echo $form->field($model, 'xray_result') ?>

    <?php // echo $form->field($model, 'xray_cat') ?>

    <?php // echo $form->field($model, 'covid19_pneumonia_cat') ?>

    <?php // echo $form->field($model, 'conclusion') ?>

    <?php // echo $form->field($model, 'comparison') ?>

    <?php // echo $form->field($model, 'finding') ?>

    <?php // echo $form->field($model, 'note') ?>

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
