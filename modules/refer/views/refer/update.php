<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refer */

$this->title = 'Update Refer: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="refer-update">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
