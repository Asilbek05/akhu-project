<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap5\Modal;

$this->title = 'Loglar';
$this->params['breadcrumbs'][] = ['label' => 'Bosh sahifa', 'url' => ['/site/index']];
$this->params['breadcrumbs'][] = $this->title;

$level = Yii::$app->request->get('level');
?>

<div class="container-fluid mt-4">

    <!-- TITLE + BREADCRUMB -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark mb-1"><?= Html::encode($this->title) ?></h1>
            <ol class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 mb-0">
                <li class="breadcrumb-item">
                    <?= Html::a('Bosh sahifa', ['/site/index'], ['class' => 'text-muted']) ?>
                </li>
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-500 w-5px h-2px"></span>
                </li>
                <li class="breadcrumb-item text-muted"><?= Html::encode($this->title) ?></li>
            </ol>
        </div>
        <?= Html::a('<i class="bi bi-download me-1"></i> Export CSV', ['export'], [
            'class' => 'btn btn-sm btn-light-primary'
        ]) ?>
    </div>

    <!-- FILTER PILLS -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body py-3">
            <div class="nav nav-pills gap-2 flex-wrap">
                <?php foreach ([
                                   '' => 'All',
                                   'create' => 'Create',
                                   'update' => 'Update',
                                   'delete' => 'Delete',
                                   'error' => 'Error'
                               ] as $key => $label): ?>
                    <?= Html::a($label, ['index', 'level' => $key], [
                        'class' => 'btn btn-sm ' . ($level === $key ? 'btn-primary' : 'btn-light')
                    ]) ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- LOG TABLE -->
    <div class="card shadow-sm border-0">
        <div class="card-body py-0">
            <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'layout' => '
                                <div class="table-responsive">{items}</div>
                                <div class="mt-4 d-flex justify-content-center">{pager}</div>
                            ',
                'summary' => false,
                'tableOptions' => ['class' => 'table align-middle table-row-dashed gy-4 fs-6 mb-0'],
                'pager' => [
                    'options' => ['class' => 'pagination justify-content-center mt-3'],
                    'linkContainerOptions' => ['class' => 'page-item'],
                    'linkOptions' => ['class' => 'page-link'],
                ],
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'user_id',
                        'label' => 'Foydalanuvchi',
                        'value' => fn($model) => $model->user ? $model->user->username : 'System',
                        'contentOptions' => ['class' => 'text-muted']
                    ],
                    'action',
                    [
                        'attribute' => 'message',
                        'format' => 'ntext',
                        'contentOptions' => ['style' => 'max-width:200px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;']
                    ],
                    'ip',
                    [
                        'attribute' => 'level',
                        'format' => 'html',
                        'value' => function ($model) {
                            $map = [
                                'create' => 'success',
                                'update' => 'primary',
                                'delete' => 'danger',
                                'error' => 'dark'
                            ];
                            $color = $map[$model->level] ?? 'secondary';
                            return "<span class='badge bg-{$color}'>" . Html::encode(ucfirst($model->level)) . "</span>";
                        },
                        'filter' => [
                            'create' => 'Create',
                            'update' => 'Update',
                            'delete' => 'Delete',
                            'error' => 'Error'
                        ]
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['datetime', 'php:Y-m-d H:i'],
                        'label' => 'Vaqt',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::button('<i class="bi bi-eye"></i>', [
                                    'class' => 'btn btn-sm btn-secondary log-view-btn',
                                    'data-id' => $model->id,
                                    'data-bs-toggle' => 'modal',
                                    'data-bs-target' => '#logModal'
                                ]);
                            }
                        ],
                        'contentOptions' => ['class' => 'text-end']
                    ],
                ],
            ]) ?>
            <?php Pjax::end(); ?>
        </div>
    </div>
</div>

<?php
Modal::begin([
    'title' => 'Log Tafsilotlari',
    'id' => 'logModal',
    'size' => Modal::SIZE_LARGE,
    'bodyOptions' => ['id' => 'log-modal-body'],
]);
Modal::end();
?>

<?php
// JavaScript log modal yuklash
$this->registerJs(<<<JS
    $('.log-view-btn').on('click', function() {
        const id = $(this).data('id');
        $('#log-modal-body').html('<div class="text-center p-4">Yuklanmoqda...</div>');
        $.get('/logs/view?id=' + id, function(data) {
            $('#log-modal-body').html(data);
        });
    });

$(document).on('click', '.view-log-btn', function() {
    const url = $(this).data('url');
    $('#log-modal .modal-body').html('<div class="text-center p-5"><div class="spinner-border text-primary"></div></div>');
    $('#log-modal').modal('show');

    $.get(url, function(data) {
        $('#log-modal .modal-body').html(data);
    });
});
JS);
?>
