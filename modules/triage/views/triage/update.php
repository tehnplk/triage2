<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Triage */

$this->title = 'Update Triage: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Triages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="triage-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
