<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Xray */

$this->title = 'Update Xray: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Xrays', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="xray-update">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
