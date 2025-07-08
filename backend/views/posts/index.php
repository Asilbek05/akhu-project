<?php

use common\models\Posts;
use yii\bootstrap5\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;



/** @var yii\web\View $this */
/** @var common\models\PostsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Postlar';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- 👉 TOOLBAR -->
<div id="kt_app_toolbar" class="app-toolbar pt-6 pb-2">
    <div id="kt_app_toolbar_container" class="container-fluid d-flex align-items-stretch">
        <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">

            <!-- Page title -->
            <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                <div class="d-flex align-items-center gap-2">
                    <h1 class="page-heading text-gray-900 fw-bold fs-3 m-0">Postlar</h1>
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
                    <li class="breadcrumb-item text-muted">Postlar</li>
                </ul>
            </div>

            <!-- Action buttons -->
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <?= Html::a('<i class="bi bi-plus-circle me-1"></i> Yangi post', ['create'], [
                    'class' => 'btn btn-flex btn-primary h-40px fs-7 fw-bold',
                ]) ?>
            </div>
        </div>
    </div>
</div>


<!-- 👉 MODAL QO‘LLANMA -->
<?php
Modal::begin([
    'id' => 'infoModal',
    'title' => 'Post Qo‘llanmasi',
]);

echo <<<HTML
    <div style="line-height:1.6">
        <p>
            Ushbu bo‘lim orqali siz <strong>yangiliklar, maqolalar yoki blog postlar</strong>ini yaratishingiz mumkin.
        </p>
        <ul>
            <li><strong>Sarlavha (Title):</strong> Postning asosiy nomi, foydalanuvchiga birinchi ko‘rinadigan matn.</li>
            <li><strong>Tavsif (Content):</strong> Postning batafsil matni yoki mazmuni.</li>
            <li><strong>Slug:</strong> URL manzilida chiqadigan qisqa nom. Agar kiritilmasa, sarlavhadan avtomatik yaratiladi.</li>
            <li><strong>Rasmlar:</strong> Bir nechta rasm yuklab, galereya shakllantiring.</li>
            <li><strong>Holat (Is Published):</strong> Post ochiqmi yoki yashirinmi belgilaysiz.</li>
        </ul>
        <p>
            Quyida namunaviy tabiat fon rasmini ko‘rishingiz mumkin:
        </p>
        <div class="text-center">
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

<div class="card card-flush shadow-sm mt-5">
    <div class="card-body">
        <?= $this->render('_search', ['model' => $searchModel]) ?>
    </div>
</div>


<!-- 👉 GRIDVIEW -->
<div class="card card-flush shadow-sm mt-5">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'tableOptions' => [
                'class' => 'table align-middle table-row-dashed fs-6 gy-5 mb-0',
            ],
            'columns' => [

                [
                    'attribute' => 'user_id',
                    'label' => 'Muallif',
                    'value' => fn($model) => $model->user->username ?? '(nomalum)',
                    'contentOptions' => ['style' => 'min-width:140px']
                ],

                [
                    'attribute' => 'title',
                    'contentOptions' => ['style' => 'min-width:180px']
                ],

                [
                    'attribute' => 'slug',
                    'contentOptions' => ['style' => 'min-width:180px']
                ],

                [
                    'attribute' => 'content',
                    'format' => 'ntext',
                    'contentOptions' => ['style' => 'min-width:220px']
                ],

                [
                    'attribute' => 'is_published',
                    'format' => 'raw',
                    'label' => 'Status',
                    'value' => function ($model) {
                        $isActive = $model->is_published;
                        $badgeClass = $isActive ? 'bg-success' : 'bg-secondary';
                        $text = $isActive ? 'Faol' : 'Nofaol';
                        $icon = $isActive ? 'bi-toggle-on' : 'bi-toggle-off';

                        return Html::tag('span', "<i class='bi $icon me-1'></i> $text", [
                            'class' => "badge $badgeClass p-2",
                        ]);
                    },
                    'filter' => Html::dropDownList(
                        'PostsSearch[is_published]',
                        $searchModel->is_published,
                        [
                            '' => 'All',
                            1 => 'Faol',
                            0 => 'Nofaol',
                        ],
                        [
                            'class' => 'form-control',
                            'style' => 'max-width: 160px;',
                        ]
                    ),
                    'contentOptions' => ['class' => 'text-center'],
                ],

                [
                    'class' => ActionColumn::class,
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => fn($url, $model) => Html::a('<i class="bi bi-eye"></i>', $url, [
                            'class' => 'btn btn-sm btn-light-primary me-1',
                            'title' => 'Ko‘rish',
                        ]),
                        'update' => fn($url, $model) => Html::a('<i class="bi bi-pencil"></i>', $url, [
                            'class' => 'btn btn-sm btn-light-warning me-1',
                            'title' => 'Tahrirlash',
                        ]),
                        'delete' => fn($url, $model) => Html::a('<i class="bi bi-trash"></i>', $url, [
                            'class' => 'btn btn-sm btn-light-danger',
                            'title' => 'O‘chirish',
                            'data-confirm' => 'Haqiqatan ham o‘chirmoqchimisiz?',
                            'data-method' => 'post',
                        ]),
                    ],
                    'contentOptions' => ['class' => 'text-nowrap'],
                    'urlCreator' => fn($action, Posts $model, $key, $index, $column) =>
                    Url::toRoute([$action, 'id' => $model->id])
                ],

            ],
        ]); ?>
    </div>
</div>
