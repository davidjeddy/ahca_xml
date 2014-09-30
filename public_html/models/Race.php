<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "race".
 *
 * @property integer $race_id
 * @property integer $race_value
 * @property string $race_description
 *
 * @property Records[] $records
 */
class Race extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'race';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['race_value', 'race_description'], 'required'],
            [['race_value'], 'integer'],
            [['race_description'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'race_id' => 'Race ID',
            'race_value' => 'Race Value',
            'race_description' => 'Race Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['race_id' => 'race_id']);
    }
}
