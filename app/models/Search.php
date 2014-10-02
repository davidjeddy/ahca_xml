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
            [['record_id', 'ethnicity_id', 'race_id', 'sex_id', 'country_id', 'service_id', 'admission_source_id', 'princ_payer_id', 'icd9_code_id', 'pharmacy_charges', 'med_surg_supply_charges', 'lab_charges', 'radiology_charges', 'cardiology_charges', 'oper_room_charges', 'anesthesia_charges', 'recovery_room_charges', 'trauma_resp_charges', 'gi_services_charges', 'extra_shock_charges', 'other_charges', 'total_charges', 'admitting_icd9_code_id', 'patient_status_id'], 'integer'],
            [['ahca_num', 'med_rec_num', 'ssn', 'dob', 'zip', 'attending_pract_id', 'attending_pract_npi', 'operating_pract_id', 'operating_pract_npi', 'other_pract_id', 'other_pract_npi', 'visit_begin_date', 'visit_end_date', 'arrival_hour', 'ed_discharge_hour', 'prin_proc_icd9_code_id'], 'safe'],
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
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'record_id' => $this->record_id,
            'ethnicity_id' => $this->ethnicity_id,
            'race_id' => $this->race_id,
            'dob' => $this->dob,
            'sex_id' => $this->sex_id,
            'country_id' => $this->country_id,
            'service_id' => $this->service_id,
            'admission_source_id' => $this->admission_source_id,
            'princ_payer_id' => $this->princ_payer_id,
            'icd9_code_id' => $this->icd9_code_id,
            'pharmacy_charges' => $this->pharmacy_charges,
            'med_surg_supply_charges' => $this->med_surg_supply_charges,
            'lab_charges' => $this->lab_charges,
            'radiology_charges' => $this->radiology_charges,
            'cardiology_charges' => $this->cardiology_charges,
            'oper_room_charges' => $this->oper_room_charges,
            'anesthesia_charges' => $this->anesthesia_charges,
            'recovery_room_charges' => $this->recovery_room_charges,
            'trauma_resp_charges' => $this->trauma_resp_charges,
            'gi_services_charges' => $this->gi_services_charges,
            'extra_shock_charges' => $this->extra_shock_charges,
            'other_charges' => $this->other_charges,
            'total_charges' => $this->total_charges,
            'visit_begin_date' => $this->visit_begin_date,
            'visit_end_date' => $this->visit_end_date,
            'admitting_icd9_code_id' => $this->admitting_icd9_code_id,
            'patient_status_id' => $this->patient_status_id,
        ]);

        $query->andFilterWhere(['like', 'ahca_num', $this->ahca_num])
            ->andFilterWhere(['like', 'med_rec_num', $this->med_rec_num])
            ->andFilterWhere(['like', 'ssn', $this->ssn])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'attending_pract_id', $this->attending_pract_id])
            ->andFilterWhere(['like', 'attending_pract_npi', $this->attending_pract_npi])
            ->andFilterWhere(['like', 'operating_pract_id', $this->operating_pract_id])
            ->andFilterWhere(['like', 'operating_pract_npi', $this->operating_pract_npi])
            ->andFilterWhere(['like', 'other_pract_id', $this->other_pract_id])
            ->andFilterWhere(['like', 'other_pract_npi', $this->other_pract_npi])
            ->andFilterWhere(['like', 'arrival_hour', $this->arrival_hour])
            ->andFilterWhere(['like', 'ed_discharge_hour', $this->ed_discharge_hour])
            ->andFilterWhere(['like', 'prin_proc_icd9_code_id', $this->prin_proc_icd9_code_id]);

        return $dataProvider;
    }
}
