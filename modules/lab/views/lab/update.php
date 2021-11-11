<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lab */

$this->title = 'Update Lab: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Labs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lab-update">



    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
