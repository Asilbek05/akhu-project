<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\EventsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Eventlar';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN:: Toolbar (Slider-style) -->
<div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
    <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
            <!-- Page title -->
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <div class="d-flex align-items-center gap-2">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0"><?= Html::encode($this->title) ?></h1>
                    <?= Html::tag('span', '<i class="bi bi-info-circle"></i>', [
                        'class' => 'cursor-pointer',
                        'title' => 'Qo‘llanma',
                        'data-bs-toggle' => 'modal',
                        'data-bs-target' => '#infoModal',
                    ]) ?>
                </div>

                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="<?= Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>

            <!-- Action buttons -->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi tadbir', ['create'], [
                    'class' => 'btn btn-flex btn-primary h-40px fs-7 fw-bold',
                ]) ?>
            </div>
        </div>
    </div>
</div>
<!-- END:: Toolbar -->

<!-- BEGIN:: Search -->
<div class="card card-flush shadow-sm mt-5">
    <div class="card-body">
        <?= $this->render('_search', ['model' => $searchModel]) ?>
    </div>
</div>
<!-- END:: Search -->

<!-- BEGIN:: Events Grid -->
<div class="row mt-5">
    <?php foreach ($dataProvider->getModels() as $model): ?>
        <div class="col-md-6 col-xl-4 mb-5">
            <div class="card card-flush shadow-sm h-100 border border-2 border-success">
                <div class="card-header bg-light-success d-flex justify-content-between align-items-center">
                    <h3 class="card-title text-success fw-bold mb-0">
                        <i class="bi bi-calendar-event me-1"></i> <?= Html::encode($model->title) ?>
                    </h3>
                    <span class="badge bg-success">Tadbir</span>
                </div>
                <div class="card-body">
                    <p class="text-muted mb-2">
                        <i class="bi bi-geo-alt-fill me-1 text-gray-600"></i>
                        <?= Html::encode($model->location) ?>
                    </p>
                    <p class="mb-1">
                        <strong>Sana:</strong> <?= Html::encode($model->start_date)  ?>
                    </p>
                    <p class="mb-1">
                        <strong>Vaqt:</strong> <?= Html::encode($model->time) ?>
                    </p>
                    <p class="text-gray-700 fs-7 text-truncate" style="max-height: 3.6em; overflow: hidden;">
                        <?= Html::encode($model->description) ?>
                    </p>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
                    <?= Html::a('<i class="bi bi-pencil"></i> Tahrirlash', ['update', 'id' => $model->id], [
                        'class' => 'btn btn-sm btn-light-warning fw-bold',
                        'title' => 'Tahrirlash',
                    ]) ?>

                    <?= Html::a('<i class="bi bi-list-task"></i> Jadval', ['event-schedule/manage', 'event_id' => $model->id], [
                        'class' => 'btn btn-sm btn-light-info fw-bold',
                        'title' => 'Jadvalni boshqarish',
                    ]) ?>

                    <?= Html::a('<i class="bi bi-trash"></i> O‘chirish', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-sm btn-light-danger fw-bold',
                        'title' => 'O‘chirish',
                        'data' => [
                            'confirm' => 'Ushbu tadbirni o‘chirmoqchimisiz?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<!-- END:: Events Grid -->

<?php
// Qo'llanma Modal
use yii\bootstrap5\Modal;
Modal::begin([
    'id' => 'infoModal',
    'title' => 'Tadbirlar Qo‘llanmasi',
]);

echo <<<HTML
<div style="line-height:1.6">
    <p>
        Ushbu bo‘limda <strong>tadbirlar va uchrashuvlar</strong>ni boshqarishingiz mumkin.
    </p>
    <ul>
        <li><strong>Nomi:</strong> Tadbirning asosiy sarlavhasi.</li>
        <li><strong>Manzil:</strong> Qayerda bo‘lib o‘tadi.</li>
        <li><strong>Sana va vaqt:</strong> Boshlanish va tugash sanasi hamda vaqti.</li>
        <li><strong>Tavsif:</strong> Tadbirning qisqacha izohi yoki matni.</li>
    </ul>
</div>
HTML;

echo Html::button('Tushunarli', [
    'class' => 'btn btn-primary',
    'data-bs-dismiss' => 'modal'
]);

Modal::end();
?>
