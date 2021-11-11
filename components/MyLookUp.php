<?php

namespace app\components;

use yii\base\Component;
use yii\helpers\ArrayHelper;

class MyLookUp extends Component {

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

}
