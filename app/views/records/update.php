<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 */

$this->title = 'Update Records: ' . $model->record_id;
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->record_id, 'url' => ['view', 'id' => $model->record_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="records-update">

    <h1>Update Record:<?php //<?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
