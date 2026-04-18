<?php

namespace app\controllers;

use Yii;
use app\models\Reports;
//use app\models\Search;
use yii\web\Controller;
//use yii\web\NotFoundHttpException;
//use yii\filters\VerbFilter;

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
    	$model = new Reports;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        	// return to the view
            return $this->redirect([
            	'view', 'id' => $model->record_id
            ]);

        } else {
	        return $this->render('index', [
	            'model' => $model,
	        ]);
        }
    }

    /**
     * Creates a new records model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

    	
    	$model = new Reports;

    	// @todo this is where the data->xml logic will go



// Try to write the file, if it does not exist, make it
$file_1  = fopen('../../test.txt','rw+');
// Read the file path into a var
$file    = '../../test.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new person to the file
$current .= 'test ran on '. date('now').'
';
// Write the contents back to the file
file_put_contents($file, $current);



    	// If process starts.
    	Yii::$app->session->setFlash('notice', "Report is being generated, please be VERY patient! This can take up to several minutes.");

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
        if (($model = records::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}