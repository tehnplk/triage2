<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drug".
 *
 * @property int $id
 * @property string|null $hoscode
 * @property string|null $hosname
 * @property int|null $visit_id
 * @property int|null $patient_id
 * @property string|null $patient_cid
 * @property string|null $patient_fullname
 * @property string|null $drug_date
 * @property string|null $drug_time
 * @property string|null $drug_id
 * @property string|null $drug_name
 * @property int|null $drug_amount
 * @property string|null $drug_unit
 * @property string|null $drug_usage
 * @property string|null $drug_dispenser
 * @property string|null $created_at
 * @property string|null $created_by
 * @property string|null $updated_at
 * @property string|null $updated_by
 */
class Drug extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'drug';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['visit_id', 'patient_id', 'drug_amount'], 'integer'],
            [['drug_date', 'drug_time'], 'safe'],
            [['hoscode', 'hosname', 'patient_fullname', 'drug_id', 'drug_name', 'drug_unit', 'drug_usage', 'drug_dispenser', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'string', 'max' => 255],
            [['patient_cid'], 'string', 'max' => 13],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hoscode' => 'Hoscode',
            'hosname' => 'Hosname',
            'visit_id' => 'Visit ID',
            'patient_id' => 'Patient ID',
            'patient_cid' => 'Patient Cid',
            'patient_fullname' => 'Patient Fullname',
            'drug_date' => 'Drug Date',
            'drug_time' => 'Drug Time',
            'drug_id' => 'Drug ID',
            'drug_name' => 'Drug Name',
            'drug_amount' => 'Drug Amount',
            'drug_unit' => 'Drug Unit',
            'drug_usage' => 'Drug Usage',
            'drug_dispenser' => 'Drug Dispenser',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }
}
