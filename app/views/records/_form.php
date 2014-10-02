<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\AdmissionSource;
use app\models\Country;
use app\models\Ethnicity;
use app\models\Icd9Code;
use app\models\PatientStatus;
use app\models\PrinciplePayer;
use app\models\Race;
use app\models\Sex;
use app\models\ServiceCode;

use dosamigos\datetimepicker\DateTimePicker;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="records-form">

    <?php // @todo create a quick menu for on page navigation. - DJE : 2014-09-29; ?>

    <?php $form = ActiveForm::begin(); ?>



    <h2><span class="label label-primary">General Information:</span></h2>

    <?= $form->field($model, 'med_rec_num')->textInput([
        'placeholder' => (time()*1000),
        'readonly' => true
    ]); ?>

    <?= $form->field($model, 'ahca_num')->textInput(['placeholder' => '8 to 10 numbers']); ?>

    <?= $form->field($model, 'ssn')->textInput([
        'placeholder' => 'Full SSN (no dashes) OR last 4 digits of SSN',
        'minlength'   => 4,
        'maxlength'   => 9,
        'type'        => 'number',
        'pattern'     => '^\d{9}$'
    ]); ?>

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

    <?php //echo $form->field($model, 'dob')->textInput(); ?>
    <?= $form->field($model, 'dob')->widget(DateTimePicker::className(), [
        'language'       => 'en',
        'size'           => 'ms',
        'template'       => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline'         => false,
        'clientOptions'  => [
            'startView'          => 4,
            'minView'            => 2,
            'maxView'            => 4,
            'autoclose'          => true,
            'format'             => 'yyyy-mm-dd', // if inline = false
            'keyboardNavigation' => true,
            'forceParse'         => false,
            //'todayBtn'         => true
        ]
    ]);?>

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

    <?php //echo $form->field($model, 'patient_status_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'patient_status');
    echo Html::activeDropDownList(
        $model,
        'patient_status_id',
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

    <?= $form->field($model, 'zip')->textInput([
        'placeholder' => '5 digit Zip code number',
        'minlength'   => 5,
        'maxlength'   => 5,
        'type'        => 'number',
        'pattern'     => '^\d{5}$'
    ]) ?>

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


    <?php //echo $form->field($model, 'admission_source_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'admission_source_id');
    echo Html::activeDropDownList(
        $model,
        'admission_source_id',
        ArrayHelper::map(
            AdmissionSource::find()->all(),
            'admission_source_id',
            'admission_source_value',
            'admission_source_description'
        ),
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

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



    <h2><span class="label label-primary">Coding:</span></h2>

    <?php //$form->field($model, 'admitting_icd9_code_id')->textInput(['placeholder' => 'ICD9 code']); ?>
    <?php
    echo Html::activeLabel($model, 'admitting_icd9_code_id');
    echo Html::activeDropDownList(
        $model,
        'icd9_code_id',
        ArrayHelper::map(
            icd9Code::find()->all(),
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

    <?php //echo $form->field($model, 'icd9_code_id')->textInput(); ?>
    <?php
    echo Html::activeLabel($model, 'icd9_code_id');
    echo Html::activeDropDownList(
        $model,
        'icd9_code_id',
        ArrayHelper::map(
            icd9Code::find()->all(),
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

    <?php //$form->field($model, 'prin_proc_icd9_code_id')->textInput(['placeholder' => 'ICD9 code']); ?>
    <?php
    echo Html::activeLabel($model, 'prin_proc_icd9_code_id');
    echo Html::activeDropDownList(
        $model,
        'prin_proc_icd9_code_id',
        ArrayHelper::map(
            icd9Code::find()->all(),
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

    <?php //@todo Add CPT codes here; ?>




    <h2><span class="label label-primary">Charges:</span></h2>

    <?= $form->field($model, 'anesthesia_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'cardiology_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>

    <?= $form->field($model, 'extra_shock_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'gi_services_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'lab_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'med_surg_supply_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'oper_room_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'other_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'pharmacy_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'radiology_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
          'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'recovery_room_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'total_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>
    
    <?= $form->field($model, 'trauma_resp_charges')->textInput([
        'placeholder' => 'Whole number',
        'minlength' => 1,
        'maxlength' => 11,
        'type'      => 'number',
        'pattern'   => '^[0-9]{11}*$'
    ]); ?>



    <h2><span class="label label-primary">Practitioner(s) Information:</span></h2>

    <?= $form->field($model, 'attending_pract_id')->textInput([
        'placeholder' => '12 character alphanumeric',
        'minlength'   => 12,
        'maxlength'   => 12,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>

    <?= $form->field($model, 'attending_pract_npi')->textInput([
        'placeholder' => '10 digits',
        'minlength'   => 10,
        'maxlength'   => 10,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>

    <?= $form->field($model, 'operating_pract_id')->textInput([
        'placeholder' => '12 character alphanumeric',
        'minlength'   => 12,
        'maxlength'   => 12,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>

    <?= $form->field($model, 'operating_pract_npi')->textInput([
        'placeholder' => '10 digits',
        'minlength'   => 10,
        'maxlength'   => 10,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>

    <?= $form->field($model, 'other_pract_id')->textInput([
        'placeholder' => '12 character alphanumeric',
        'minlength'   => 12,
        'maxlength'   => 12,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>

    <?= $form->field($model, 'other_pract_npi')->textInput([
        'placeholder' => '10 digits',
        'minlength'   => 10,
        'maxlength'   => 10,
        'type'        => 'mixed',
        'pattern'     => '^\d{a-zA-z0-9}$'
    ]); ?>



    <h2><span class="label label-primary">Dates and Times:</span></h2>

    <?php //$form->field($model, 'visit_begin_date')->textInput(); ?>
    <?= $form->field($model, 'visit_begin_date')->widget(DateTimePicker::className(), [
        'language'       => 'en',
        'size'           => 'ms',
        'template'       => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline'         => false,
        'clientOptions'  => [
            'startView'          => 4,
            'minView'            => 2,
            'maxView'            => 4,
            'autoclose'          => true,
            'format'             => 'yyyy-mm-dd', // if inline = false
            'keyboardNavigation' => true,
            'forceParse'         => false,
            'todayBtn'           => true
        ]
    ]);?>

    <?php //$form->field($model, 'arrival_hour')->textInput(['maxlength' => 2]); ?>
    <?= $form->field($model, 'arrival_hour')->widget(DateTimePicker::className(), [
        'language'       => 'en',
        'size'           => 'ms',
        'template'       => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline'         => false,
        'clientOptions'  => [
            'startView'          => 1,
            'minView'            => 1,
            'maxView'            => 1,
            'autoclose'          => true,
            'format'             => 'hh', // if inline = false
            'keyboardNavigation' => true,
            'forceParse'         => false,
            'todayBtn'           => true
        ]
    ]);?>

    <?php //$form->field($model, 'visit_end_date')->textInput(); ?>
    <?= $form->field($model, 'visit_end_date')->widget(DateTimePicker::className(), [
        'language'       => 'en',
        'size'           => 'ms',
        'template'       => '{input}',
        'pickButtonIcon' => 'glyphicon glyphicon-time',
        'inline'         => false,
        'clientOptions'  => [
            'startView'          => 4,
            'minView'            => 2,
            'maxView'            => 4,
            'autoclose'          => true,
            'format'             => 'yyyy-mm-dd', // if inline = false
            'keyboardNavigation' => true,
            'forceParse'         => false,
            'todayBtn'           => true
        ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
