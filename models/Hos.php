<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "c_hos".
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $amp
 */
class Hos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'c_hos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'string', 'max' => 5],
            [['name', 'amp'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'amp' => 'Amp',
        ];
    }
}
