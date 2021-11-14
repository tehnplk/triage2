<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TriageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="triage-search">

    <?php
    $form = ActiveForm::begin([
                'action' => ['list'],
                'method' => 'get',
    ]);
    ?>


    <div class="row">
        <div class="col-2">
            <?php echo $form->field($model, 'triage_date') ?>
        </div>
        <div class="col-1">
            <p style="margin-top: 30px">
                <?= Html::submitButton('ตกลง', ['class' => 'btn btn-danger']) ?>
            </p>
        </div>
    </div>



    <?php ActiveForm::end(); ?>

</div>
