<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ReferSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Refers';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="refer-index">


    <p>
        <?= Html::a('ส่งต่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
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
            'refer_date',
            'refer_time',
            'refer_to',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>


</div>
