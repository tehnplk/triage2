<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property string|null $cid
 * @property string|null $prefix
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $bdate
 * @property string|null $bmon
 * @property string|null $byear
 * @property string|null $birth
 * @property int|null $age_y
 * @property int|null $age_m
 * @property int|null $age_d
 * @property string|null $marital
 * @property string|null $nation
 * @property string|null $family
 * @property string|null $personal_disease
 * @property string|null $addr_no
 * @property string|null $addr_road
 * @property string|null $addr_moo
 * @property string|null $addr_tmb
 * @property string|null $addr_amp
 * @property string|null $addr_chw
 * @property string|null $tel
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Patient extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'patient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['birth'], 'safe'],
            [['age_y', 'age_m', 'age_d'], 'integer'],
            [['hoscode', 'hosname', 'prefix', 'first_name', 'last_name', 'full_name', 'gender', 'marital', 'nation', 'family', 'personal_disease', 'addr_no', 'addr_road', 'addr_moo', 'addr_tmb', 'addr_amp', 'addr_chw', 'tel', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['bdate', 'bmon'], 'string', 'max' => 2],
            [['byear'], 'string', 'max' => 4],
            [['hoscode', 'cid', 'prefix', 'first_name', 'last_name', 'gender', 'bdate', 'bmon', 'byear'], 'required'],
            [['cid'], 'unique', 'targetAttribute' => ['hoscode', 'cid'], 'message' => 'เลขบัตรนี้มีในระบบอยู่แล้ว'],
            [['cid'], 'my_validate_cid'],
            [['hoscode'], 'my_validate_hoscode']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'hoscode' => 'รหัสหน่วยงาน',
            'hosname' => 'Hosname',
            'cid' => 'เลข13หลัก',
            'prefix' => 'คำนำหน้า',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'full_name' => 'ชื่อ-สกุล',
            'gender' => 'เพศ',
            'bdate' => 'วันเกิด',
            'bmon' => 'เดือนเกิด',
            'byear' => 'ปีพ.ศ.เกิด',
            'birth' => 'Birth',
            'age_y' => 'อายุ(ปี)',
            'age_m' => 'เดือน',
            'age_d' => 'วัน',
            'marital' => 'สถานภาพ',
            'nation' => 'สัญชาติ',
            'family' => 'ชื่อครอบครัว',
            'personal_disease' => 'โรคประจำตัว',
            'addr_no' => 'บ้านเลขที่',
            'addr_road' => 'ถนน',
            'addr_moo' => 'หมู่ที่',
            'addr_tmb' => 'ตำบล',
            'addr_amp' => 'อำเภอ',
            'addr_chw' => 'จังหวัด',
            'tel' => 'เบอร์ติดต่อ',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function my_validate_cid($attribute_name, $params) {

        $is_valid = FALSE;
        $nationalId = trim($this->$attribute_name);

        if (strlen($nationalId) === 13) {
            $digits = str_split($nationalId);
            $lastDigit = array_pop($digits);
            $sum = array_sum(array_map(function($d, $k) {
                        return ($k + 2) * $d;
                    }, array_reverse($digits), array_keys($digits)));
            $is_valid = $lastDigit === strval((11 - $sum % 11) % 10);
        }
        if (!$is_valid) {
            $this->addError($attribute_name, 'เลขบัตรประชาชนไม่ถูกต้อง');
            return FALSE;
        }
        return TRUE;
    }

    public function my_validate_hoscode($attribute_name, $params) {

        $is_valid = FALSE;
        $_hoscode = trim($this->$attribute_name);

        if (strlen($_hoscode) === 5) {
            $is_valid = true;
        }
        if (!$is_valid) {
            $this->addError($attribute_name, 'รหัสหน่วยงานไม่ถูกต้อง');
            return FALSE;
        }
        return TRUE;
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        //คำนวณอายุ
        $yyyy = intval($this->byear) - 543;
        $mm = $this->bmon;
        $dd = $this->bdate;
        $dob = $dd . '-' . $mm . '-' . $yyyy;
        $bday = new \DateTime($dob);
        $diff = $bday->diff(new \DateTime);
        $this->birth = "$yyyy-$mm-$dd";
        $this->age_y = $diff->y;
        $this->age_m = $diff->m;
        $this->age_d = $diff->d;
        //จบอายุ

        $this->full_name = "$this->prefix$this->first_name $this->last_name";

        if ($insert) {
            $this->updateAttributes(['birth']);
            $this->updateAttributes(['age_y', 'age_m', 'age_d']);
            $this->updateAttributes(['full_name']);
        } else {
            $this->updateAttributes(['birth']);
            $this->updateAttributes(['age_y', 'age_m', 'age_d']);
            $this->updateAttributes(['full_name']);
        }
    }

    public function behaviors() {
        return [
            [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new \yii\db\Expression('NOW()'),
            ],
            [
                'class' => \yii\behaviors\BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
        ];
    }

}
