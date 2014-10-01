<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\search $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="records-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'record_id') ?>

    <?= $form->field($model, 'ahca_num') ?>

    <?= $form->field($model, 'med_rec_num') ?>

    <?= $form->field($model, 'ssn') ?>

    <?= $form->field($model, 'ethnicity_id') ?>

    <?php // echo $form->field($model, 'race_id') ?>

    <?php // echo $form->field($model, 'dob') ?>

    <?php // echo $form->field($model, 'sex_id') ?>

    <?php // echo $form->field($model, 'zip') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'service_id') ?>

    <?php // echo $form->field($model, 'admission_source_id') ?>

    <?php // echo $form->field($model, 'princ_payer_id') ?>

    <?php // echo $form->field($model, 'idc9_code_id') ?>

    <?php // echo $form->field($model, 'attending_pract_id') ?>

    <?php // echo $form->field($model, 'attending_pract_npi') ?>

    <?php // echo $form->field($model, 'operating_pract_id') ?>

    <?php // echo $form->field($model, 'operating_pract_npi') ?>

    <?php // echo $form->field($model, 'other_pract_id') ?>

    <?php // echo $form->field($model, 'other_pract_npi') ?>

    <?php // echo $form->field($model, 'pharmacy_charges') ?>

    <?php // echo $form->field($model, 'med_surg_supply_charges') ?>

    <?php // echo $form->field($model, 'lab_charges') ?>

    <?php // echo $form->field($model, 'radiology_charges') ?>

    <?php // echo $form->field($model, 'cardiology_charges') ?>

    <?php // echo $form->field($model, 'oper_room_charges') ?>

    <?php // echo $form->field($model, 'anesthesia_charges') ?>

    <?php // echo $form->field($model, 'recovery_room_charges') ?>

    <?php // echo $form->field($model, 'er_room_charges') ?>

    <?php // echo $form->field($model, 'trauma_resp_charges') ?>

    <?php // echo $form->field($model, 'gi_services_charges') ?>

    <?php // echo $form->field($model, 'extra_shock_charges') ?>

    <?php // echo $form->field($model, 'other_charges') ?>

    <?php // echo $form->field($model, 'total_charges') ?>

    <?php // echo $form->field($model, 'visit_begin_date') ?>

    <?php // echo $form->field($model, 'visit_end_date') ?>

    <?php // echo $form->field($model, 'arrival_hour') ?>

    <?php // echo $form->field($model, 'ed_discharge_hour') ?>

    <?php // echo $form->field($model, 'admitting_idc9_code_id') ?>

    <?php // echo $form->field($model, 'prin_proc_code') ?>

    <?php // echo $form->field($model, 'patient_status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
