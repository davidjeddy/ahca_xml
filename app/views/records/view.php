<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 */

$this->title = $model->last_name.', '.$model->first_name;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-view">

    <h1>Record for `<?= $this->title;?>`:<?php //<?= Html::encode($this->title) ?></h1>

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
            // Ignored fields not to be displayed to the end user.
            // 'record_id',

            // General patience information
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
            'admitting_icd9_code_id',
            'icd9_code_id',
            'other_diagnostics_icd9_codes',
            //'prin_proc_icd9_code_id',
            'other_diagnostics_icd9_codes',
            //'other_procedure_icd9_codes',
            'cpt_codes',

            // Charges
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

            // Practitioner(s)

            // Date & Time
            'arrival_hour',
            'visit_begin_date',
            'visit_end_date',
        ],
    ]) ?>
</div>
