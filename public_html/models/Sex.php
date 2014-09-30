<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sex".
 *
 * @property integer $sex_id
 * @property string $sex_value
 * @property string $sex_description
 *
 * @property Records[] $records
 */
class Sex extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sex';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex_value', 'sex_description'], 'required'],
            [['sex_value', 'sex_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sex_id' => 'Sex ID',
            'sex_value' => 'Sex Value',
            'sex_description' => 'Sex Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['sex_id' => 'sex_id']);
    }
}
