<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Drug */

$this->title = 'Create Drug';
$this->params['breadcrumbs'][] = ['label' => 'Drugs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="drug-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
