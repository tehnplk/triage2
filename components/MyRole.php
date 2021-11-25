<?php

namespace app\components;

use yii\base\Component;

class MyRole extends Component {

    public static function getUserId() {
        return \Yii::$app->user->id;
    }

    public static function getUserHosCode() {
        $user_hoscode = empty(\Yii::$app->user->identity->hoscode) ? '00000' : \Yii::$app->user->identity->hoscode;

        return $user_hoscode;
    }

    public static function isHoscodeMatch($patient_hoscode) {
        $user_hoscode = empty(\Yii::$app->user->identity->hoscode) ? '' : \Yii::$app->user->identity->hoscode;

        return $patient_hoscode == $user_hoscode;
    }

    public static function isOneStop() {

        if (!empty(\Yii::$app->user->identity->onestop) && \Yii::$app->user->identity->onestop == 'yes') {
            return true;
        }

        return false;
    }

    public static function getRole() {
        $role = empty(\Yii::$app->user->identity->role) ? '' : \Yii::$app->user->identity->role;
        return $role;
    }

    public static function is_adm() {
        $allow_group = ['adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_adm() {
        $allow_group = ['adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function is_rxx() {
        $allow_group = ['rxx'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_rxx() {
        $allow_group = ['adm', 'rxx'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function is_reg() {
        $allow_group = ['reg'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_reg() {
        $allow_group = ['reg', 'tri', 'med', 'adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_tri() {
        $allow_group = ['tri', 'adm', 'med'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function is_med() {
        $allow_group = ['adm', 'med'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_med() {
        $allow_group = ['adm', 'med'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

}
