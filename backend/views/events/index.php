<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\EventsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Events';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="events-index">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
        <?= Html::a('Create Event', ['create'], ['class' => 'btn btn-success']) ?>
    </div>
    <?= $this->render('_search', ['model' => $searchModel]) ?>
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-md-6 col-xl-4 mb-5">
                <div class="card card-flush shadow-sm h-100 border-success border border-2">
                    <div class="card-header bg-light-success">
                        <h3 class="card-title text-success fw-bold mb-0"><?= Html::encode($model->title) ?></h3>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">
                            <i class="ki-duotone ki-pin fs-6 text-gray-500 me-1"></i>
                            <?= Html::encode($model->location) ?>
                        </p>
                        <p class="mb-1"><strong>Date:</strong> <?= $model->start_date ?> – <?= $model->end_date ?></p>
                        <p class="mb-1"><strong>Time:</strong> <?= $model->time ?></p>
                        <p class="text-gray-700 fs-7 text-truncate" style="max-height: 3.6em; overflow: hidden;">
                            <?= Html::encode($model->description) ?>
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <?= Html::a('<i class="ki-duotone ki-pencil fs-5 me-1"></i>Edit', ['update', 'id' => $model->id], [
                            'class' => 'btn btn-sm btn-success',
                            'title' => 'Edit',
                        ]) ?>

                        <?= Html::a('Edit Schedules', ['event-schedule/manage', 'event_id' => $model->id], ['class' => 'btn btn-info btn-sm']) ?>

                        <?= Html::a('<i class="ki-duotone ki-trash fs-5 me-1"></i>Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-sm btn-light-danger',
                            'title' => 'Delete',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this event?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
