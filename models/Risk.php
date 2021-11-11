<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "risk".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $risk_date
 * @property string|null $risk_time
 * @property string|null $aging อายุมากกว่า 60ปี
 * @property string|null $bmi bmiมากกว่า30 หรือน้ำหนักมากกว่า90
 * @property string|null $dm โรคเบาหวานที่คุมไม่ได้
 * @property string|null $copd COPD
 * @property string|null $cirrhosis Cirrhosis
 * @property string|null $stroke Stroke
 * @property string|null $ihd IHD
 * @property string|null $hiv HIV
 * @property string|null $cancer CANCER
 * @property string|null $suppress กินยากดภูมิคุ้มกัน
 * @property string|null $preg กำลังตั้งครรภ์
 * @property string|null $non_risk ไม่มีความเสี่ยง
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Risk extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'risk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['visit_id', 'patient_id'], 'integer'],
            [['risk_date', 'risk_time'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'aging', 'bmi', 'dm', 'copd', 'cirrhosis', 'stroke', 'ihd', 'hiv', 'cancer', 'suppress', 'preg', 'non_risk', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
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
            'patient_cid' => 'เลข13หลัก',
            'patient_fullname' => 'ชื่อ-สกุล',
            'risk_date' => 'วันที่ประเมิน',
            'risk_time' => 'เวลา',
            'aging' => 'อายุ>60ปี',
            'bmi' => 'BMI>30 หรือน้ำหนัก>90',
            'dm' => 'โรคเบาหวานที่คุมไม่ได้',
            'copd' => 'COPD',
            'cirrhosis' => 'Cirrhosis',
            'stroke' => 'Stroke',
            'ihd' => 'IHD',
            'hiv' => 'HIV',
            'cancer' => 'Cancer',
            'suppress' => 'กินยากดภูมิคุ้มกัน',
            'preg' => 'กำลังตั้งครรภ์',
            'non_risk' => 'ไม่มีปัจจัยเสี่ยง',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

}
