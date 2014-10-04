<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
		echo 'Application: '. Yii::$app->params['application']. '<br />';
		echo 'Copyright: '. Yii::$app->params['copyright']. '<br />';
		echo 'Warranty: '. Yii::$app->params['warranty']. '<br />';
		echo 'License: '. Yii::$app->params['license']. '<br />';
    ?>
</div>
