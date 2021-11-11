<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RiskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Risks';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mt-2"></div>
<div class="risk-index">


    <p>
        <?= Html::a('ประเมินปัจจัยเสี่ยง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'hoscode',
            'hosname',
            'visit_id',
            'patient_id',
            //'patient_cid',
            //'patient_fullname',
            //'risk_date',
            //'risk_time',
            //'aging',
            //'bmi',
            //'dm',
            //'copd',
            //'cirrhosis',
            //'stroke',
            //'ihd',
            //'hiv',
            //'cancer',
            //'suppress',
            //'preg',
            //'non_risk',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
