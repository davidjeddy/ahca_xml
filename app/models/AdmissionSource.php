<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admission_source".
 *
 * @property integer $admission_source_id
 * @property string $admission_source_value
 * @property string $admission_source_description
 *
 * @property Records[] $records
 */
class AdmissionSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admission_source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admission_source_value', 'admission_source_description'], 'required'],
            [['admission_source_value', 'admission_source_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admission_source_id' => 'Admission Source ID',
            'admission_source_value' => 'Admission Source Value',
            'admission_source_description' => 'Admission Source Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['admission_source_id' => 'admission_source_id']);
    }
}
