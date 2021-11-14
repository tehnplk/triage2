<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "c_changwat".
 *
 * @property string $code
 * @property string|null $name
 * @property string|null $zonecode
 * @property string|null $name_en
 */
class Changwat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_changwat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['code', 'zonecode'], 'string', 'max' => 2],
            [['name', 'name_en'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'zonecode' => 'Zonecode',
            'name_en' => 'Name En',
        ];
    }
}
