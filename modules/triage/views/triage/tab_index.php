<?php

use yii\helpers\Url;
use yii\bootstrap4\Tabs;

$patient = app\models\Patient::findOne($searchModel->patient_id);

$this->params['pt_fullname'] = $patient->full_name . "  ($patient->age_y ปี $patient->age_m ด)";

echo Tabs::widget([
    'encodeLabels' => FALSE,
    'items' => [
        [
            'label' => '<i class="far fa-user"></i> ข้อมูลบุคคล',
            'url' => Url::to(['/patient/patient/update', 'id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-stethoscope"></i> สัญญาณชีพ',
            'url' => Url::to(['/visit/visit/index', 'patient_id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-check-square"></i> ปัจจัยเสี่ยง',
            'url' => Url::to(['/risk/risk/index', 'patient_id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-vial"></i> LAB',
            'url' => Url::to(['/lab/lab/index', 'patient_id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-pills"></i> จ่ายยา',
            'url' => Url::to(['/drug/drug/index', 'patient_id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-radiation"></i> X-RAY',
            'url' => Url::to(['/xray/xray/index', 'patient_id' => $patient->id]),
        ],
        [
            'label' => '<i class="far fa-circle"></i> Triage/ส่งต่อ',
            'content' => $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]),
            'active' => true
        ],
        [
            'label' => '<i class = "far fa-ambulance"></i> ส่งต่อ',
            'url' => Url::to(['/refer/refer/index', 'patient_id' => $patient->id]),
            'visible' => false
        ],
    ],
]);
