<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\AdmissionSource;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="records-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ahca_num')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'med_rec_num')->textInput(['maxlength' => 24]) ?>

    <?= $form->field($model, 'ssn')->textInput(['maxlength' => 9]) ?>

    <?= $form->field($model, 'ethnicity_id')->textInput() ?>

    <?= $form->field($model, 'race_id')->textInput() ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?= $form->field($model, 'sex_id')->textInput() ?>

    <?= $form->field($model, 'zip')->textInput(['maxlength' => 5]) ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'visit_begin_date')->textInput() ?>

    <?= $form->field($model, 'arrival_hour')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'service_id')->textInput() ?>

    <?php //echo $form->field($model, 'admission_source_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'admission_source_id');
    echo Html::activeDropDownList(
        $model,
        'admission_source_id',
        ArrayHelper::map(
            AdmissionSource::find()->all(),
            'admission_source_id',
            'admission_source_description',
            'admission_source_value'
        ),
        ['class'=>'form-control']
    );
    ?>

    <?= $form->field($model, 'princ_payer_id')->textInput() ?>

    <?= $form->field($model, 'idc9_code_id')->textInput() ?>

    <?= $form->field($model, 'pharmacy_charges')->textInput() ?>

    <?= $form->field($model, 'med_surg_supply_charges')->textInput() ?>

    <?= $form->field($model, 'lab_charges')->textInput() ?>

    <?= $form->field($model, 'radiology_charges')->textInput() ?>

    <?= $form->field($model, 'cardiology_charges')->textInput() ?>

    <?= $form->field($model, 'oper_room_charges')->textInput() ?>

    <?= $form->field($model, 'anesthesia_charges')->textInput() ?>

    <?= $form->field($model, 'recovery_room_charges')->textInput() ?>

    <?= $form->field($model, 'er_room_charges')->textInput() ?>

    <?= $form->field($model, 'trauma_resp_charges')->textInput() ?>

    <?= $form->field($model, 'gi_services_charges')->textInput() ?>

    <?= $form->field($model, 'extra_shock_charges')->textInput() ?>

    <?= $form->field($model, 'other_charges')->textInput() ?>

    <?= $form->field($model, 'total_charges')->textInput() ?>

    <?= $form->field($model, 'admitting_idc9_code_id')->textInput() ?>

    <?= $form->field($model, 'patient_status_id')->textInput() ?>

    <?= $form->field($model, 'visit_end_date')->textInput() ?>

    <?= $form->field($model, 'attending_pract_npi')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'operating_pract_npi')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'other_pract_npi')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'attending_pract_id')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'operating_pract_id')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'other_pract_id')->textInput(['maxlength' => 12]) ?>

    <?= $form->field($model, 'ed_discharge_hour')->textInput(['maxlength' => 2]) ?>

    <?= $form->field($model, 'prin_proc_code')->textInput(['maxlength' => 8]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
