<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

use app\models\Reports;

/**
 * @var yii\web\View $this
 */
$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-form">

    <?php $flash_msg = Yii::$app->session->getFlash('notice'); ?>
    <?php if(!empty($flash_msg)) { ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <strong>Warning!</strong>&nbsp;<?= $flash_msg;?>
        </div>
    <?php }; ?>

    

    <?php // @todo create a quick menu for on page navigation. - DJE : 2014-09-29; ?>

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'method' => 'get',
    ]); ?>

    <h2><span class="label label-primary"><?= Html::encode($this->title) ?></span></h2>

    <?php
    echo Html::activeLabel($model, 'report_option_id');
    echo Html::activeDropDownList(
        $model,
        'report_option_id',
        ArrayHelper::map(
            Reports::find()->all(),
            'report_option_id',
            'report_window'
        ),
        [
            'prompt' => 'Pick One',
            'class'  => 'form-control'
        ]
    );
    ?>

    <div class="form-group"><?php echo Html::submitButton( 'Request Report', ['class' => 'btn btn-primary']); ?></div>

    <?php ActiveForm::end(); ?>
</div>
