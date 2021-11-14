<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
//$this->params['breadcrumbs'][] = $this->title;
?>


<div class="patient-index">


    <p class="text-center">
        <?= Html::a('<i class="far fa-plus"></i> เพิ่มรายชื่อ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            'hoscode',
            // 'hosname',
            [
                'attribute' => 'cid',
                'format' => 'raw',
                'value' => function($model) {
                    $link1 = Html::a($model->cid, ['update', 'id' => $model->id], []);
                    $link2 = Html::a('<i class="far fa-external-link-alt"></i>', ['update', 'id' => $model->id], ['class' => 'text-dark', 'target' => '_blank']);
                    return "<a class='d-flex justify-content-between'>" . $link1 . "</a>";
                }
            ],
            'prefix',
            'first_name',
            'last_name',
            'gender',
            //'bdate',
            //'bmon',
            //'byear',
            //'birth',
            'age_y',
            'age_m',
            //'age_d',
            //'marital',
            //'nation',
            //'personal_disease',
            //'addr_no',
            //'addr_road',
            //'addr_moo',
            'addr_tmb_name',
            'addr_amp_name',
            'addr_chw_name',
            'family',
        //'tel',
        //'created_at',
        //'created_by',
        //'updated_at',
        //'updated_by',
        /* [
          'class' => 'yii\grid\ActionColumn',
          'template'=>"{update} {delete}"
          ], */
        ],
    ]);
    ?>


</div>
