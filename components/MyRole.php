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
        $allow_group = ['adm','med'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

    public static function can_med() {
        $allow_group = ['adm','med'];

        $user_group = substr(self::getRole(), 0, 3);
        if (in_array($user_group, $allow_group)) {
            return TRUE;
        }
        return FALSE;
    }

}
