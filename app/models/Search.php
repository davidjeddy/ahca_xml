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
            [['record_id', 'ethnicity_id', 'race_id', 'sex_id', 'country_id', 'service_id', 'admission_source_id', 'princ_payer_id', 'primary_diag_icd9_code', 'pharmacy_charges', 'med_surg_supply_charges', 'lab_charges', 'radiology_charges', 'cardiology_charges', 'oper_room_charges', 'anesthesia_charges', 'recovery_room_charges', 'trauma_resp_charges', 'gi_services_charges', 'extra_shock_charges', 'other_charges', 'total_charges', 'admitting_icd9_code', 'patient_status_id'], 'integer'],
            [['ahca_num', 'med_rec_num', 'ssn', 'dob', 'zip', 'visit_begin_date', 'visit_end_date', 'arrival_hour', 'prin_proc_primary_diag_icd9_code'], 'safe'],
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
            'admission_source_id'     => $this->admission_source_id,
            'admitting_icd9_code'  => $this->admitting_icd9_code,
            'anesthesia_charges'      => $this->anesthesia_charges,
            'cardiology_charges'      => $this->cardiology_charges,
            'country_id'              => $this->country_id,
            'dob'                     => $this->dob,
            'ethnicity_id'            => $this->ethnicity_id,
            'extra_shock_charges'     => $this->extra_shock_charges,
            'gi_services_charges'     => $this->gi_services_charges,
            'primary_diag_icd9_code'            => $this->primary_diag_icd9_code,
            'lab_charges'             => $this->lab_charges,
            'med_surg_supply_charges' => $this->med_surg_supply_charges,
            'oper_room_charges'       => $this->oper_room_charges,
            'other_charges'           => $this->other_charges,
            'patient_status_id'       => $this->patient_status_id,
            'pharmacy_charges'        => $this->pharmacy_charges,
            'princ_payer_id'          => $this->princ_payer_id,
            'race_id'                 => $this->race_id,
            'radiology_charges'       => $this->radiology_charges,
            'record_id'               => $this->record_id,
            'recovery_room_charges'   => $this->recovery_room_charges,
            'service_id'              => $this->service_id,
            'sex_id'                  => $this->sex_id,
            'total_charges'           => $this->total_charges,
            'trauma_resp_charges'     => $this->trauma_resp_charges,
            'visit_begin_date'        => $this->visit_begin_date,
            'visit_end_date'          => $this->visit_end_date,
        ]);

        $query->andFilterWhere(['like', 'ahca_num', $this->ahca_num])
            ->andFilterWhere(['like', 'med_rec_num', $this->med_rec_num])
            ->andFilterWhere(['like', 'ssn', $this->ssn])
            ->andFilterWhere(['like', 'zip', $this->zip])
            ->andFilterWhere(['like', 'arrival_hour', $this->arrival_hour])
            ->andFilterWhere(['like', 'prin_proc_primary_diag_icd9_code', $this->prin_proc_primary_diag_icd9_code]);

        return $dataProvider;
    }
}
