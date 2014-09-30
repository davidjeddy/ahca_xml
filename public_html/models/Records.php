<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property integer $record_id
 * @property string $ahca_num
 * @property string $med_rec_num
 * @property string $ssn
 * @property integer $ethnicity_id
 * @property integer $race_id
 * @property string $dob
 * @property integer $sex_id
 * @property string $zip
 * @property integer $country_id
 * @property integer $service_id
 * @property integer $admission_source_id
 * @property integer $princ_payer_id
 * @property integer $idc9_code_id
 * @property string $attending_pract_id
 * @property string $attending_pract_npi
 * @property string $operating_pract_id
 * @property string $operating_pract_npi
 * @property string $other_pract_id
 * @property string $other_pract_npi
 * @property integer $pharmacy_charges
 * @property integer $med_surg_supply_charges
 * @property integer $lab_charges
 * @property integer $radiology_charges
 * @property integer $cardiology_charges
 * @property integer $oper_room_charges
 * @property integer $anesthesia_charges
 * @property integer $recovery_room_charges
 * @property integer $er_room_charges
 * @property integer $trauma_resp_charges
 * @property integer $gi_services_charges
 * @property integer $extra_shock_charges
 * @property integer $other_charges
 * @property integer $total_charges
 * @property string $visit_begin_date
 * @property string $visit_end_date
 * @property string $arrival_hour
 * @property string $ed_discharge_hour
 * @property integer $admitting_idc9_code_id
 * @property string $prin_proc_code
 * @property integer $patient_status_id
 *
 * @property AdmissionSource $admissionSource
 * @property Icd9Code $idc9Code
 * @property PrincPayer $princPayer
 * @property PatientStatus $patientStatus
 * @property Country $county
 * @property Ethnicity $ethnicity
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
            [['ahca_num', 'med_rec_num', 'ssn', 'ethnicity_id', 'race_id', 'dob', 'sex_id', 'zip', 'country_id', 'visit_begin_date', 'arrival_hour'], 'required'],
            [['ethnicity_id', 'race_id', 'sex_id', 'country_id', 'service_id', 'admission_source_id', 'princ_payer_id', 'idc9_code_id', 'pharmacy_charges', 'med_surg_supply_charges', 'lab_charges', 'radiology_charges', 'cardiology_charges', 'oper_room_charges', 'anesthesia_charges', 'recovery_room_charges', 'er_room_charges', 'trauma_resp_charges', 'gi_services_charges', 'extra_shock_charges', 'other_charges', 'total_charges', 'admitting_idc9_code_id', 'patient_status_id'], 'integer'],
            [['dob', 'visit_begin_date', 'visit_end_date'], 'safe'],
            [['ahca_num', 'attending_pract_npi', 'operating_pract_npi', 'other_pract_npi'], 'string', 'max' => 10],
            [['med_rec_num'], 'string', 'max' => 24],
            [['ssn'], 'string', 'max' => 9],
            [['zip'], 'string', 'max' => 5],
            [['attending_pract_id', 'operating_pract_id', 'other_pract_id'], 'string', 'max' => 12],
            [['arrival_hour', 'ed_discharge_hour'], 'string', 'max' => 2],
            [['prin_proc_code'], 'string', 'max' => 8]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admission_source_id'     => 'Admission Source ID',
            'admitting_idc9_code_id'  => 'Admitting IDC9 Code ID',
            'ahca_num'                => 'AHCA Number',
            'anesthesia_charges'      => 'Anesthesia Charges',
            'arrival_hour'            => 'Arrival Hour',
            'attending_pract_id'      => 'Attending Practitioner ID',
            'attending_pract_npi'     => 'Attending Practitioner NPI',
            'cardiology_charges'      => 'Cardiology Charges',
            'country_id'               => 'County',
            'dob'                     => 'Date of Birth',
            'ed_discharge_hour'       => 'ER Discharge Hour',
            'er_room_charges'         => 'ER Room Charges',
            'ethnicity_id'            => 'Ethnicity',
            'extra_shock_charges'     => 'Extra Shock Charges',
            'gi_services_charges'     => 'GI Services Charges',
            'idc9_code_id'            => 'IDC9 Code',
            'lab_charges'             => 'Lab Charges',
            'med_rec_num'             => 'Medical Record Number',
            'med_surg_supply_charges' => 'Medical Surgury Supply Charges',
            'oper_room_charges'       => 'Oper Room Charges',
            'operating_pract_id'      => 'Operating Practitioner ID',
            'operating_pract_npi'     => 'Operating Practitioner NPI',
            'other_charges'           => 'Other Charges',
            'other_pract_id'          => 'Other Practitioner ID',
            'other_pract_npi'         => 'Other Practitioner NPI',
            'patient_status_id'       => 'Patient Status ID',
            'pharmacy_charges'        => 'Pharmacy Charges',
            'prin_proc_code'          => 'Principle Processing Code',
            'princ_payer_id'          => 'Principle Payer ID',
            'race_id'                 => 'Race',
            'radiology_charges'       => 'Radiology Charges',
            'record_id'               => 'Record ID',
            'recovery_room_charges'   => 'Recovery Room Charges',
            'service_id'              => 'Service ID',
            'sex_id'                  => 'Sex',
            'ssn'                     => 'Social Security Number',
            'total_charges'           => 'Total Charges',
            'trauma_resp_charges'     => 'Trauma Respiratory Charges',
            'visit_begin_date'        => 'Visit Begin Date',
            'visit_end_date'          => 'Visit End Date',
            'zip'                     => 'Zip/Postal Code',
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
    public function getIdc9Code()
    {
        return $this->hasOne(Icd9Code::className(), ['icd9_code_id' => 'idc9_code_id']);
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
