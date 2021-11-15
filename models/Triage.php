<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "triage".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property int|null $doi
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $patient_age
 * @property string|null $patient_gender
 * @property string|null $patient_chw
 * @property string|null $patient_amp
 * @property string|null $triage_date
 * @property string|null $triage_time
 * @property string|null $inscl_code
 * @property string|null $claim_code
 * @property string|null $spo2
 * @property string|null $lab_date
 * @property string|null $lab_kind
 * @property string|null $lab_result
 * @property string|null $risk
 * @property string|null $xray
 * @property string|null $color
 * @property string|null $family
 * @property string|null $refer_to
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Triage extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'triage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['visit_id', 'patient_id', 'doi'], 'integer'],
            [['triage_date', 'triage_time', 'lab_date'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'patient_age', 'patient_gender', 'inscl_code', 'claim_code', 'spo2', 'lab_kind', 'lab_result', 'risk', 'color', 'refer_to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid',], 'string', 'max' => 13],
            [['family', 'xray', 'patient_chw', 'patient_amp'], 'string']
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
            'visit_id' => 'Visit ID',
            'patient_id' => 'Patient ID',
            'patient_cid' => 'Patient Cid',
            'patient_fullname' => 'Patient Fullname',
            'patient_age' => 'Patient Age',
            'patient_gender' => 'Patient Gender',
            'patient_chw' => 'จังหวัด',
            'patient_amp' => 'อำเภอ',
            'triage_date' => 'วันที่',
            'triage_time' => 'เวลา',
            'inscl_code' => 'Inscl Code',
            'claim_code' => 'Claim Code',
            'spo2' => 'SpO2',
            'lab_date' => 'Lab Date',
            'lab_kind' => 'Lab Kind',
            'lab_result' => 'การตรวจ',
            'risk' => 'ปัจจัยเสี่ยง',
            'xray' => 'CXR',
            'doi' => 'DOI',
            'color' => 'สี',
            'family' => 'ชื่อครอบครัว',
            'refer_to' => 'ส่งต่อ',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
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
