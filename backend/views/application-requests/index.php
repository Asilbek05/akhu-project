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

// Register CSRF meta tags
echo Html::csrfMetaTags();
?>

<?php
// Register modal JavaScript
$this->registerJs(<<<JS
let currentId = null;
const setStatusUrl = '$setStatusUrl';
const csrfParam = '$csrfParam';
const csrfToken = '$csrfToken';
const messageModal = new bootstrap.Modal(document.getElementById('message-modal'), {
    keyboard: false
});

$(document).on('click', '.view-message-btn', function() {
    currentId = $(this).data('id');
    let message = $(this).data('message');
    let status = $(this).data('status');
    let replyMessage = $(this).data('reply-message');

    $('#modal-message-content').text(message);

    if (status == 1) {
        $('#reply-container').removeClass('d-none');
        $('#existing-reply-message').text(replyMessage);
        $('#reply-form-container').addClass('d-none');
    } else {
        $('#reply-container').addClass('d-none');
        $('#reply-form-container').removeClass('d-none');
        $('#reply-message').val('');
    }

    messageModal.show();
});

$('#save-reply-btn').on('click', function() {
    let replyMessage = $('#reply-message').val();

    if (!replyMessage.trim()) {
        alert('Javob matni bo\'sh bo\'lmasligi kerak!');
        return;
    }

    // Show loading indicator
    let btn = $(this);
    btn.attr('data-kt-indicator', 'on');
    btn.prop('disabled', true);

    let data = {
        id: currentId,
        reply_message: replyMessage
    };
    data[csrfParam] = csrfToken;

    $.post(setStatusUrl, data)
        .done(function(res) {
            btn.removeAttr('data-kt-indicator');
            btn.prop('disabled', false);
            if (res.success) {
                toastr.success('Javob muvaffaqiyatli saqlandi va yuborildi!');
                messageModal.hide();
                location.reload();
            } else {
                toastr.error('Xato: ' + (res.message || 'Noma\'lum xato yuz berdi.'));
            }
        })
        .fail(function(xhr) {
            btn.removeAttr('data-kt-indicator');
            btn.prop('disabled', false);
            toastr.error('Server bilan bog\'lanishda xato: ' + xhr.status + ' ' + xhr.statusText);
            console.log(xhr.responseText);
        });
});
JS);
?>

    <div class="container-fluid mt-5">

        <div class="d-flex flex-wrap justify-content-between align-items-center mb-5">
            <div>
                <h1 class="d-flex align-items-center text-dark fw-bold my-1 fs-3">
                    <i class="ki-duotone ki-messages fs-2x text-gray-500 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    <?= Html::encode($this->title) ?>
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <?= Html::a('Bosh sahifa', ['/site/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <?= Html::a('So‘rovlar', ['/application-requests/index'], ['class' => 'text-muted text-hover-primary']) ?>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-dark">Mijoz Xabarlari</li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-sm btn-light-primary fw-bold" data-bs-toggle="modal" data-bs-target="#statsModal">
                    <i class="ki-duotone ki-chart-line-up fs-4 me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Statistika
                </button>
            </div>
        </div>

        <?php Modal::begin([
            'id' => 'statsModal',
            'title' => '<i class="ki-duotone ki-chart-line-up fs-4 me-2"></i> Xabarlar Statistkasi',
            'size' => 'modal-sm',
            'options' => ['class' => 'fade'],
        ]); ?>
        <?php Modal::end(); ?>

        <div class="card card-flush shadow-sm mb-5">
            <div class="card-header border-0 pt-6">
                <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">
                    <i class="ki-duotone ki-filter-tick fs-2 me-2 text-primary">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    Filterlash
                </span>
                </h3>
            </div>
            <div class="card-body py-4">
                <?php $form = ActiveForm::begin([
                    'method' => 'get',
                    'action' => ['index'],
                    'options' => ['class' => 'd-flex flex-wrap gap-3']
                ]); ?>
                <div class="flex-grow-1">
                    <?= $form->field($searchModel, 'name', ['options' => ['class' => 'mb-0']])->textInput([
                        'placeholder' => 'Ismni kiriting',
                        'class' => 'form-control form-control-solid'
                    ])->label(false) ?>
                </div>
                <div class="flex-grow-1">
                    <?= $form->field($searchModel, 'phone', ['options' => ['class' => 'mb-0']])->textInput([
                        'placeholder' => 'Telefon raqam',
                        'class' => 'form-control form-control-solid'
                    ])->label(false) ?>
                </div>
                <div class="flex-grow-1">
                    <?= $form->field($searchModel, 'status', ['options' => ['class' => 'mb-0']])->dropDownList([
                        0 => 'Javob berilmagan',
                        1 => 'Javob berilgan'
                    ], [
                        'prompt' => 'Holat',
                        'class' => 'form-select form-select-solid'
                    ])->label(false) ?>
                </div>
                <div class="d-flex gap-3">
                    <?= Html::submitButton('<i class="ki-duotone ki-magnifier fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i> Qidirish', ['class' => 'btn btn-primary fw-bold']) ?>
                    <?= Html::a('<i class="ki-duotone ki-cross-circle fs-4 me-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i> Tozalash', ['index'], ['class' => 'btn btn-light-secondary fw-bold']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <div class="row g-6">
            <?php foreach ($dataProvider->getModels() as $model): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card card-dashed card-xl-stretch h-100 p-5">
                        <div class="card-body p-0 d-flex flex-column justify-content-between">
                            <div class="mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <div class="symbol symbol-40px me-3">
                                        <div class="symbol-label bg-light-primary">
                                            <i class="ki-duotone ki-profile-circle fs-2 text-primary">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </div>
                                    </div>
                                    <span class="badge badge-light-<?= $model->status ? 'success' : 'danger' ?> fw-bold fs-8 px-4 py-3">
                                    <?= $model->status ? 'Javob berilgan' : 'Javob berilmagan' ?>
                                </span>
                                </div>
                                <h5 class="fw-bold text-gray-800 fs-4 mb-2">
                                    <?= Html::encode($model->name) ?>
                                </h5>
                                <span class="text-muted fw-semibold d-block">
                                <i class="ki-duotone ki-calendar-8 fs-4 me-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                                <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
                            </span>
                            </div>
                            <div class="d-flex flex-column">
                                <p class="text-gray-600 fw-semibold fs-6 mb-4">
                                    <?= Html::encode(\yii\helpers\StringHelper::truncateWords($model->message, 15)) ?>
                                </p>
                                <div class="text-end">
                                    <button class="btn btn-sm btn-light-primary view-message-btn"
                                            data-id="<?= $model->id ?>"
                                            data-status="<?= $model->status ?>"
                                            data-message="<?= Html::encode($model->message) ?>"
                                            data-reply-message="<?= Html::encode($model->reply ? $model->reply->reply_message : '') ?>">
                                        <i class="ki-duotone ki-eye fs-4 me-1">
                                            <span class="path1"></span>
                                            <span class="path2"></span>
                                            <span class="path3"></span>
                                        </i>
                                        Batafsil
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="d-flex justify-content-center mt-10">
            <?= LinkPager::widget([
                'pagination' => $dataProvider->pagination,
                'options' => ['class' => 'pagination pagination-lg gap-2'],
                'linkOptions' => ['class' => 'page-link rounded-circle'],
                'disabledListItemSubTagOptions' => ['tag' => 'span', 'class' => 'page-link disabled rounded-circle'],
                'activePageCssClass' => 'active'
            ]) ?>
        </div>
    </div>

<?php
Modal::begin([
    'title' => '<h3 class="modal-title fw-bold">
                    <i class="ki-duotone ki-message-2 fs-2x text-primary me-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                    Xabar Tafsiloti
                </h3>',
    'id' => 'message-modal',
    'size' => 'modal-lg',
    'options' => ['tabindex' => false],
]); ?>

    <div class="card card-flush shadow-sm">
        <div class="card-body">
            <p id="modal-message-content" class="fs-5 fw-semibold text-gray-700 mb-5" style="white-space: pre-line;"></p>

            <div id="reply-container" class="d-none">
                <div class="separator separator-dashed my-5"></div>
                <h5 class="fw-bold text-gray-700 mb-3">Berilgan javob</h5>
                <p id="existing-reply-message" class="text-gray-600 mb-5"></p>
            </div>

            <div id="reply-form-container">
                <div class="separator separator-dashed my-5"></div>
                <div class="mb-5">
                    <label for="reply-message" class="form-label fw-bold text-gray-700">Mijozga javob yozish</label>
                    <textarea id="reply-message" class="form-control form-control-solid" rows="4" placeholder="Javobingizni shu yerga yozing..."></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary fw-bold" id="save-reply-btn" data-kt-indicator="off">
                    <span class="indicator-label">
                        <i class="ki-duotone ki-send fs-4 me-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        Javob yuborish
                    </span>
                        <span class="indicator-progress">
                        Yuborilmoqda... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php Modal::end(); ?>