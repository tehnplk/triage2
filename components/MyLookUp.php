<?php

namespace app\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;

class MyLookUp extends Component {

    public static function chw() {
        $sql = "select code, name from c_changwat order by name asc";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, 'code', 'name');
        return $items;
    }

    public static function amp($chw_code) {
        $sql = "select codefull code, name from c_amp where changwat = '$chw_code'";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, 'code', 'name');
        return $items;
    }

    public static function amp_plk() {
        $items = [
            '01' => 'เมือง',
            '02' => 'นครไทย',
            '03' => 'ชาติตระการ',
            '04' => 'บางระกำ',
            '05' => 'บางกระทุ่ม',
            '06' => 'พรหมพิราม',
            '07' => 'วัดโบสถ์',
            '08' => 'วังทอง',
            '09' => 'เนินมะปราง'
        ];
        return $items;
    }

    public static function tmb($amp_code) {
        $sql = "select codefull code, name from c_tmb where ampurcode = '$amp_code'";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, 'code', 'name');
        return $items;
    }

    public static function byear() {
        $max = date('Y') + 543;
        $min = $max - 120;
        $items = [];

        for ($i = $max; $i >= $min; $i--) {
            $items[$i] = $i;
        }
        return $items;
    }

    public static function bmon() {
        $bmon = [];
        $bmon['01'] = 'ม.ค.';
        $bmon['02'] = 'ก.พ.';
        $bmon['03'] = 'มี.ค.';
        $bmon['04'] = 'เม.ย.';
        $bmon['05'] = 'พ.ค.';
        $bmon['06'] = 'มิ.ย.';
        $bmon['07'] = 'ก.ค.';
        $bmon['08'] = 'ส.ค.';
        $bmon['09'] = 'ก.ย.';
        $bmon['10'] = 'ต.ค.';
        $bmon['11'] = 'พ.ย.';
        $bmon['12'] = 'ธ.ค.';
        return $bmon;
    }

    public static function bdate() {
        $items = [];
        for ($i = 1; $i <= 31; $i++) {
            if (strlen($i) == 1) {
                $i = "0" . $i;
            }
            $items[$i] = $i;
        }
        return $items;
    }

    public static function marital() {
        return [
            'โสด' => 'โสด',
            'สมรส' => 'สมรส',
            'หม้าย' => 'หม้าย',
            'หย่า' => 'หย่า',
            'แยกกันอยู่' => 'แยกกันอยู่',
            'ไม่ทราบ' => 'ไม่ทราบ'
        ];
    }

    public static function covid_test_result() {

        return [
            //'ATK-Negative' => 'ATK-Negative(-)',
            'ATK-Positive' => 'ATK-Positive(+)',
            //'PCR-Negative' => 'PCR-Negative(-)',
            'PCR-Positive' => 'RT-PCR-Positive(+)',
            //'PCR-Inconclusive' => 'PCR-Inconclusive'
        ];
    }

    public static function trigger_color() {
        return [
            'ฟ้า' => 'ฟ้า',
            'เขียว' => 'เขียว',
            'เหลือง' => 'เหลือง',
            'แดง' => 'แดง',
            'none' => 'ไม่ได้จัดกลุ่ม'
        ];
    }

    public static function xray_categoly() {
        return [
            'CAT-1' => 'CAT-1',
            'CAT-2' => 'CAT-2',
            'CAT-C' => 'CAT-C',
            'CAT-3' => 'CAT-3',
            'CAT-4' => 'CAT-4',
            'CAT-5' => 'CAT-5',
        ];
    }

    public static function covid19_pneumonia_cat() {
        return [
            'Negative' => ' Negative for pneumonia',
            'Suspicious' => 'Suspicious:Equivocal for pneumonia',
            'Positive' => 'Positive:Typical for COVID-19 pneumonia',
            'Other diseases' => 'Other diseases'
        ];
    }

    public static function xray_comparision() {
        return [
            'None' => 'None',
            'Stable' => 'Stable',
            'Progression' => 'Progression',
            'Improvement' => 'Improvement'
        ];
    }

    public static function refer_place() {
        $sql = "select name as id,name from c_refer_place";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, 'id', 'name');
        return $items;
    }

    public static function claim_code() {
        $sql = "select code as id,concat(code,'-',name) name from c_claim";
        $raw = \Yii::$app->db->createCommand($sql)->queryAll();
        $items = ArrayHelper::map($raw, 'id', 'name');
        return $items;
    }

}
