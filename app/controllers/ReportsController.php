<?php

namespace app\controllers;

use Yii;
use app\models\Records;
use app\models\Reports;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use stdClass;
use DateTime;

/**
 * ReportsController actions for reports model.
 */
class ReportsController extends \yii\web\Controller
{
    /**
     * Year report is requested for
     * @type  integer
     */
    private $year_req = 2014;
    /**
     * Quarer report is requested for
     * @type  integer
     */
    private $quar_req = 1;
    /**
     * Total count of records we are dealing with
     * @type  integer
     */
    private $total_record_count = 0;
    /**
     * Report type, I = initial or R = replacement
     * @type  string
     */
    private $report_type = 'I';
    /**
     * Records data
     * @type array
     */
    private $records = array();


    /**
     * Lists all records models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model     = new Reports;
        $post_data = Yii::$app->request->post();

        // Do we have POST value from the Reports/index form?
        if (isset($post_data['Reports']) && !empty($post_data['Reports'])) {

            Yii::$app->session->setFlash(
                'notice',
                '<br />Report can be retrievable <a href="../xml_data/" target="_new">here</a>.'
            );

            // submit type
            $this->report_type = (isset($post_data['Reports']['resubmit']) &&  $post_data['Reports']['resubmit'] == true) ? 'R' : 'I';

            // go make my report!
            $this->createQuarterlyReport($post_data['Reports']);
        }



    	// return to the view
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * Finds the records model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return records the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = reports::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



    // private method



    private function createQuarterlyReport($_param_data)
    {

        $_timeframe = $this->getTimeframe($_param_data['report_option_id']);

        $this->records = Records::find()
            ->asArray()
            ->where(   "visit_begin_date >= '".date('Y-m-d', $_timeframe->start_ts)."'")
            ->andWhere("visit_begin_date <= '".date('Y-m-d', $_timeframe->end_ts)."'")
            ->joinWith([
                'admissionSource',
                'country',
                'doctor',
                'ethnicity',
                'patientStatus',
                'princPayer',
                'race',
                'sex'
            ])
            ->orderBy('med_rec_num DESC')
            ->all();

        // Do we have at least one record for the timeframe specified?
        if (count($this->records) > 0) {

            // go go gadget processing!
            return $this->stateRules( $this->normalizeRecords() );
        }

        return false;
    }

    /**
     * Pass in the Id of the timeframe field the user selected
     * @param  integer $id
     * @return object Return the start and end unix timestamp of the selected range
     */
    private function getTimeframe($id = 0)
    {
        $_method_data            = new stdClass();
        $_method_data->selected  = $this->findModel($id)->getAttributes();
        $this->year_req  = date( substr($_method_data->selected['report_window'], 0, 4) );
        $this->quar_req  = date( substr($_method_data->selected['report_window'], 6) );

        $_return_data = new stdClass();



        // Get the timestamp for the beginning of each month in the year selected
        for ($mc = 1; $mc < 14; $mc++) {
            // Create timestamp for midnight of the 1st for each month.
            // adjust for TZ offset
            $_method_data->{'monthly_timestamps_'.$mc} = mktime(0, 0, 0, $mc, 1, $this->year_req) - 18000 ;
        }



        // using the selected data, calculate the start and end timestamps of the requested report.
        switch ($this->quar_req) {
            case '1':
                $_return_data->start_ts = $_method_data->monthly_timestamps_1;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_4 -1);
                break;
            case '2':
                $_return_data->start_ts = $_method_data->monthly_timestamps_4;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_7 -1);
                break;
            case '3':
                $_return_data->start_ts = $_method_data->monthly_timestamps_7;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_10 -1);
                break;
            case '4':
                $_return_data->start_ts = $_method_data->monthly_timestamps_10;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_13 -1);
                break;
            default:
                $_return_data->start_ts = 0;
                $_return_data->end_ts = time();
                break;
        }

        return $_return_data;
    }

    /**
     * Take the array from the DB and make it into a normalized array ready for writing...
     * ...really this is just a mapper method. app->XML elements
     * @return boolean
     * @todo Iterate on this, should not have such tight coupling between our data and the states XML
     */
    private function normalizeRecords()
    {
        $_method_data = array();

        foreach ($this->records as $r_key => $r_value) {
            // patient general information
            $_method_data[$r_key]['ADMIT_SOURCE']      = $r_value['admissionSource']['admission_source_value'];
            $_method_data[$r_key]['AHCA_NUM']          = $r_value['ahca_num'];
            $_method_data[$r_key]['MED_REC_NUM']       = $r_value['med_rec_num'];
            $_method_data[$r_key]['RECORD_ID']         = $r_value['record_id'];
            $_method_data[$r_key]['PATIENT_SSN']       = (strlen($r_value['ssn'] = 4) ? '77777'.$r_value['ssn'] : $r_value['ssn']);
            $_method_data[$r_key]['PATIENT_ETHNICITY'] = $r_value['ethnicity']['ethnicity_value'];
            $_method_data[$r_key]['PATIENT_RACE']      = $r_value['race']['race_value'];
            $_method_data[$r_key]['PATIENT_BIRTHDAY']  = $r_value['dob'];
            $_method_data[$r_key]['PATIENT_SEX']       = $r_value['sex']['sex_value'];
            $_method_data[$r_key]['PATIENT_ZIP']       = $r_value['zip'];
            $_method_data[$r_key]['PATIENT_COUNTRY']   = $r_value['country']['country_value'];
            $_method_data[$r_key]['SERVICE_CODE']      = $r_value['service_id'];
            $_method_data[$r_key]['PATIENT_STATUS']    = $r_value['patientStatus']['patient_status_value'] ? $r_value['patientStatus']['patient_status_value'] : '01';
            
            // 'codes'
            $_method_data[$r_key]['PATIENT_REASON']      = $r_value['admitting_icd9_code'];
            $_method_data[$r_key]['PRIN_PROC_CODE']      = $r_value['primary_diag_icd9_code'];
            $_method_data[$r_key]['OTHER_DIAG_CODE']     = $r_value['other_diagnostics_icd9_codes'];
            $_method_data[$r_key]['OTHER_CPT_HCPS_CODE'] = $r_value['cpt_codes'];

            // Same Dr for both
            $_method_data[$r_key]['ATTENDING_PRACT_ID']  = $r_value['doctor']['doctor_state_lic'];
            $_method_data[$r_key]['ATTENDING_PRACT_NPI'] = $r_value['doctor']['doctor_npsi'];
            $_method_data[$r_key]['OPERATING_PRACT_ID']  = $r_value['doctor']['doctor_state_lic'];
            $_method_data[$r_key]['OPERATING_PRACT_NPI'] = $r_value['doctor']['doctor_npsi'];
            
            // All the 'costs'
            $_method_data[$r_key]['RADIOLOGY_CHARGES']             = ($r_value['radiology_charges']) ? $r_value['radiology_charges'] : 0;
            $_method_data[$r_key]['CARIOLOGY_CHARGES']             = ($r_value['cardiology_charges']) ? $r_value['cardiology_charges'] : 0;
            $_method_data[$r_key]['OPER_ROOM_CHARGES']             = ($r_value['oper_room_charges']) ? $r_value['oper_room_charges'] : 0;
            $_method_data[$r_key]['ANESTHESIA_CHARGES']            = ($r_value['anesthesia_charges']) ? $r_value['anesthesia_charges'] : 0;
            $_method_data[$r_key]['RECOVERY_ROOM_CHARGES']         = ($r_value['recovery_room_charges']) ? $r_value['recovery_room_charges'] : 0;
            $_method_data[$r_key]['ER_ROOM_CHARGES']               = 0;
            $_method_data[$r_key]['TRAUMA_RESP_CHARGES']           = ($r_value['trauma_resp_charges']) ? $r_value['trauma_resp_charges'] : 0;
            $_method_data[$r_key]['GI_SERVICES_CHARGES']           = ($r_value['gi_services_charges']) ? $r_value['gi_services_charges'] : 0;
            $_method_data[$r_key]['EXTRA_CORP_SHOCK_WAVE_CHARGES'] = ($r_value['extra_shock_charges']) ? $r_value['extra_shock_charges'] : 0;
            $_method_data[$r_key]['OTHER_CHARGES']                 = ($r_value['other_charges']) ? $r_value['other_charges'] : 0;
            $_method_data[$r_key]['TOTAL_CHARGES']                 = ($r_value['total_charges']) ? $r_value['total_charges'] : 0;
            
            //Misc data points
            $_method_data[$r_key]['VISIT_BEGIN_DATE'] = $r_value['visit_begin_date'];
            $_method_data[$r_key]['ARRIVAL_HOUR']     = $r_value['arrival_hour'];
            $_method_data[$r_key]['VISIT_END_DATE']   = $r_value['visit_begin_date'];
        }

        $this->records = $_method_data;

        return true;
    }
    /**
     * Pass the data object through the valiation rules
     * @param  array $_param_data Array or Object containing the data set
     * @return boolean
     */
    private function stateRules($_param_data)
    {
        $_valid_report    = true;
        $_invalid_records = [];

        // If the data set passed all the state checks write the file
        // Else write the 'error' file        
        if ($_valid_report) {

            return $this->writeFile(true);
        } else {

            echo 'FAILED CASES!';
            exit;
        }

        return false;
    }

    /**
     * Write EITHER the data XML OR the list of incomplete records to a file
     * @param  [type] $_param_data [description]
     * @param  [type] $_type The type of file to write.
     * @return [type]              [description]
     */
    private function writeFile()
    {
        // Repalce the header placerholder information with real data
        $location_header = file_get_contents('../web/xml_data/header.part');
        // @todo Better way to do this? - DJE : 2014-10-05
        $location_header = str_replace("{CurrentDate}",    date('Y-m-d'),      $location_header);
        $location_header = str_replace("{ReportQuarter}",  $this->quar_req,    $location_header);
        $location_header = str_replace("{ReportYear}",     $this->year_req,    $location_header);
        $location_header = str_replace("{SubmissionType}", $this->report_type, $location_header);



        // Replace the footer placeholder information with real data
        $location_footer = file_get_contents('../web/xml_data/footer.part');



        // Write data to file
        $f_resource = fopen('../web/xml_data/'.$this->year_req.'-'.$this->quar_req.'.xml', "w+");
        fwrite(
            $f_resource,
            $location_header
            .$this->generate_valid_xml_from_array($this->records, 'RECORDS', 'RECORD')
            .str_replace("{NumberOfRecords}", $this->total_record_count, $location_footer)
        );

        if (YII_DEBUG) {
            echo 'File wrote to ./web/xml_data/. Ctrl+F5 to re-process.';
            exit;
        }

        return true;
    }

    /**
     * @source http://www.sean-barton.co.uk/2009/03/turning-an-array-or-object-into-xml-using-php/#.VDG6FildXR0
     */
    private function generate_valid_xml_from_array($array, $node_block='nodes', $node_name='node')
    {
        /* $xml = '<?xml version="1.0" encoding="UTF-8" ?>' . "\n"; */

        $xml = "\n" . '<' . $node_block . '>' . "\n";
        $xml .= $this->generate_xml_from_array($array, $node_name);
        $xml .= '</' . $node_block . '>' . "\n";

        return $xml;
    }

    /**
     * @source http://www.sean-barton.co.uk/2009/03/turning-an-array-or-object-into-xml-using-php/#.VDG6FildXR0
     */
    private function generate_xml_from_array($array, $node_name)
    {
        $xml = null;

        if (is_array($array) || is_object($array)) {
            foreach ($array as $key=>$value) {
                if (is_numeric($key)) {
                    $key = $node_name;
                }

                // If not a root 'record' element add indenting
                if ($key != $node_name) {
                    $xml .= '    ';
                }

                // Add the 'record_id' property to the RECORD element
                if ($key == $node_name) {

                    $this->total_record_count++;

                    $xml .= '<' . $key . ' id="'.$value["RECORD_ID"].'">'."\n";
                } else {
                    
                    $xml .= '<' . $key . '>';
                }

                $xml .= $this->generate_xml_from_array($value, $node_name) . '</' . $key . '>' . "\n";
            }
        } else {
            $xml = htmlspecialchars($array, ENT_QUOTES);
        }

        return $xml;
    }
}