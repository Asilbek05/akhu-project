<?php

use common\models\Slider;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SliderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Slayderlar';
$this->params['breadcrumbs'][] = $this->title;

// Help modal
Modal::begin([
    'id' => 'infoModal',
    'title' => 'Slayder Qo‘llanmasi',
]);

echo <<<HTML
    <div style="line-height:1.6">
        <p>
            Ushbu bo‘lim orqali siz <strong>saytingizning bosh sahifasida chiqadigan slayder</strong> ma'lumotlarini kiritishingiz mumkin.
        </p>
        <ul>
            <li><strong>Slayder nomi:</strong> slayderni farqlash uchun ishlatiladi.</li>
            <li><strong>Tavsif:</strong> foydalanuvchiga ko‘rinadigan qisqacha matn.</li>
            <li><strong>Tugma matni:</strong> slayder ichidagi chaqiriq (Call to Action) tugmasining yozuvi.</li>
            <li><strong>Tugma havolasi (URL):</strong> tugma bosilganda foydalanuvchi qayerga yo‘naltirilishini ko‘rsating.</li>
            <li><strong>Fon rasmi:</strong> slayder foniga qo‘yiladigan rasm (jpg/png tavsiya etiladi).</li>
        </ul>
        <p>Quyida namunaviy tabiat fon rasmini ko‘rishingiz mumkin:</p>
        <div style="text-align:center">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=800&q=80" 
                 alt="Tabiat rasmi" 
                 style="max-width:100%; border:1px solid #ccc; border-radius:8px; margin:10px 0;">
        </div>
    </div>
HTML;

echo Html::button('Tushunarli', [
    'class' => 'btn btn-primary',
    'data-bs-dismiss' => 'modal'
]);

Modal::end();
?>

<div class="d-flex flex-column flex-column-fluid">

    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!-- Page title -->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <div class="d-flex align-items-center gap-2">
                        <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0">Slayderlar</h1>
                        <?= Html::tag('span','<i class="bi bi-info-circle"></i>', [
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
                        <li class="breadcrumb-item text-muted">Slayderlar</li>
                    </ul>
                </div>

                <!-- Action buttons -->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi slayder', ['create'], [
                        'class' => 'btn btn-flex btn-primary h-40px fs-7 fw-bold',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <!--end::Toolbar-->

    <!--begin::Content-->
    <div id="kt_app_content" class="app-content pt-3 flex-column-fluid">
        <div id="kt_app_content_container" class="container-fluid">
            <div class="card">
                <div class="card-body py-4">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <?= GridView::widget([
                            'id' => 'slider-grid',
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout' => '{items}{pager}',
                            'tableOptions' => [
                                'class' => 'table align-middle table-row-dashed fs-6 gy-5 mb-0',
                            ],
                            'columns' => [

                                [
                                    'attribute' => 'name',
                                    'contentOptions' => ['style' => 'min-width:180px;'],
                                ],
                                [
                                    'attribute' => 'description',
                                    'format' => 'ntext',
                                    'contentOptions' => ['style' => 'min-width:220px;'],
                                ],
                                [
                                    'attribute' => 'button_text',
                                    'contentOptions' => ['style' => 'min-width:140px;'],
                                ],
                                [
                                    'attribute' => 'button_url',
                                    'format' => 'url',
                                    'contentOptions' => ['style' => 'min-width:200px;'],
                                ],
                                [
                                    'label' => 'Tartib',
                                    'format' => 'raw',
                                    'contentOptions' => ['style' => 'min-width:180px;'],
                                    'value' => function ($model) {
                                        return Html::tag('div',
                                            Html::tag('span', $model->sort_order, ['class' => 'badge bg-secondary me-2']) .
                                            Html::a('↑', ['slider/move', 'id' => $model->id, 'direction' => 'up'], [
                                                'class' => 'btn btn-sm btn-light-success me-1',
                                                'data-method' => 'post',
                                                'title' => 'Yuqoriga',
                                            ]) .
                                            Html::a('↓', ['slider/move', 'id' => $model->id, 'direction' => 'down'], [
                                                'class' => 'btn btn-sm btn-light-danger',
                                                'data-method' => 'post',
                                                'title' => 'Pastga',
                                            ]),
                                            ['class' => 'd-flex align-items-center']
                                        );
                                    }
                                ],
                                [
                                    'class' => ActionColumn::class,
                                    'template' => '{view} {update} {delete}',
                                    'buttons' => [
                                        'view' => fn($url, $model) =>
                                        Html::a('<i class="bi bi-eye"></i>', $url, [
                                            'class' => 'btn btn-sm btn-light-primary me-1',
                                            'title' => 'Ko‘rish',
                                        ]),
                                        'update' => fn($url, $model) =>
                                        Html::a('<i class="bi bi-pencil"></i>', $url, [
                                            'class' => 'btn btn-sm btn-light-warning me-1',
                                            'title' => 'Tahrirlash',
                                        ]),
                                        'delete' => fn($url, $model) =>
                                        Html::a('<i class="bi bi-trash"></i>', $url, [
                                            'class' => 'btn btn-sm btn-light-danger',
                                            'title' => 'O‘chirish',
                                            'data-confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?',
                                            'data-method' => 'post',
                                        ]),
                                    ],
                                    'contentOptions' => ['class' => 'text-nowrap'],
                                    'urlCreator' => fn($action, $model) => Url::toRoute([$action, 'id' => $model->id]),
                                ],
                            ],
                        ]) ?>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->

</div>
