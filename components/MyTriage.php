<?php

namespace app\components;

use yii\base\Component;
use app\models\Triage;

class MyTriage extends Component {

    public static function auto_level_update($triage_id) {

        $model = Triage::findOne($triage_id);
        $model->color = 'ฟ้า';
        $lab_pos = in_array($model->lab_result, ['PCR-Positive', 'ATK-Positive']);

        if ($lab_pos) {
            $model->color = 'เขียว';
        }
        if ($lab_pos && $model->risk) {
            $model->color = 'เหลือง';
        }
        if ($lab_pos && in_array($model->xray, ['Positive', 'Suspicious'])) {
            $model->color = 'เหลือง';
        }
        /*
          if ($covid_test_pos && $model->risk > '0' && in_array($model->cxr, ['Positive', 'Suspicious']) && $model->spo2 > 96) {
          $model->symtom_level = '3.2';
          $model->color = 'เหลือง';
          }
         */
        if ($lab_pos && $model->spo2 <= 96) {
            $model->color = 'แดง';
        }

        $model->update();
    }

}
