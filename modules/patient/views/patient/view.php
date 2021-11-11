<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'hoscode',
            'hosname',
            'cid',
            'prefix',
            'first_name',
            'last_name',
            'gender',
            'bdate',
            'bmon',
            'byear',
            'birth',
            'age_y',
            'age_m',
            'age_d',
            'marital',
            'nation',
            'family',
            'personal_disease',
            'addr_no',
            'addr_road',
            'addr_moo',
            'addr_tmb',
            'addr_amp',
            'addr_chw',
            'tel',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
