<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Rahbarlar';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
        <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <!-- Page title -->
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0">Rahbarlar</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= Url::to(['/site/index']) ?>" class="text-muted text-hover-primary">Bosh sahifa</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Rahbarlar</li>
                    </ul>
                </div>

                <!-- Action buttons -->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi rahbar qo‘shish', ['create'], [
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
                        <?php Pjax::begin(); ?>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout' => '{items}{pager}',
                            'summary' => '', // "Showing 1–10" matnini yo'q qilamiz
                            'tableOptions' => [
                                'class' => 'table align-middle table-row-dashed fs-6 gy-5 mb-0',
                            ],
                            'columns' => [
                                [

                                    'format' => 'html',
                                    'filter' => false,
                                    'value' => function ($model) {
                                        if ($model->photo) {
                                            return Html::img(
                                                $model->getPhotoUrl(),
                                                [
                                                    'class' => 'rounded-circle shadow-sm',
                                                    'style' => 'width:40px; height:40px; object-fit:cover;',
                                                    'alt' => 'photo'
                                                ]
                                            );
                                        }
                                        return '<span class="badge bg-secondary px-2 py-1">Yo‘q</span>';
                                    },
                                    'contentOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'attribute' => 'name',
                                    'format' => 'raw',
                                    'value' => fn($model) =>
                                    Html::tag('span', Html::encode($model->name), ['class' => 'fw-semibold text-gray-900']),
                                ],
                                'position',
                                'phone',

                                [
                                    'attribute' => 'created_at',
                                    'format' => ['date', 'php:Y-m-d'],
                                    'filter' => false,
                                    'label' => 'Yaratilgan',
                                    'contentOptions' => ['class' => 'text-muted text-center'],
                                ],
                                [
                                    'label' => 'Bo‘limlar',
                                    'format' => 'raw',

                                    'value' => fn($model) =>
                                    Html::a('<i class="bi bi-layers me-1"></i>', ['leadership-sections/manage', 'leadership_id' => $model->id], [
                                        'class' => 'btn btn-sm btn-secondary', // SARIQ O'RNIGA KULRANG
                                        'title' => 'Rahbar bo‘limlarini boshqarish',
                                    ]),
                                    'contentOptions' => ['class' => 'text-center'],
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => 'Amallar',
                                    'template' => '{sections} {update} {delete}',
                                    'buttons' => [
                                       'update' => fn($url, $model) =>
                                        Html::a('<i class="bi bi-pencil"></i>', $url, [
                                            'class' => 'btn btn-icon btn-sm btn-light-primary me-1',
                                            'title' => 'Tahrirlash',
                                        ]),
                                        'delete' => fn($url, $model) =>
                                        Html::a('<i class="bi bi-trash"></i>', $url, [
                                            'class' => 'btn btn-icon btn-sm btn-light-danger',
                                            'title' => 'O‘chirish',
                                            'data' => ['confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?', 'method' => 'post'],
                                        ]),
                                    ],
                                    'contentOptions' => ['class' => 'text-nowrap text-center'],
                                ],
                            ],
                        ]) ?>

                        <?php Pjax::end(); ?>
                    </div>
                    <!--end::Table-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Content-->
</div>
