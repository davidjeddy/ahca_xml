<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "icd9_code".
 *
 * @property integer $icd9_code_id
 * @property string $icd9_code_value
 * @property string $icd9_code_description
 *
 * @property Records[] $records
 */
class Icd9Code extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icd9_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icd9_code_value', 'icd9_code_description'], 'required'],
            [['icd9_code_value'], 'string', 'max'       => 10],
            [['icd9_code_description'], 'string', 'max' => 2048]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'icd9_code_id'          => 'ICD9 Code ID',
            'icd9_code_value'       => 'ICD9 Code Value',
            'icd9_code_description' => 'ICD9 Code Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['idc9_code_id' => 'icd9_code_id']);
    }
}
