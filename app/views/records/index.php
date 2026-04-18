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

    <?php // Incl. search form; ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php // Search results; ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'record_id',
            'med_rec_num',
            'first_name',
            'last_name',
            'ssn',
            'dob',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
