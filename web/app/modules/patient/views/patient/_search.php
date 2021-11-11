<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hoscode') ?>

    <?= $form->field($model, 'hosname') ?>

    <?= $form->field($model, 'cid') ?>

    <?= $form->field($model, 'prefix') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'bdate') ?>

    <?php // echo $form->field($model, 'bmon') ?>

    <?php // echo $form->field($model, 'byear') ?>

    <?php // echo $form->field($model, 'birth') ?>

    <?php // echo $form->field($model, 'age_y') ?>

    <?php // echo $form->field($model, 'age_m') ?>

    <?php // echo $form->field($model, 'age_d') ?>

    <?php // echo $form->field($model, 'marital') ?>

    <?php // echo $form->field($model, 'personal_disease') ?>

    <?php // echo $form->field($model, 'addr_no') ?>

    <?php // echo $form->field($model, 'addr_road') ?>

    <?php // echo $form->field($model, 'addr_moo') ?>

    <?php // echo $form->field($model, 'addr_tmb') ?>

    <?php // echo $form->field($model, 'addr_amp') ?>

    <?php // echo $form->field($model, 'addr_chw') ?>

    <?php // echo $form->field($model, 'tel') ?>

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
