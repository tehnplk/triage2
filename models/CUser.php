<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property string|null $username
 * @property string|null $password
 * @property string|null $password2
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $role
 * @property string|null $cid
 * @property string|null $fullname
 * @property string|null $onestop
 * @property string|null $last
 * @property string|null $last_session
 */
class CUser extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['hoscode', 'hosname', 'username', 'password', 'password2', 'auth_key', 'access_token', 'role', 'fullname', 'onestop', 'last'], 'string', 'max' => 255],
                [['cid'], 'string', 'max' => 13],
                [['username'], 'unique'],
                [['last_session', 'last_ip'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'hoscode' => 'Hoscode',
            'hosname' => 'Hosname',
            'username' => 'Username',
            'password' => 'Password',
            'password2' => 'Password2',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'role' => 'Role',
            'cid' => 'เลขบัตรประชาชน',
            'fullname' => 'ชื่อ-นามสกุล',
            'onestop' => 'One Stop Service',
            'last' => 'Last',
            'last_session' => 'Last Session',
            'last_ip' => 'Last IP'
        ];
    }

}
