<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Create Patient';
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <span class="bg-primary text-light px-3"> ข้อมูลผู้ป่วย </span>
</div>
<div class="patient-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
