<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_options".
 *
 * @property integer $report_option_id
 * @property string $report_window
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report_options';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['report_window'], 'required'],
            [['report_window'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'report_option_id' => 'Report Options',
            'report_window'    => 'Report Window',
        ];
    }
}
