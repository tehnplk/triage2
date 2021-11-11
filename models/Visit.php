<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $visit_date
 * @property string|null $visit_time
 * @property int|null $bw
 * @property int|null $bh
 * @property float|null $bmi
 * @property float|null $temperature
 * @property int|null $spo2
 * @property int|null $bps
 * @property int|null $bpd
 * @property int|null $pulse
 * @property string|null $cc อาการ
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Visit extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'visit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['patient_id', 'bw', 'bh', 'spo2', 'bps', 'bpd', 'pulse'], 'integer'],
            [['visit_date', 'visit_time'], 'safe'],
            [['bmi', 'temperature'], 'number'],
            [['hoscode', 'hosname', 'patient_fullname', 'cc', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
            [['visit_date'], 'unique', 'targetAttribute' => ['hoscode', 'patient_id', 'visit_date'], 'message' => 'ข้อมูลซ้ำซ้อนในวันเดียวกัน'],
            [['patient_id', 'visit_date', 'visit_time', 'bw', 'bh', 'spo2'], 'required'],
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
            'patient_id' => 'Patient ID',
            'patient_cid' => 'เลข13หลัก',
            'patient_fullname' => 'ชื่อ-สกุล',
            'visit_date' => 'วันที่มา',
            'visit_time' => 'เวลามา',
            'bw' => 'น้ำหนัก(กก)',
            'bh' => 'ส่วนสูง(ซม)',
            'bmi' => 'BMI',
            'temperature' => 'อุณหภูมิ(C)',
            'spo2' => 'SpO2',
            'bps' => 'ความดันบน(BPS)',
            'bpd' => 'ความดันล่าง(BPD)',
            'pulse' => 'ชีพจร(Pulse)',
            'cc' => 'อาการเจ็บป่วย',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        $this->bmi = ($this->bw) / ( ($this->bh / 100) * ($this->bh / 100));

        if ($insert) {
            $this->updateAttributes(['bmi']);
        } else {
            $this->updateAttributes(['bmi']);
        }
    }

}
