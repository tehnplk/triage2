<?php

namespace app\components;

use yii\base\Component;

class MyDate extends Component {

    public static function thaiDate($date) {

        if (empty($date)) {
            return "-";
        }

        $strYear = date("Y", strtotime($date)) + 543;
        $strMonth = date("n", strtotime($date));
        $strDay = date("j", strtotime($date));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    public static function thaiDateCc($date) {

        if (empty($date)) {
            return "-";
        }

        $strYear = date("Y", strtotime($date));
        $strMonth = date("n", strtotime($date));
        $strDay = date("j", strtotime($date));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    public static function shortDate($date) {

        if (empty($date)) {
            return "-";
        }

        $strYear = date("Y", strtotime($date)) + 543;
        $strMonth = date("n", strtotime($date));
        $strDay = date("j", strtotime($date));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        if (strlen($strMonth) == 1) {
            $strMonth = "0" . $strMonth;
        }


        return "$strDay/$strMonth/$strYear";
    }

    public static function shortDateEng($date) {

        if (empty($date)) {
            return "-";
        }

        $strYear = date("Y", strtotime($date));
        $strMonth = date("n", strtotime($date));
        $strDay = date("j", strtotime($date));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        if (strlen($strMonth) == 1) {
            $strMonth = "0" . $strMonth;
        }


        return "$strDay/$strMonth/$strYear";
    }

    public static function thaiDateTime($datetime) {

        if (empty($datetime)) {
            return "-";
        }
        $strYear = date("Y", strtotime($datetime)) + 543;
        $strMonth = date("n", strtotime($datetime));
        $strDay = date("j", strtotime($datetime));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strHour = date("H", strtotime($datetime));
        $strMinute = date("i", strtotime($datetime));
        $strSeconds = date("s", strtotime($datetime));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
    }

    public static function thaiTime($datetime) {

        if (empty($datetime)) {
            return "-";
        }
        $strYear = date("Y", strtotime($datetime)) + 543;
        $strMonth = date("n", strtotime($datetime));
        $strDay = date("j", strtotime($datetime));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strHour = date("H", strtotime($datetime));
        $strMinute = date("i", strtotime($datetime));

        return "$strHour:$strMinute";
    }

    public static function shortTime($datetime) {

        if (empty($datetime)) {
            return "-";
        }
        $strYear = date("Y", strtotime($datetime)) + 543;
        $strMonth = date("n", strtotime($datetime));
        $strDay = date("j", strtotime($datetime));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strHour = date("H", strtotime($datetime));
        $strMinute = date("i", strtotime($datetime));

        return "$strHour:$strMinute";
    }

    public static function thaiLongDateTime($datetime) {

        if (empty($datetime)) {
            return "-";
        }
        $strYear = date("Y", strtotime($datetime)) + 543;
        $strMonth = date("n", strtotime($datetime));
        $strDay = date("j", strtotime($datetime));
        if (strlen($strDay) == 1) {
            $strDay = "0" . $strDay;
        }

        $strHour = date("H", strtotime($datetime));
        $strMinute = date("i", strtotime($datetime));
        $strSeconds = date("s", strtotime($datetime));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear เวลา $strHour:$strMinute:$strSeconds  น.";
    }

}
