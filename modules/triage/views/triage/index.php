<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TriageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Triages';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="triage-index">

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'hoscode',
            //'hosname',
            //'visit_id',
            //'patient_id',
            //'patient_cid',
            //'patient_fullname',
            //'patient_age',
            //'patient_gender',
            'triage_date',
            'triage_time',
            //'inscl_code',
            //'claim_code',
            //'spo2',
            //'lab_date',
            //'lab_kind',
            //'lab_result',
            //'risk',
            'color',
            'refer_to',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
