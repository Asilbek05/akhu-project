<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EventSchedule $model */

$this->title = 'Update Event Schedule: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Event Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="event-schedule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
