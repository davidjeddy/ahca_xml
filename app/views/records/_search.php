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

    <?= $form->field($model, 'med_rec_num')->textInput([
        'Alphanumeric only'
    ]); ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?php echo $form->field($model, 'ssn')->textInput([
        'placeholder' => '4 or 9 digit SSN number'
    ]); ?>

    <?php echo $form->field($model, 'dob')->textInput([
        'placeholder' => 'YYYY-MM-DD format'
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-warning']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
