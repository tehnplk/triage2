<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $lab_date
 * @property string|null $lab_time
 * @property string|null $lab_place
 * @property string|null $lab_kind
 * @property string|null $lab_result
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Lab extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'lab';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['visit_id', 'patient_id'], 'integer'],
            [['lab_date', 'lab_time'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'lab_place', 'lab_kind', 'lab_result', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
            [['patient_id', 'lab_date', 'lab_kind'], 'unique', 'targetAttribute' => ['patient_id', 'lab_date', 'lab_kind']],
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
            'lab_date' => 'วันตรวจ',
            'lab_time' => 'เวลาตรวจ',
            'lab_place' => 'สถานที่ตรวจ',
            'lab_kind' => 'ชนิดการตรวจ',
            'lab_result' => 'ผลตรวจ',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

}
