<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "c_user".
 * @property string $id
 * @property string $username
 * @property string $password
 * @property string $hoscode
 * @property string $auth_key
 * @property string $onestop
 * @property string $role
 * @property string $fullname
 * @property string $last
 * @property string $last_session
 * @property string $last_ip
 */
class UserDb extends ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'c_user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['username', 'password', 'id'], 'required'],
                [['username', 'password'], 'string', 'max' => 100],
                [['hoscode', 'auth_key', 'onestop', 'role', 'fullname', 'last', 'last_session', 'last_ip'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'UserId',
            'username' => 'Username',
            'password' => 'Password',
            'hoscode' => 'รหัสหน่วยบริการ',
            'last' => 'เข้าใช้เมื่อ',
            'role' => 'กลุ่มสิทธิการใช้งาน'
        ];
    }

    /** INCLUDE USER LOGIN VALIDATION FUNCTIONS* */

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    /* modified */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['access_token' => $token]);
    }

    /* removed
      public static function findIdentityByAccessToken($token)
      {
      throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
      }
     */

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param  string      $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        $expire = \Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }

        return static::findOne([
                    'password_reset_token' => $token
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
        //return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    public function getHoscode() {
        return $this->hoscode;
    }

    public function getFullname() {
        return $this->fullname;
    }

    public function getRole() {
        return $this->role;
    }

    public function getOnestop() {
        return strtolower($this->onestop) === 'yes';
    }

    public function getLastSession() {
        return $this->last_session;
    }

    public function getLastIp() {
        return $this->last_ip;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === $password;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->password_hash = Security::generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Security::generateRandomKey();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

    /** EXTENSION MOVIE * */
}
