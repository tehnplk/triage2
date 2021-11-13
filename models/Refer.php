<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "refer".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $refer_date
 * @property string|null $refer_time
 * @property string|null $refer_to
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Refer extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'refer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['visit_id', 'patient_id'], 'integer'],
            [['refer_date', 'refer_time'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'refer_to', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
            [['refer_date'], 'unique', 'targetAttribute' => ['patient_id', 'refer_date'], 'message' => 'ข้อมูลซ้ำซ้อนในวันเดียวกัน'],
            [['refer_date', 'refer_to'], 'required']
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
            'refer_date' => 'วันที่',
            'refer_time' => 'เวลา',
            'refer_to' => 'ส่งต่อ',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

}
