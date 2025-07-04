<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\bootstrap5\Modal;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\ApplicationRequestsSearch $searchModel */

$this->title = 'Mijoz Xabarlari';
$this->params['breadcrumbs'][] = $this->title;


$setStatusUrl = Url::to(['application-requests/set-status']);
$csrfParam = Yii::$app->request->csrfParam;
$csrfToken = Yii::$app->request->csrfToken;
?>

<?php
echo Html::csrfMetaTags();

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

    let data = {
        id: currentId,
        status: status
    };
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
            alert('Serverdan 400 yoki boshqa xato keldi!');
            console.log(xhr.responseText);
        });
});
JS
);

?>



<div class="application-requests-index">
    <h1 class="mb-3 d-flex flex-wrap align-items-center gap-2">
        <?= Html::encode($this->title) ?>

        <?php if ($Count > 0): ?>
            <span class="badge rounded-pill bg-primary">
            Jami: <?= $Count ?>
        </span>
            <span class="badge rounded-pill bg-success">
            Ko‘rilgan: <?= $viewCount ?>
        </span>
            <span class="badge rounded-pill bg-danger">
            Ko‘rilmagan: <?= $noviewCount ?>
        </span>
        <?php else: ?>
            <span class="badge bg-secondary">Xabarlar topilmadi</span>
        <?php endif; ?>
    </h1>

    <!-- Filter forma -->
    <div class="card mb-4 p-3 shadow-sm">
        <?php $form = ActiveForm::begin(['method' => 'get', 'action' => ['index']]); ?>
        <div class="row g-3">
            <div class="col-md-4">
                <?= $form->field($searchModel, 'name')
                    ->textInput(['placeholder' => 'Ismni kiriting'])
                    ->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($searchModel, 'phone')
                    ->textInput(['placeholder' => 'Telefon raqam'])
                    ->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($searchModel, 'status')->dropDownList([
                    0 => 'Ko‘rilmagan',
                    1 => 'Ko‘rilgan'
                ], ['prompt' => 'Barchasi'])->label(false) ?>
            </div>
        </div>
        <div class="mt-3 text-end">
            <?= Html::submitButton('Qidirish', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Tozalash', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

    <!-- Cardlar -->
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm" style="border-radius: 16px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= Html::encode($model->name) ?>
                            <span class="badge <?= $model->status ? 'bg-success' : 'bg-danger' ?> float-end">
                                <?= $model->status ? 'Ko‘rilgan' : 'Ko‘rilmagan' ?>
                            </span>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            <?= Yii::$app->formatter->asDatetime($model->created_at) ?>
                        </h6>
                        <p class="card-text">
                            <?= Html::encode(\yii\helpers\StringHelper::truncateWords($model->message, 10)) ?>
                        </p>
                        <button class="btn btn-info btn-sm text-white view-message-btn"
                                data-id="<?= $model->id ?>"
                                data-status="<?= $model->status ?>"
                                data-message="<?= Html::encode($model->message) ?>">
                            Batafsil
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-center">
        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
    </div>
</div>

<?php
Modal::begin([
    'title' => 'Xabar Tafsiloti',
    'id' => 'message-modal',
]); ?>

<div id="modal-message-content" style="white-space: pre-line; margin-bottom: 15px;"></div>
<div class="form-group">
    <label for="status-select">Holat</label>
    <select id="status-select" class="form-select">
        <option value="0">Ko‘rilmagan</option>
        <option value="1">Ko‘rilgan</option>
    </select>
</div>
<div class="mt-3 text-end">
    <button class="btn btn-success btn-sm" id="save-status-btn">Saqlash</button>
</div>
<?php Modal::end(); ?>


