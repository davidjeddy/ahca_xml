<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_code".
 *
 * @property integer $servicecode_id
 * @property integer $servicecode_value
 * @property string $servicecode_description
 *
 * @property Records[] $records
 */
class ServiceCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['servicecode_value', 'servicecode_description'], 'required'],
            [['servicecode_value'], 'integer'],
            [['servicecode_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'servicecode_id' => 'Servicecode ID',
            'servicecode_value' => 'Servicecode Value',
            'servicecode_description' => 'Servicecode Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['service_id' => 'servicecode_id']);
    }
}
