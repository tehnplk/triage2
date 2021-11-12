<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Xray */

$this->title = 'Create Xray';
$this->params['breadcrumbs'][] = ['label' => 'Xrays', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xray-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
