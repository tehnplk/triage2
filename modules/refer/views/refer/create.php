<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Refer */

$this->title = 'Create Refer';
$this->params['breadcrumbs'][] = ['label' => 'Refers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refer-create">


    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>



</div>
