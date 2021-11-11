<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Risk */

$this->title = 'Create Risk';
$this->params['breadcrumbs'][] = ['label' => 'Risks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="risk-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
