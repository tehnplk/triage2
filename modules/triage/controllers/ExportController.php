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
        $searchModel = new TriageSearch();
        $dataProvider = $searchModel->search($triage_search);
        //\Yii::$app->session->remove('patient_search');

        $exporter = new CsvGrid([
            'dataProvider' => $dataProvider,
            'columns' => [
               
                'hoscode',
                'hosname',
                'patient_id',
                'patient_fullname:text:ชื่อ-สกุล'
            ]
        ]);
        $file_name = "รายชื่อ_ผู้ป่วย.csv";
        return $exporter->export()->send($file_name);
    }

}
