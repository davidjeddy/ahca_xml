<?php

namespace app\controllers;

use Yii;
use app\models\Records;
use app\models\Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecordsController implements the CRUD actions for records model.
 */
class RecordsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all records models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Search;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    /**
     * Displays a single records model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        return $this->actionUpdate($id);

        /*
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        */
    }

    /**
     * Creates a new records model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $post_data = $this->postFix();

        $model = new Records;

        if ($model->load($post_data) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->record_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing records model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $post_data = $this->postFix();

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->record_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing records model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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



    // private methods



    /**
     * 
     */
    private function postFix()
    {
        if (isset($post_data['Records']) && !empty($post_data['Records'])) {
            foreach($post_data['Records'] as $key => $value) {

                if (empty($value) || $value == '') {

                    unset($post_data['Records'][$key]);
                }
            }



            // generated med_rec_num from req. patient information...
            // ...to ensure it will always be unique to that patient
            $post_data['Records']['med_rec_num'] =
                strtolower(substr($post_data['Records']['first_name'], 0, 1))
                .strtolower(substr($post_data['Records']['last_name'], 0, 1))
                .((strlen($post_data['Records']['first_name']))
                    +(strlen($post_data['Records']['last_name'])))
                .((integer)(str_replace("-", "", $post_data['Records']['dob']))
                    * (integer)$post_data['Records']['ssn']
            );



            return $post_data;
        }
    }
}
