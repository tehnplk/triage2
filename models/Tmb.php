<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "c_tmb".
 *
 * @property string $code
 * @property string|null $name
 * @property string $codefull
 * @property string $ampurcode
 * @property string|null $ampurname
 * @property string $changwatcode
 * @property string|null $changwatname
 * @property string|null $flag_status สถานนะของพื้นที่ 0=ปกติ 1=เลิกใช้(แยก/ย้ายไปพื้นที่อื่น)
 */
class Tmb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_tmb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'codefull', 'ampurcode', 'changwatcode'], 'required'],
            [['code', 'changwatcode'], 'string', 'max' => 2],
            [['name', 'ampurname', 'changwatname'], 'string', 'max' => 255],
            [['codefull'], 'string', 'max' => 6],
            [['ampurcode'], 'string', 'max' => 4],
            [['flag_status'], 'string', 'max' => 1],
            [['code', 'codefull', 'ampurcode', 'changwatcode'], 'unique', 'targetAttribute' => ['code', 'codefull', 'ampurcode', 'changwatcode']],
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
            'ampurcode' => 'Ampurcode',
            'ampurname' => 'Ampurname',
            'changwatcode' => 'Changwatcode',
            'changwatname' => 'Changwatname',
            'flag_status' => 'Flag Status',
        ];
    }
}
