<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Triage */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Triages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="triage-view">

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
            'visit_id',
            'patient_id',
            'patient_cid',
            'patient_fullname',
            'patient_age',
            'patient_gender',
            'triage_date',
            'triage_time',
            'inscl_code',
            'claim_code',
            'spo2',
            'lab_date',
            'lab_kind',
            'lab_result',
            'risk',
            'color',
            'refer_to',
            'created_at',
            'created_by',
            'updated_at',
            'updated_by',
        ],
    ]) ?>

</div>
