<?php

namespace app\models;

use Yii;
use app\models\Risk;
use app\models\Patient;
use app\models\Lab;

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
 * @property string|null $claim_code
 * @property string|null $claim_name
 * @property string|null $family
 * @property int|null $age_y
 * @property int|null $age_m
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
            [['patient_id', 'bw', 'bh', 'spo2', 'bps', 'bpd', 'pulse', 'age_y', 'age_m'], 'integer'],
            [['visit_date', 'visit_time', 'family'], 'safe'],
            [['bmi', 'temperature'], 'number'],
            [['hoscode', 'hosname', 'patient_fullname', 'cc', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
            [['visit_date'], 'unique', 'targetAttribute' => ['hoscode', 'patient_id', 'visit_date'], 'message' => 'ข้อมูลซ้ำซ้อนในวันเดียวกัน'],
            [['patient_id', 'visit_date', 'visit_time', 'bw', 'bh', 'spo2'], 'required'],
            [['claim_code', 'claim_name'], 'string']
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
            'age_y' => 'อายุ(ปี)',
            'age_m' => 'เดือน',
            'family' => 'ชื่อครอบครัว',
            'claim_code' => 'รหัสสิทธิ',
            'claim_name' => 'ชื่อสิทธิรักษา',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);

        $patient = Patient::findOne($this->patient_id);

        $this->bmi = ($this->bw) / ( ($this->bh / 100) * ($this->bh / 100));

        //คำนวณอายุวันที่มา visit
        $dob = $patient->birth;
        $bday = new \DateTime($dob);
        $diff = $bday->diff(new \DateTime($this->visit_date));
        $this->age_y = $diff->y;
        $this->age_m = $diff->m;

        //ความเสี่ยง
        $risk = new Risk();
        $risk->hoscode = $this->hoscode;
        $risk->patient_id = $this->patient_id;
        $risk->patient_cid = $this->patient_cid;
        $risk->patient_fullname = $this->patient_fullname;
        $risk->visit_id = $this->id;
        $risk->risk_date = $this->visit_date;
        $risk->risk_time = $this->visit_time;
        $risk->bmi = $this->bmi >= 30 || $this->bw >= 90;
        $risk->aging = $this->age_y >= 60;

        //LAB
        $lab = new Lab();
        $lab->hoscode = $this->hoscode;
        $lab->patient_id = $this->patient_id;
        $lab->patient_cid = $this->patient_cid;
        $lab->patient_fullname = $this->patient_fullname;
        $lab->visit_id = $this->id;
        $lab->lab_date = $this->visit_date;
        $lab->lab_time = $this->visit_time;


        if ($insert) {
            $this->updateAttributes(['bmi', 'age_y', 'age_m']);
            $risk->save(false);
            $lab->save(false);
        } else {
            $this->updateAttributes(['bmi']);
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
