<?php
use yii\helpers\Html;

/** @var \common\models\Events $event */
/** @var \common\models\EventSchedule[] $schedules */

$this->title = "Manage Schedules: " . $event->title;
?>
<div class="card">
    <div class="card-body">
        <h3><?= Html::encode($this->title) ?></h3>
        <p>
            <?= Html::a('➕ Add Schedule', ['create', 'event_id' => $event->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('⬅ Back to Events', ['events/index'], ['class' => 'btn btn-secondary']) ?>
        </p>

        <div class="row">
            <?php foreach ($schedules as $schedule): ?>
                <div class="col-md-6 mb-4">
                    <div class="card border border-2">
                        <div class="card-body">
                            <h5 class="card-title"><?= Html::encode($schedule->title) ?></h5>
                            <p class="text-muted"><?= $schedule->start_time ?> – <?= $schedule->end_time ?></p>
                            <p><?= Html::encode($schedule->description) ?></p>
                            <div class="d-flex justify-content-between">
                                <?= Html::a('Edit', ['update', 'id' => $schedule->id], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $schedule->id], [
                                    'class' => 'btn btn-sm btn-danger',
                                    'data' => ['confirm' => 'Are you sure?', 'method' => 'post']
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
