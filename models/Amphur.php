<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "c_amp".
 *
 * @property string $code
 * @property string|null $name
 * @property string $codefull
 * @property string $changwat
 * @property string|null $flag_status สถานนะของพื้นที่ 0=ปกติ 1=เลิกใช้(แยก/ย้ายไปพื้นที่อื่น)
 * @property string|null $chw_name
 */
class Amphur extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_amp';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'codefull', 'changwat'], 'required'],
            [['code', 'changwat'], 'string', 'max' => 2],
            [['name', 'chw_name'], 'string', 'max' => 255],
            [['codefull'], 'string', 'max' => 4],
            [['flag_status'], 'string', 'max' => 1],
            [['code', 'codefull', 'changwat'], 'unique', 'targetAttribute' => ['code', 'codefull', 'changwat']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'codefull' => 'Codefull',
            'changwat' => 'Changwat',
            'flag_status' => 'Flag Status',
            'chw_name' => 'Chw Name',
        ];
    }
}
