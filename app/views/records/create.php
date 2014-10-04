<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var app\models\records $model
 */

$this->title = 'Create Records';
$this->params['breadcrumbs'][] = ['label' => 'Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="records-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
