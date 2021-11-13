<?php

namespace app\modules\patient\controllers;

use yii\web\Controller;

/**
 * Default controller for the `patient` module
 */
class AjaxController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionListAmp() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $sql = "select distinct amp_code as id,amp_name_th_short name from c_tmb_post where chw_code = '$cat_id'";
                $out = \Yii::$app->db->createCommand($sql)->queryAll();


                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionListTmb() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];

                $sql = "select tmb_code as id,tmb_name_th_short name from c_tmb_post where amp_code = '$cat_id'";
                $out = \Yii::$app->db->createCommand($sql)->queryAll();


                return ['output' => $out, 'selected' => ''];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

}
