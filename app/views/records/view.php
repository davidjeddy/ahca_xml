<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 */

$this->title = $model->record_id;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-view">

    <h1>View record <?= $this->title;?>:</h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->record_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->record_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <h2><span class="label label-primary">General Information:</span></h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // General patience information
            'record_id',
            'med_rec_num',
            'first_name',
            'last_name',
            //'ahca_num',
            'ssn',
            'ethnicity_id',
            'race_id',
            'dob',
            'sex_id',
            'patient_status_id',
            'zip',
            'country_id',
            // 'admission_source_id',
            //'service_id',
            'princ_payer_id',
        ],
    ]) ?>



    <h2><span class="label label-primary">Coding:</span></h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // Media Coding
            'admitting_icd9_code',
            'primary_diag_icd9_code',
            'other_diagnostics_icd9_codes',
            'cpt_codes',
        ],
    ]) ?>



    <h2><span class="label label-primary">Charges:</span></h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'anesthesia_charges',
            'cardiology_charges',
            'extra_shock_charges',
            'gi_services_charges',
            'lab_charges',
            'med_surg_supply_charges',
            'oper_room_charges',
            'other_charges',
            'pharmacy_charges',
            'radiology_charges',
            'recovery_room_charges',
            'trauma_resp_charges',
            'total_charges',

        ],
    ]) ?>



    <h2><span class="label label-primary">Practitioner Information:</span></h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'doctor_id',
        ],
    ]) ?>


    <h2><span class="label label-primary">Dates and Times:</span></h2>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'arrival_hour',
            'visit_begin_date',
            'visit_end_date',
        ],
    ]) ?>
</div>
