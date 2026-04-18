<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $doctor_id
 * @property string $doctor_last_name
 * @property string $doctor_first_name
 * @property integer $doctor_npsi
 * @property string $doctor_state_lic
 *
 * @property Records[] $records
 */
class Doctor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'doctor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['doctor_last_name', 'doctor_first_name', 'doctor_npsi', 'doctor_state_lic'], 'required'],
            [['doctor_npsi'], 'integer'],
            [['doctor_last_name', 'doctor_first_name'], 'string', 'max' => 32],
            [['doctor_state_lic'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'doctor_id' => 'Doctor ID',
            'doctor_last_name' => 'Fl state Doctor + assoc. lic data\'s.',
            'doctor_first_name' => 'Doctor First Name',
            'doctor_npsi' => 'Doctor Npsi',
            'doctor_state_lic' => 'Doctor State Lic',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['doctor_id' => 'doctor_id']);
    }
}
