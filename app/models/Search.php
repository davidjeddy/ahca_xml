<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Records;

/**
 * search represents the model behind the search form about `app\models\records`.
 */
class Search extends records
{
    public function rules()
    {
        return [
            [['record_id'], 'integer'],
            [['med_rec_num'], 'string'],
            [['ssn', ], 'number'],
            [['first_name', 'last_name', 'dob'], 'string'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = records::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'record_id'   => $this->record_id,
            'med_rec_num' => $this->med_rec_num,
            'first_name'  => $this->first_name,
            'last_name'   => $this->last_name,
            'ssn'         => $this->ssn,
            'dob'         => $this->dob,
        ]);

        $query
            ->andFilterWhere(['=',      'record_id',    $this->record_id])
            ->andFilterWhere(['like',   'med_rec_num',  $this->med_rec_num])
            ->andFilterWhere(['like',   'first_name',   $this->first_name])
            ->andFilterWhere(['like',   'last_name',    $this->last_name])
            ->andFilterWhere(['like',   'ssn',          $this->ssn])
            ->andFilterWhere([' = ',    'dob',          $this->dob])
        ;

        return $dataProvider;
    }
}
