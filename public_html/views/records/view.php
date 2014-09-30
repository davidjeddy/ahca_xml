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

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'record_id',
            'ahca_num',
            'med_rec_num',
            'ssn',
            'ethnicity_id',
            'race_id',
            'dob',
            'sex_id',
            'zip',
            'county_id',
            'service_id',
            'admission_source_id',
            'princ_payer_id',
            'idc9_code_id',
            'attending_pract_id',
            'attending_pract_npi',
            'operating_pract_id',
            'operating_pract_npi',
            'other_pract_id',
            'other_pract_npi',
            'pharmacy_charges',
            'med_surg_supply_charges',
            'lab_charges',
            'radiology_charges',
            'cardiology_charges',
            'oper_room_charges',
            'anesthesia_charges',
            'recovery_room_charges',
            'er_room_charges',
            'trauma_resp_charges',
            'gi_services_charges',
            'extra_shock_charges',
            'other_charges',
            'total_charges',
            'visit_begin_date',
            'visit_end_date',
            'arrival_hour',
            'ed_discharge_hour',
            'admitting_idc9_code_id',
            'prin_proc_code',
            'patient_status_id',
        ],
    ]) ?>

</div>
