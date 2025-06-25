<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EventSchedule $model */

$this->title = 'Create Event Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Event Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
