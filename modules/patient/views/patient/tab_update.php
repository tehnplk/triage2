<?php

use yii\bootstrap4\Tabs;

echo Tabs::widget([
    'encodeLabels' => FALSE,
    'items' => [
        [
            'label' => '<i class="far fa-user"></i> ข้อมูลบุคคล',
            'content' => $this->render('update', ['model' => $model]),
            'active' => true
        ],
        [
            'label' => '<i class="far fa-stethoscope"></i> สัญญาณชีพ',
            'url' => yii\helpers\Url::to(['/visit/history/vaccine', 'patient_id' => $model->id]),
        ],
        [
            'label' => '<i class="far fa-check-square"></i> ปัจจัยเสี่ยง',
            'url' => yii\helpers\Url::to(['/visit/visit/index', 'patient_id' => $model->id]),
        ],
        [
            'label' => '<i class="far fa-vial"></i> LAB',
            'url' => yii\helpers\Url::to(['/appoint/appoint/index', 'patient_id' => $model->id]),
        ],
        [
            'label' => '<i class="far fa-pills"></i> จ่ายยา',
            'url' => yii\helpers\Url::to(['/appoint/appoint/index', 'patient_id' => $model->id]),
        ],
        [
            'label' => '<i class="far fa-radiation"></i> X-RAY',
            'url' => yii\helpers\Url::to(['/appoint/appoint/index', 'patient_id' => $model->id]),
        ],
    ],
]);
