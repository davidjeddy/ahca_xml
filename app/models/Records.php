<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property integer $admission_source_id
 * @property integer $admitting_icd9_code_id
 * @property integer $anesthesia_charges
 * @property integer $cardiology_charges
 * @property integer $country_id
 * @property integer $ethnicity_id
 * @property integer $extra_shock_charges
 * @property integer $gi_services_charges
 * @property integer $icd9_code_id
 * @property integer $lab_charges
 * @property integer $med_surg_supply_charges
 * @property integer $oper_room_charges
 * @property integer $other_charges
 * @property integer $patient_status_id
 * @property integer $pharmacy_charges
 * @property integer $princ_payer_id
 * @property integer $race_id
 * @property integer $radiology_charges
 * @property integer $record_id
 * @property integer $recovery_room_charges
 * @property integer $service_id
 * @property integer $sex_id
 * @property integer $total_charges
 * @property integer $trauma_resp_charges
 * @property string $ahca_num
 * @property string $arrival_hour
 * @property string $cpt_codes
 * @property string $dob
 * @property string $first_name
 * @property string $last_name
 * @property string $med_rec_num
 * @property string $other_diagnostics_icd9_codes
 * @property strong $other_procedure_icd9_codes
 * @property string $prin_proc_icd9_code_id
 * @property string $ssn
 * @property string $visit_begin_date
 * @property string $visit_end_date
 * @property string $zip
 *
 * @property AdmissionSource $admissionSource
 * @property Country $county
 * @property Ethnicity $ethnicity
 * @property Icd9Code $icd9code
 * @property PatientStatus $patientStatus
 * @property PrincPayer $princPayer
 * @property Race $race
 * @property Sex $sex
 */
class Records extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'records';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['ahca_num', 'med_rec_num', 'ssn', 'ethnicity_id', 'race_id', 'dob', 'sex_id', 'zip', 'country_id', 'visit_begin_date', 'arrival_hour'], 'required'],
            //[['admission_source_id'], 'integer']
            [['first_name', 'last_name', 'med_rec_num'], 'required'],
            [['ethnicity_id', 'race_id', 'sex_id', 'country_id', 'service_id',  'princ_payer_id', 'pharmacy_charges', 'med_surg_supply_charges', 'lab_charges', 'radiology_charges', 'cardiology_charges', 'oper_room_charges', 'anesthesia_charges', 'recovery_room_charges', 'trauma_resp_charges', 'gi_services_charges', 'extra_shock_charges', 'other_charges', 'total_charges', 'patient_status_id'], 'integer'],
            [['dob', 'visit_begin_date', 'visit_end_date'], 'safe'],
            [['med_rec_num'], 'string', 'max' => 24],
            [['ssn'], 'string', 'max' => 9],
            [['zip'], 'integer', 'min' => 11111, 'max' => 99999],
            [['arrival_hour'], 'string', 'max' => 2],
            [['prin_proc_icd9_code_id'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fist_name' => 'First Name',
            'last_name' => 'Last Name',
            'admission_source_id'          => 'Admission Source',
            'admitting_icd9_code_id'       => 'Admitting ICD9 Code',
            'ahca_num'                     => 'AHCA Number',
            'anesthesia_charges'           => 'Anesthesia Charges',
            'arrival_hour'                 => 'Arrival Hour',
            'cardiology_charges'           => 'Cardiology Charges',
            'country_id'                   => 'County',
            'cpt_codes'                    => 'CPT Codes',
            'dob'                          => 'Date of Birth',
            'ethnicity_id'                 => 'Ethnicity',
            'extra_shock_charges'          => 'Extra Corp Shockwave Charges',
            'gi_services_charges'          => 'GI Services Charges',
            'icd9_code_id'                 => 'Primary Diagnostic ICD9 Code',
            'lab_charges'                  => 'Lab Charges',
            'med_rec_num'                  => 'Medical Record Number',
            'med_surg_supply_charges'      => 'Medical Surgury Supply Charges',
            'oper_room_charges'            => 'Operating Room Charges',
            'other_charges'                => 'Other Charges',
            'other_diagnostics_icd9_codes' => 'Other Diagnotics ICD9 Codes',
            'other_procedure_icd9_codes'   => 'Other Procedure ICD9 Codes',
            'patient_status_id'            => 'Patient Discharge Status',
            'pharmacy_charges'             => 'Pharmacy Charges',
            'prin_proc_icd9_code_id'       => 'Principle Procedure ICD9 Code',
            'princ_payer_id'               => 'Principle Payer ID',
            'race_id'                      => 'Race',
            'radiology_charges'            => 'Radiology Charges',
            'record_id'                    => 'Record ID',
            'recovery_room_charges'        => 'Recovery Room Charges',
            'service_id'                   => 'Service Type',
            'sex_id'                       => 'Sex',
            'ssn'                          => 'Social Security Number',
            'total_charges'                => 'Total Charges',
            'trauma_resp_charges'          => 'Trauma Respiratory Charges',
            'visit_begin_date'             => 'Visit Begin Date',
            'visit_end_date'               => 'Visit End Date',
            'zip'                          => 'Zip / Postal Code',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmissionSource()
    {
        return $this->hasOne(AdmissionSource::className(), ['admission_source_id' => 'admission_source_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrincPayer()
    {
        return $this->hasOne(PrincPayer::className(), ['princ_payer_id' => 'princ_payer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatientStatus()
    {
        return $this->hasOne(PatientStatus::className(), ['patient_status_id' => 'patient_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCounty()
    {
        return $this->hasOne(Country::className(), ['country_id' => 'country_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEthnicity()
    {
        return $this->hasOne(Ethnicity::className(), ['ethnicity_id' => 'ethnicity_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRace()
    {
        return $this->hasOne(Race::className(), ['race_id' => 'race_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::className(), ['sex_id' => 'sex_id']);
    }
}
