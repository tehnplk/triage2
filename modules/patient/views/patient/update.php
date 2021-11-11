<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = 'Update Patient: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mt-2"></div>
<div>
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
