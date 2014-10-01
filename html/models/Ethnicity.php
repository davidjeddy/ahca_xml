<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ethnicity".
 *
 * @property integer $ethnicity_id
 * @property string $ethnicity_value
 * @property string $ethnicity_description
 *
 * @property Records[] $records
 */
class Ethnicity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ethnicity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ethnicity_value', 'ethnicity_description'], 'required'],
            [['ethnicity_value', 'ethnicity_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ethnicity_id' => 'Ethnicity ID',
            'ethnicity_value' => 'Ethnicity Value',
            'ethnicity_description' => 'Ethnicity Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['ethnicity_id' => 'ethnicity_id']);
    }
}
