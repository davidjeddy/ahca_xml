<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_status".
 *
 * @property integer $patient_status_id
 * @property string $patient_status_value
 * @property string $patient_status_description
 *
 * @property Records[] $records
 */
class PatientStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['patient_status_value', 'patient_status_description'], 'required'],
            [['patient_status_value'], 'string', 'max' => 2],
            [['patient_status_description'], 'string', 'max' => 2048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'patient_status_id' => 'Patient Status ID',
            'patient_status_value' => 'Patient Status Value',
            'patient_status_description' => 'Patient Status Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['patient_status_id' => 'patient_status_id']);
    }
}
