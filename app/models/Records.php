<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "records".
 *
 * @property integer $admission_source_id
 * @property string $admitting_icd9_code
 * @property string $ahca_num
 * @property integer $anesthesia_charges
 * @property string $arrival_hour
 * @property integer $cardiology_charges
 * @property integer $country_id
 * @property string $cpt_codes
 * @property integer $doctor_id
 * @property string $dob
 * @property integer $ethnicity_id
 * @property integer $extra_shock_charges
 * @property string $first_name
 * @property integer $gi_services_charges
 * @property integer $lab_charges
 * @property string $last_name
 * @property string $med_rec_num
 * @property integer $med_surg_supply_charges
 * @property integer $oper_room_charges
 * @property integer $other_charges
 * @property integer $patient_status_id
 * @property integer $pharmacy_charges
 * @property string $primary_diag_icd9_code
 * @property string $prin_proc_icd9_code
 * @property integer $princ_payer_id
 * @property integer $race_id
 * @property integer $radiology_charges
 * @property integer $record_id
 * @property integer $recovery_room_charges
 * @property integer $service_id
 * @property integer $sex_id
 * @property integer $ssn
 * @property integer $total_charges
 * @property string $other_procedure_icd9_codes
 * @property integer $trauma_resp_charges
 * @property string $visit_begin_date
 * @property string $visit_end_date
 * @property integer $zip
 * @property string $other_diagnostics_icd9_codes
 *
 * @property Doctor $doctor
 * @property Country $country
 * @property Ethnicity $ethnicity
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
            [['admission_source_id', 'anesthesia_charges', 'arrival_hour', 'cardiology_charges', 'country_id', 'doctor_id', 'ethnicity_id', 'extra_shock_charges', 'gi_services_charges', 'lab_charges', 'med_surg_supply_charges', 'oper_room_charges', 'other_charges', 'patient_status_id', 'pharmacy_charges', 'princ_payer_id', 'race_id', 'radiology_charges', 'recovery_room_charges', 'service_id', 'sex_id', 'total_charges', 'trauma_resp_charges'], 'integer'],
            [['arrival_hour', 'ssn', 'zip'],  'number'], 
            [['dob', 'visit_begin_date', 'visit_end_date'], 'safe'],
            [['first_name', 'last_name', 'dob', 'ssn'], 'required'],
            [['ahca_num'], 'string', 'max'                => 10],          
            [['first_name', 'last_name'], 'string', 'max' => 32],
            [['med_rec_num'], 'string', 'max'             => 24],
            [['admitting_icd9_code', 'primary_diag_icd9_code', 'prin_proc_icd9_code'], 'string', 'min'=> null, 'max' => 6],
            [['cpt_codes'], 'string', 'max' => 210],
            [['other_procedure_icd9_codes'], 'string', 'max' => 36],
            [['other_diagnostics_icd9_codes'], 'string', 'max' => 72]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admission_source_id'          => 'Admission Source',
            'admitting_icd9_code'          => 'Admitting Icd9 Code',
            'ahca_num'                     => 'Ahca Num',
            'anesthesia_charges'           => 'Anesthesia Charges',
            'arrival_hour'                 => 'Arrival Hour',
            'cardiology_charges'           => 'Cardiology Charges',
            'country_id'                   => 'Country ID',
            'cpt_codes'                    => 'Cpt Codes',
            'doctor_id'                    => 'Doctor ID',
            'dob'                          => 'Date of Birth',
            'ethnicity_id'                 => 'Ethnicity ID',
            'extra_shock_charges'          => 'Extra Shock Charges',
            'first_name'                   => 'First Name',
            'gi_services_charges'          => 'Gi Services Charges',
            'lab_charges'                  => 'Lab Charges',
            'last_name'                    => 'Last Name',
            'med_rec_num'                  => 'Med Rec Num',
            'med_surg_supply_charges'      => 'Med Surg Supply Charges',
            'oper_room_charges'            => 'Oper Room Charges',
            'other_charges'                => 'Other Charges',
            'patient_status_id'            => 'Patient Status ID',
            'pharmacy_charges'             => 'Pharmacy Charges',
            'primary_diag_icd9_code'       => 'Primary Diag Icd9 Code',
            'prin_proc_icd9_code'          => 'Prin Proc Icd9 Code',
            'princ_payer_id'               => 'Princ Payer ID',
            'race_id'                      => 'Race ID',
            'radiology_charges'            => 'Radiology Charges',
            'record_id'                    => 'Record ID',
            'recovery_room_charges'        => 'Recovery Room Charges',
            'service_id'                   => 'Service ID',
            'sex_id'                       => 'Sex ID',
            'ssn'                          => 'Social Security Number',
            'total_charges'                => 'Total Charges',
            'other_procedure_icd9_codes'   => 'Other Procedure Icd9 Codes',
            'trauma_resp_charges'          => 'Trauma Resp Charges',
            'visit_begin_date'             => 'Visit Begin Date',
            'visit_end_date'               => 'Visit End Date',
            'zip'                          => 'Zip',
            'other_diagnostics_icd9_codes' => 'Other Diagnostics Icd9 Codes',
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
    public function getDoctor()
    {
        return $this->hasOne(Doctor::className(), ['doctor_id' => 'doctor_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
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
    public function getPatientStatus()
    {
        return $this->hasOne(PatientStatus::className(), ['patient_status_id' => 'patient_status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrincPayer()
    {
        return $this->hasOne(PrinciplePayer::className(), ['princ_payer_id' => 'princ_payer_id']);
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
