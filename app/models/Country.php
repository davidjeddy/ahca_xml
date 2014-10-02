<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $country_id
 * @property string $country_name
 * @property string $country_value
 *
 * @property Records[] $records
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_name'], 'required'],
            [['country_value'], 'string'],
            [['country_name'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country_id' => 'Country ID',
            'country_name' => 'Country Name',
            'country_value' => 'Country Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['country_id' => 'country_id']);
    }
}
