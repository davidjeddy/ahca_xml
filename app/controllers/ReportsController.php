<?php

namespace app\controllers;

use Yii;
use app\models\Reports;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        if (isset($post_data['Reports'])) {
            Yii::$app->session->setFlash(
                'notice',
                '<br />Report processing started at '.date('g:m a').'. Please be patient as this can take several minutes.<br />
                The final report will be retrievable <a href="../xml_data/" target="_new">here</a>'
            );
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
        if (($model = records::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}