<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Visit */

$this->title = 'Create Visit';
$this->params['breadcrumbs'][] = ['label' => 'Visits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-create">

  
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
