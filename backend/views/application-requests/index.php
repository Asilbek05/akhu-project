<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\bootstrap5\Modal;

$this->title = 'Mijoz Xabarlari';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = ['label' => 'So‘rovlar', 'url' => ['/application-requests/index']];
$this->params['breadcrumbs'][] = 'Mijoz Xabarlari';

$setStatusUrl = Url::to(['application-requests/set-status']);
$csrfParam = Yii::$app->request->csrfParam;
$csrfToken = Yii::$app->request->csrfToken;

echo Html::csrfMetaTags();
?>

<?php
// Register modal JavaScript
$this->registerJs(<<<JS
let currentId = null;
const setStatusUrl = '$setStatusUrl';
const csrfParam = '$csrfParam';
const csrfToken = '$csrfToken';

$(document).on('click', '.view-message-btn', function() {
    currentId = $(this).data('id');
    let message = $(this).data('message');
    let status = $(this).data('status');

    $('#modal-message-content').text(message);
    $('#status-select').val(status);
    $('#message-modal').modal('show');
});

$('#save-status-btn').on('click', function() {
    let status = $('#status-select').val();
    let data = { id: currentId, status: status };
    data[csrfParam] = csrfToken;

    $.post(setStatusUrl, data)
        .done(function(res) {
            if (res.success) {
                $('#message-modal').modal('hide');
                location.reload();
            } else {
                alert('Xato: ' + (res.message || 'Noma\'lum xato'));
            }
        })
        .fail(function(xhr) {
            alert('Serverdan xato keldi!');
            console.log(xhr.responseText);
        });
});
JS);
?>

<div class="container-fluid mt-5">

    <!-- Breadcrumbs + title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold mb-1 text-dark"><?= Html::encode($this->title) ?></h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-0">
                    <li class="breadcrumb-item">
                        <?= Html::a('Bosh sahifa', ['/site/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item">
                        <?= Html::a('So‘rovlar', ['/application-requests/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">Mijoz Xabarlari</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Overall Stats -->
    <div class="text-end mb-3">
        <button type="button" class="btn btn-light-primary btn-sm fw-bold" data-bs-toggle="modal" data-bs-target="#statsModal">
            <i class="bi bi-bar-chart"></i> Statistika
        </button>
    </div>

    <?php

    Modal::begin([
        'id' => 'statsModal',
        'title' => '<i class="bi bi-bar-chart"></i> Xabarlar Statistkasi',
        'size' => 'modal-sm',
        'options' => ['class' => 'fade'],
    ]);
    ?>

    <div class="list-group list-group-flush">
        <div class="list-group-item d-flex justify-content-between">
            <span>Jami</span>
            <span class="badge bg-primary"><?= $Count ?></span>
        </div>
        <div class="list-group-item d-flex justify-content-between">
            <span>Ko‘rilgan</span>
            <span class="badge bg-success"><?= $viewCount ?></span>
        </div>
        <div class="list-group-item d-flex justify-content-between">
            <span>Ko‘rilmagan</span>
            <span class="badge bg-danger"><?= $noviewCount ?></span>
        </div>
    </div>

    <?php Modal::end(); ?>

    <!-- Filter Card -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header bg-light-secondary py-3">
            <h3 class="card-title fw-semibold mb-0 text-dark">
                <i class="bi bi-funnel-fill me-2 text-primary"></i> Filterlash
            </h3>
        </div>
        <div class="card-body">
            <?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['index']]); ?>
            <div class="row g-3">
                <div class="col-lg-4">
                    <?= $form->field($searchModel, 'name')->textInput([
                        'placeholder' => 'Ismni kiriting'
                    ])->label(false) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($searchModel, 'phone')->textInput([
                        'placeholder' => 'Telefon raqam'
                    ])->label(false) ?>
                </div>
                <div class="col-lg-4">
                    <?= $form->field($searchModel, 'status')->dropDownList([
                        0 => 'Ko‘rilmagan',
                        1 => 'Ko‘rilgan'
                    ], ['prompt' => 'Barchasi'])->label(false) ?>
                </div>
            </div>
            <div class="text-end mt-3">
                <?= Html::submitButton('<i class="bi bi-search"></i> Qidirish', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('<i class="bi bi-x-circle"></i> Tozalash', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

    <!-- Cards -->
    <div class="row g-4">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="fw-bold mb-0"><?= Html::encode($model->name) ?></h5>
                            <span class="badge <?= $model->status ? 'bg-success' : 'bg-secondary' ?>">
                                <?= $model->status ? 'Ko‘rilgan' : 'Ko‘rilmagan' ?>
                            </span>
                        </div>
                        <div class="text-muted small mb-3">
                            <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
                        </div>
                        <p class="mb-3 text-dark">
                            <?= Html::encode(\yii\helpers\StringHelper::truncateWords($model->message, 15)) ?>
                        </p>
                        <div class="mt-auto text-end">
                            <button class="btn btn-light-primary btn-sm view-message-btn"
                                    data-id="<?= $model->id ?>"
                                    data-status="<?= $model->status ?>"
                                    data-message="<?= Html::encode($model->message) ?>">
                                <i class="bi bi-eye-fill me-1"></i> Batafsil
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-5">
        <?= LinkPager::widget([
            'pagination' => $dataProvider->pagination,
            'options' => ['class' => 'pagination pagination-lg gap-2 justify-content-center'],
            'linkOptions' => ['class' => 'page-link rounded'],
            'disabledListItemSubTagOptions' => ['tag' => 'span', 'class' => 'page-link disabled'],
            'activePageCssClass' => 'active'
        ]) ?>
    </div>
</div>

<?php
Modal::begin([
    'title' => '<i class="bi bi-chat-dots-fill me-2"></i> Xabar Tafsiloti',
    'id' => 'message-modal',
    'size' => 'modal-lg',
    'options' => ['tabindex' => false],
]); ?>

<div id="modal-message-content" class="mb-3" style="white-space: pre-line;"></div>
<div class="form-group mb-3">
    <label for="status-select" class="form-label">Holatni tanlang</label>
    <select id="status-select" class="form-select">
        <option value="0">Ko‘rilmagan</option>
        <option value="1">Ko‘rilgan</option>
    </select>
</div>
<div class="text-end">
    <button class="btn btn-success btn-sm" id="save-status-btn">
        <i class="bi bi-check-circle me-1"></i> Saqlash
    </button>
</div>

<?php Modal::end(); ?>
