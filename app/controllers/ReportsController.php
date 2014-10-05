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

        $_report_records = Records::find()
            ->asArray()
            ->where(   'med_rec_num >= '.$_timeframe->start_ts)
            ->andWhere('med_rec_num <= '.$_timeframe->end_ts)
            ->joinWith([
                'country',
                'doctor',
                'ethnicity',
                'princPayer',
                'race',
                'sex'
            ])
            ->orderBy('med_rec_num DESC')
            ->all();


        // check data against stateRules()
        if (count($_return_data) > 0) {

            $this->stateRules($_report_records);
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
        $_method_data->year_req  = date( substr($_method_data->selected['report_window'], 0, 4) );
        $_method_data->quar_req  = date( substr($_method_data->selected['report_window'], 5, 6) );

        $_return_data = new stdClass();



        // Get the timestamp for the beginning of each month in the year selected
        for ($mc = 1; $mc < 14; $mc++) {
            // Create timestamp for midnight of the 1st for each month.
            // adjust for TZ offset
            $_method_data->{'monthly_timestamps_'.$mc} = mktime(0, 0, 0, $mc, 1, $_method_data->year_req) - 18000 ;
        }


        // using the selected data, calculate the start and end timestamps of the requested report.
        switch ($_method_data->quar_req) {
            case 'Q1':
                $_return_data->start_ts = $_method_data->monthly_timestamps_1;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_4 -1);
                break;
            case 'Q2':
                $_return_data->start_ts = $_method_data->monthly_timestamps_4;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_7 -1);
                break;
            case 'Q3':
                $_return_data->start_ts = $_method_data->monthly_timestamps_7;
                $_return_data->end_ts = ($_method_data->monthly_timestamps_10 -1);
                break;
            case 'Q4':
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
     * Pass the data object through the valiation rules
     * @param  array $_param_data Array or Object containing the data set
     * @return boolean
     */
    private function stateRules($_param_data)
    {
        $_valid_report = true;

        // If the data set passed all the state checks write the file
        // Else write the 'error' file
        
        if ($_valid_report) {
            $this->writeFile($_param_data);
        }

        return false;
    }

    /**
     * Write EITHER the data XML OR the list of incomplete records file
     * @param  [type] $_param_data [description]
     * @return [type]              [description]
     */
    private function writeFile($_param_data, $ext = 'txt')
    {

        return false;
    }
}