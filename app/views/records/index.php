<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\search $searchModel
 */

$this->title = 'Search Records';
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-index">

    <h1>Search Records:<?php //<?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p><?php //echo Html::a('Create Records', ['create'], ['class' => 'btn btn-success']); ?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            // 'record_id',
            'ahca_num',
            'med_rec_num',
            'ssn',
            // 'ethnicity_id',
            // 'race_id',
            // 'dob',
            // 'sex_id',
            // 'zip',
            // 'country_id',
            // 'service_id',
            // 'admission_source_id',
            // 'princ_payer_id',
            // 'icd9_code_id',
            // 'attending_pract_id',
            // 'attending_pract_npi',
            // 'operating_pract_id',
            // 'operating_pract_npi',
            // 'other_pract_id',
            // 'other_pract_npi',
            // 'pharmacy_charges',
            // 'med_surg_supply_charges',
            // 'lab_charges',
            // 'radiology_charges',
            // 'cardiology_charges',
            // 'oper_room_charges',
            // 'anesthesia_charges',
            // 'recovery_room_charges',
            // 'er_room_charges',
            // 'trauma_resp_charges',
            // 'gi_services_charges',
            // 'extra_shock_charges',
            // 'other_charges',
            // 'total_charges',
            // 'visit_begin_date',
            // 'visit_end_date',
            // 'arrival_hour',
            // 'ed_discharge_hour',
            // 'admitting_icd9_code_id',
            // 'prin_proc_icd9_code_id',
            // 'patient_status_id',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
