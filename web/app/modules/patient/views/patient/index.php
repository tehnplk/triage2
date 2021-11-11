<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'hoscode',
            'hosname',
            'cid',
            'prefix',
            //'first_name',
            //'last_name',
            //'gender',
            //'bdate',
            //'bmon',
            //'byear',
            //'birth',
            //'age_y',
            //'age_m',
            //'age_d',
            //'marital',
            //'personal_disease',
            //'addr_no',
            //'addr_road',
            //'addr_moo',
            //'addr_tmb',
            //'addr_amp',
            //'addr_chw',
            //'tel',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
