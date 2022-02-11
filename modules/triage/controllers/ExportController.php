<?php

namespace app\modules\triage\controllers;

use yii\web\Controller;
use app\models\TriageSearch;
use yii2tech\csvgrid\CsvGrid;

/**
 * Default controller for the `triage` module
 */
class ExportController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionExcel() {

        $triage_search = \Yii::$app->session->get('triage_search');
        if (empty($triage_search)) {
            return "<h2>กรุณาเลือกวันที่ ที่ต้องการส่งออก</h2>";
        }
        $searchModel = new TriageSearch();
        $dataProvider = $searchModel->search($triage_search);
        //\Yii::$app->session->remove('patient_search');

        $exporter = new CsvGrid([
            'dataProvider' => $dataProvider,
            'columns' => [
                'hoscode:text:hoscode',
                'hosname',
                'triage_date',
                'triage_time',
                'patient_cid',
                'patient_fullname:text:ชื่อ-สกุล',
                'patient_gender:text:เพศ',
                'patient_age:text:อายุ(ปี)',
                'patient_chw:text:จังหวัด',
                'patient_amp:text:อำเภอ',
                [
                    'label' => 'ตำบล',
                    'value' => function($model) {
                        $pt_id = $model->patient_id;
                        $sql = "select addr_tmb_name from patient where id = '$pt_id'";
                        $row = \Yii::$app->db->createCommand($sql)->queryScalar();
                        return $row;
                    }
                ],
                [
                    'label' => 'หมู่',
                    'value' => function($model) {
                        $pt_id = $model->patient_id;
                        $sql = "select addr_moo from patient where id = '$pt_id'";
                        $row = \Yii::$app->db->createCommand($sql)->queryScalar();
                        return $row;
                    }
                ],
                [
                    'label' => 'ถนน',
                    'value' => function($model) {
                        $pt_id = $model->patient_id;
                        $sql = "select addr_road from patient where id = '$pt_id'";
                        $row = \Yii::$app->db->createCommand($sql)->queryScalar();
                        return $row;
                    }
                ],
                [
                    'label' => 'บ้านเลขที่',
                    'value' => function($model) {
                        $pt_id = $model->patient_id;
                        $sql = "select addr_no from patient where id = '$pt_id'";
                        $row = \Yii::$app->db->createCommand($sql)->queryScalar();
                        return $row;
                    }
                ],
                [
                    'label' => 'สิทธิรักษา',
                    'value' => function($model) {
                        $pt_id = $model->patient_id;
                        $sql = "select claim_code from visit where patient_id = '$pt_id'";
                        $row = \Yii::$app->db->createCommand($sql)->queryScalar();
                        return $row;
                    }
                ],
                'spo2',
                'lab_date',
                'lab_kind',
                'lab_result',
                'risk',
                'xray',
                'doi',
                'color',
                'family',
                'refer_to',
            ]
        ]);
        $file_name = "รายชื่อ_ผู้ป่วย.csv";
        return $exporter->export()->send($file_name);
    }

}
