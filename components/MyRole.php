<?php

namespace app\components;

use yii\base\Component;

class MyRole extends Component {

    public static function getUserId() {
        return \Yii::$app->user->id;
    }

    public static function getRole() {
        $role = empty(\Yii::$app->user->identity->role) ? '' : \Yii::$app->user->identity->role;
        return $role;
    }

    public static function is_adm() {
        $allow_group = ['saa', 'adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_adm() {
        $allow_group = ['saa', 'adm'];

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
        $allow_group = ['saa', 'rxx'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_reg() {
        $allow_group = ['saa', 'reg', 'vac', 'adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_vac() {
        $allow_group = ['saa', 'vac', 'adm'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_root() {
        $allow_group = ['saa'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_pt() {
        return self::can_reg();
    }

    public static function can_box() {
        $allow_group = ['box'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

}
