<?php

namespace app\modules\triage\controllers;

use yii\web\Controller;
use app\components\MyTriage;

/**
 * Default controller for the `triage` module
 */
class AjaxController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionAutoTriage($triage_date = NULL) {

        if (empty($triage_date)) {
            $date = date('Y-m-d');
        }
        $sql = "select t.id from triage t where t.triage_date = '$date' ";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $n = 0;
        foreach ($raw as $p) {
            $triage_id = $p['id'];
            MyTriage::triage($triage_id);
            $n++;
        }
        return "จัดกลุ่มทั้งหมด $n คน เรียบร้อยแล้ว!!!  ($date)";
    }

}
