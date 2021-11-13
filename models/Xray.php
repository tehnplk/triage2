<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "xray".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $xray_date
 * @property string|null $xray_time
 * @property string|null $xray_type
 * @property string|null $xray_result
 * @property string|null $xray_cat
 * @property string|null $covid19_pneumonia_cat
 * @property string|null $conclusion
 * @property string|null $comparison
 * @property string|null $finding
 * @property string|null $note
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Xray extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'xray';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['visit_id', 'patient_id'], 'integer'],
            [['xray_date', 'xray_time'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'xray_type', 'xray_result', 'xray_cat', 'covid19_pneumonia_cat', 'conclusion', 'comparison', 'finding', 'note', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
            [['xray_date',], 'unique', 'targetAttribute' => ['patient_id', 'xray_date'], 'message' => 'ข้อมูลซ้ำซ้อนในวันเดียวกัน โปรดแก้ไขข้อมูลเดิม'],
            [['xray_date'], 'required']
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
            'xray_date' => 'วันที่',
            'xray_time' => 'เวลา',
            'xray_type' => 'Xray Type',
            'xray_result' => 'Xray Result',
            'xray_cat' => 'Xray Cat',
            'covid19_pneumonia_cat' => 'Covid19 Pneumonia Cat',
            'conclusion' => 'Conclusion',
            'comparison' => 'Comparison',
            'finding' => 'Finding',
            'note' => 'Note',
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
