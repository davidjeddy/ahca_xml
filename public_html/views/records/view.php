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
            'admission_source_id',
            'admitting_idc9_code_id',
            'ahca_num',
            'anesthesia_charges',
            'arrival_hour',
            'attending_pract_id',
            'attending_pract_npi',
            'cardiology_charges',
            'county_id',
            'dob',
            'ed_discharge_hour',
            'er_room_charges',
            'ethnicity_id',
            'extra_shock_charges',
            'gi_services_charges',
            'idc9_code_id',
            'lab_charges',
            'med_rec_num',
            'med_surg_supply_charges',
            'oper_room_charges',
            'operating_pract_id',
            'operating_pract_npi',
            'other_charges',
            'other_pract_id',
            'other_pract_npi',
            'patient_status_id',
            'pharmacy_charges',
            'prin_proc_code',
            'princ_payer_id',
            'race_id',
            'radiology_charges',
            'record_id',
            'recovery_room_charges',
            'service_id',
            'sex_id',
            'ssn',
            'total_charges',
            'trauma_resp_charges',
            'visit_begin_date',
            'visit_end_date',
            'zip',
        ],
    ]) ?>

</div>
