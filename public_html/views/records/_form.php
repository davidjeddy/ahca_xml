<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\AdmissionSource;
use app\models\Country;
use app\models\Ethnicity;
use app\models\ICD9Code;
use app\models\PatientStatus;
use app\models\PrinciplePayer;
use app\models\Race;
use app\models\Sex;
use app\models\ServiceCode;

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

    <?php //$form->field($model, 'ethnicity_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'ethnicity');
    echo Html::activeDropDownList(
        $model,
        'ethnicity_id',
        ArrayHelper::map(
            Ethnicity::find()->all(),
            'ethnicity_id',
            'ethnicity_value',
            'ethnicity_description'
        ),
        // @todo abstract this to app settings - DJE : 2014-09-30
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?php //$form->field($model, 'race_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'race');
    echo Html::activeDropDownList(
        $model,
        'race_id',
        ArrayHelper::map(
            Race::find()->all(),
            'race_id',
            'race_value',
            'race_description'
        ),
        // @todo abstract this to app settings - DJE : 2014-09-30
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?= $form->field($model, 'dob')->textInput() ?>

    <?php //$form->field($model, 'sex_id')->textInput() ?>
    <?php
    echo Html::activeLabel($model, 'sex');
    echo Html::activeDropDownList(
        $model,
        'sex_id',
        ArrayHelper::map(
            Sex::find()->all(),
            'sex_id',
            'sex_value',
            'sex_description'
        ),
        // @todo abstract this to app settings - DJE : 2014-09-30
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?= $form->field($model, 'zip')->textInput(['maxlength' => 5]) ?>

    <?php //echo $form->field($model, 'country_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'country');
    echo Html::activeDropDownList(
        $model,
        'country_id',
        ArrayHelper::map(
            Country::find()->all(),
            'country_id',
            'country_name'
        ),
        // @todo abstract this to app settings - DJE : 2014-09-30
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?= $form->field($model, 'visit_begin_date')->textInput() ?>

    <?= $form->field($model, 'arrival_hour')->textInput(['maxlength' => 2]) ?>

    <?php //$form->field($model, 'service_id')->textInput() ?>
    <?php
    echo Html::activeLabel($model, 'service_id');
    echo Html::activeDropDownList(
        $model,
        'service_id',
        ArrayHelper::map(
            ServiceCode::find()->all(),
            'servicecode_id',
            'servicecode_value',
            'servicecode_description'
        ),
        // @todo abstract this to app settings - DJE : 2014-09-30
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

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
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?php //$form->field($model, 'princ_payer_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'principle_payer');
    echo Html::activeDropDownList(
        $model,
        'princ_payer_id',
        ArrayHelper::map(
            PrinciplePayer::find()->all(),
            'princ_payer_id',
            'princ_payer_value',
            'princ_payer_description'
        ),
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <?php //echo $form->field($model, 'idc9_code_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'icd9_code_id');
    echo Html::activeDropDownList(
        $model,
        'idc9Code',
        ArrayHelper::map(
            ICD9Code::find()->all(),
            'icd9_code_id',
            'icd9_code_value',
            'icd9_code_description'
        ),
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

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

    <?php //echo $form->field($model, 'patient_status_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'patient_status_id');
    echo Html::activeDropDownList(
        $model,
        'idc9Code',
        ArrayHelper::map(
            PatientStatus::find()->all(),
            'patient_status_id',
            'patient_status_value',
            'patient_status_description'
        ),
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

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
