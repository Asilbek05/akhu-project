<?php

use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var \common\models\Events $event */
/** @var \common\models\EventSchedule[] $schedules */

$this->title = 'Schedules: ' . $event->title;
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tadbirlar', 'url' => ['events/index']];
$this->params['breadcrumbs'][] = ['label' => $event->title, 'url' => ['events/view', 'id' => $event->id]];
$this->params['breadcrumbs'][] = 'Schedules';

Modal::begin([
    'id' => 'modal',
    'title' => '<div class="d-flex align-items-center">
                    <i class="bi bi-calendar-plus me-2 text-primary"></i> 
                    <span class="fs-4 fw-bold text-dark">Yangi Jadval Qo‘shish</span>
                </div>',
    'size' => Modal::SIZE_LARGE,
    'options' => [
        'class' => 'fade modal-lg', // Metronic-style
        'tabindex' => false
    ],
    'headerOptions' => ['class' => 'border-bottom-0 p-4 bg-light rounded-top'],
    'bodyOptions' => ['class' => 'p-4'],
    'footerOptions' => ['class' => 'border-top-0 p-3 bg-light rounded-bottom'],
    'closeButton' => [
        'label' => '<i class="bi bi-x-lg"></i>',
        'class' => 'btn btn-icon btn-sm btn-light-primary rounded-circle shadow-sm',
    ],
]);

echo '<div id="modalContent"></div>';

Modal::end();

?>


<div class="container-fluid py-4">

    <!--begin::Header-->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-1"><?= Html::encode($this->title) ?></h2>
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7">
                <li class="breadcrumb-item text-muted">
                    <a href="<?= Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                </li>
                <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                <li class="breadcrumb-item text-muted">
                    <a href="<?= Url::to(['events/index']) ?>" class="text-muted text-hover-primary">Tadbirlar</a>
                </li>
                <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                <li class="breadcrumb-item text-muted">
                    <a href="<?= Url::to(['events/view', 'id' => $event->id]) ?>" class="text-muted text-hover-primary"><?= Html::encode($event->title) ?></a>
                </li>
                <li class="breadcrumb-item"><span class="bullet bg-gray-500 w-5px h-2px"></span></li>
                <li class="breadcrumb-item text-muted">Jadvalni boshqarish</li>
            </ul>
        </div>

        <div class="d-flex gap-2">
            <?php if (count($schedules) >= 1): ?>
                <?= Html::button('<i class="bi bi-plus-circle me-1"></i> Yaratish', [
                    'value' => Url::to(['create', 'event_id' => $event->id]),
                    'class' => 'btn btn-success btn-sm fw-bold',
                    'id' => 'modalButton'
                ]) ?>
            <?php endif; ?>
            <?= Html::a('<i class="bi bi-arrow-left me-1"></i> Orqaga', ['events/index'], [
                'class' => 'btn btn-secondary btn-sm fw-bold'
            ]) ?>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Schedules Grid-->
    <div class="row">
        <?php if (empty($schedules)): ?>
            <!-- Empty State Card -->
            <div class="col-12 col-md-6 col-xl-4 mb-5">
                <div class="card h-100 border-dashed border-2 border-gray-300 rounded-4 text-center p-5 position-relative hover-shadow"
                     style="background-color: #f9f9f9; transition: all 0.3s;">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <i class="bi bi-calendar-plus fs-1 text-gray-400 mb-3"></i>
                        <h5 class="text-gray-600 mb-2">Hali jadval qo'shilmagan</h5>
                        <p class="text-muted mb-3">Jadval qo'shish uchun tugmani bosing</p>
                        <?= Html::button('<i class="bi bi-plus-circle me-1"></i> Yangi jadval qo‘shish', [
                            'value' => Url::to(['create', 'event_id' => $event->id]),
                            'class' => 'btn btn-success fw-semibold',
                            'id' => 'modalButton'
                        ]) ?>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($schedules as $schedule): ?>
                <div class="col-md-6 col-xl-4 mb-5">
                    <div class="card shadow-sm rounded-4 h-100 border border-dashed border-gray-300">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div>
                                <h5 class="text-dark fw-bold mb-2"><?= Html::encode($schedule->title) ?></h5>
                                <div class="text-muted mb-1">
                                    <i class="bi bi-clock me-1"></i>
                                    <?= Yii::$app->formatter->asTime($schedule->start_time) ?>
                                    —
                                    <?= Yii::$app->formatter->asTime($schedule->end_time) ?>
                                </div>
                                <p class="mt-2 text-gray-700"><?= Html::encode($schedule->description) ?></p>
                            </div>
                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <?= Html::button('<i class="bi bi-pencil"></i>',[
                                    'value' => Url::to(['update', 'id' => $schedule->id]),
                                    'class' => 'btn btn-primary btn-sm fw-bold openModalButton'
                                ]) ?>
                                <?= Html::a('<i class="bi bi-trash"></i>', ['delete', 'id' => $schedule->id], [
                                    'class' => 'btn btn-icon btn-sm btn-danger',
                                    'title' => 'O‘chirish',
                                    'data' => [
                                        'confirm' => 'Ishonchingiz komilmi?',
                                        'method' => 'post',
                                    ]
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
    <!--end::Schedules Grid-->

</div>

<?php
$this->registerJs("
    $('#modalButton').click(function() {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
    $('.openModalButton').click(function() {
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
");
?>
