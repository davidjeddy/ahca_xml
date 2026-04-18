<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "princ_payer".
 *
 * @property integer $princ_payer_id
 * @property string $princ_payer_value
 * @property string $princ_payer_description
 *
 * @property Records[] $records
 */
class PrinciplePayer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'princ_payer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['princ_payer_value'], 'required'],
            [['princ_payer_description'], 'string'],
            [['princ_payer_value'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'princ_payer_id' => 'Princ Payer ID',
            'princ_payer_value' => 'Princ Payer Value',
            'princ_payer_description' => 'Princ Payer Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecords()
    {
        return $this->hasMany(Records::className(), ['princ_payer_id' => 'princ_payer_id']);
    }
}
